<?php
namespace Database;

require_once "createDatabase.php";
class DB
{
    /**
     * @var \SQLite3
     */
    private $connection;

    public function __construct()
    {
        $this->connection = new \SQLite3("Database/test.db");
    }

    /**
     * @param $x
     * @param $y
     * @return int
     */
    public function savePoints($x, $y)
    {
        $sth = $this
            ->connection
            ->prepare("INSERT INTO points (x,y) VALUES (:x, :y)");
        $sth->bindParam(':x',$x);
        $sth->bindParam(':y',$y);
        $sth->execute();


        return $this->connection->lastInsertRowID();
    }

    /**
     * @return int
     */
    public function saveParams()
    {

        $figureId = "INSERT INTO params (figure_id)  SELECT id FROM figures";
        $sth = $this->connection->prepare($figureId);
        $sth->execute();

        $PointID = "INSERT INTO params (point_id) SELECT id FROM points";
        $sth = $this->connection->prepare($PointID);
        $sth->execute();



        return $this->connection->lastInsertRowID();
    }
    public function savePointType($pointType)
    {
        $pointType = "INSERT INTO params (type) VALUES (:type)";
        $sth = $this->connection->prepare($pointType);
        $sth->bindParam(':type', $pointType);
        $sth->execute();
    }

    /**
     * @param $type
     * @param $area
     * @return int
     */
    public function saveFigure($type, $area)
    {
        $figure = "INSERT INTO figures (type,area) VALUES (:type,:area)";
        $sth = $this->connection->prepare($figure);
        $sth->bindParam(':type',$type);
        $sth->bindParam(':area',$area);
        $sth->execute();

        return $this->connection->lastInsertRowID();
    }

    /**
     * @param $sql
     * @param array $params
     * @return \SQLite3Result
     */
    public function find($sql, array $params = [])
    {
        $sth=$this->connection->prepare($sql);
        foreach ($params as $key => $val) {
            $sth->bindParam($key, $val);
        }

        return $sth->execute();


    }

}