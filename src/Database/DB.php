<?php
namespace Database;

class DB
{
    /**
     * @var \SQLite3
     */
    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO("sqlite:". DBROOT . DIRECTORY_SEPARATOR .  "test.db");
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
        $sth->bindValue(':x',$x);
        $sth->bindValue(':y',$y);
        $sth->execute();


        return $this->connection->lastInsertID();
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



        return $this->connection->lastInsertID();
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
        $sth->bindValue(':type',$type);
        $sth->bindValue(':area',$area);
        $sth->execute();

        return $this->connection->lastInsertID();
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
            $sth->bindValue($key, $val);
        }

        return $sth->execute();


    }

}