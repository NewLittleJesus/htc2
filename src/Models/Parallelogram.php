<?php

namespace Models;

/**
 * Class parallelogram вспомогающий класс для вычисления площади параллелограмма
 */
class Parallelogram extends Figure

{
    /**
     * @var float вычисленные по точкам длины сторон параллелограмма
     */
    private $x1;
    private $y1;
    private $x2;
    private $y2;
    private $x3;
    private $y3;
    private $vectorABCoordinateX;
    private $vectorABCoordinateY;
    private $vectorACCoordinateX;
    private $vectorACCoordinateY;


    /**
     * parallelogram constructor
     * @param float $x1
     * @param float $y1
     * @param float $x2
     * @param float $y2
     * @param float $x3
     * @param float $y3
     */

    public function __construct(float $x1, float $y1, float $x2, float $y2, float $x3, float $y3)
    {


        $this->vectorABCoordinateX = $x2 - $x1;
        $this->vectorABCoordinateY = $y2 - $y1;
        $this->vectorACCoordinateX = $x3 - $x1;
        $this->vectorACCoordinateY = $y3 - $y1;

    }

    public function vectorMultiplication(): float
    {
        return ($this->vectorABCoordinateX * $this->vectorACCoordinateY)
            - ($this->vectorACCoordinateX * $this->vectorABCoordinateY);
    }

    public function calculateArea()
    {
        return sqrt($this->vectorMultiplication() * $this->vectorMultiplication());
    }

    public function getType()
    {
        return 'parallelogram';
    }

    public function save()
    {
        $this->db->savePoints($this->x1, $this->y1);
        $this->db->savePointType("point1");
        $this->db->savePoints($this->x2, $this->y2);
        $this->db->savePointType("point2");
        $this->db->savePoints($this->x3, $this->y3);
        $this->db->savePointType("point3");

        $this->db->saveParams();
        $this->db->saveFigure($this->getType(),$this->calculateArea());

    }
    public function find()
    {
        $this->db->find(
            'select * from figures fi join params p on fi.id = p.figure_id join points p2 on p.point_id = p2.id');
    }
}

$parallelogram = new Parallelogram(
    $_POST['AonX'],
    $_POST['AonY'],
    $_POST['BonX'],
    $_POST['BonY'],
    $_POST['ConX'],
    $_POST['ConY']
);
$ParallelogramArea = $parallelogram->calculateArea();
echo $ParallelogramArea;
?>

