<?php

namespace Models;

/**
 * Class circle Вспомогательный класс для вычисления площади круга
 */
class Circle extends Figure
{


    /**
     * @var float Вычисленный по точкам радиус круга
     */
    private $radiusLength;

    private $x1;
    private $y1;
    private $x2;
    private $y2;


    /**
     * circle constructor.
     * @param float $x1 позиция точки 1
     * @param float $y1 позиция точки 2
     * @param float $x2 позиция точки 3
     * @param float $y2 позиция точки 4
     */
    public function __construct($x1, $y1, $x2, $y2)
    {

        $this->x1 = $x1;
        $this->y1 = $y1;
        $this->x2 = $x2;
        $this->y2 = $y2;

        $this->radiusLength = sqrt(($x2 - $x1) ** 2 + ($y2 - $y1) ** 2);

    }

    public function save()
    {
        $center = $this->db->savePoints($this->x1, $this->y1);
        $centerType = $this->db->savePointType("center");
        $radius = $this->db->savePoints($this->x2, $this->y2);
        $radiusType = $this->db->savePointType("radius");
        $params = $this->db->saveParams();

        $figureId = $this->db->saveFigure($this->getType(),$this->calculateArea());
        // TODO дописать сохранение в БД
    }



    /**
     * Вычисляет площадь
     * @return float|int
     */
    public function calculateArea()
    {
        return M_PI * ($this->radiusLength * $this->radiusLength);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'circle';
    }

    public function find()
    {
        $this->db->find(
                'select * from figures fi join params p on fi.id = p.figure_id join points p2 on p.point_id = p2.id');
    }
}

$circle = new circle(
    $_POST['CenterX'],
    $_POST['CenterY'],
    $_POST['RadX'],
    $_POST['RadY']
);
$circleArea = $circle->calculateArea();
echo $circleArea;
?>

<!DOCTYPE html>
<html>
<body>
<form name="DataBaseSend" action="/src/api.php" method="post" accept-charset="utf-8">
    <input type="submit" value="Перейти к базе данных">
</form>
</body>
</html>


