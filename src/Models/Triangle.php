<?php

namespace Models;

/**
 * Class triangle вспомогательный класс для вычисления площади треугольника
 */
class Triangle extends Figure
{
    /**
     * @var float вычисленные по точкам длины сторон треугольника
     */
    private $x1;
    private $y1;
    private $x2;
    private $y2;
    private $x3;
    private $y3;
    private $sideABLenght;
    private $sideBCLenght;
    private $sideACLenght;

    /**
     * triangle constructor.
     * @param float $x1 позиция точки A по оси X
     * @param float $y1 позиция точки A по оси Y
     * @param float $x2 позиция точки B по оси X
     * @param float $y2 позиция точки B по оси Y
     * @param float $x3 позиция точки С по оси X
     * @param float $y3 позиция точки С по оси Y
     */

    public function __construct(float $x1, float $y1, float $x2, float $y2, float $x3, float $y3)
    {

        $this->sideABLenght = sqrt(($x2 - $x1) * ($x2 - $x1)
            + ($y2 - $y1) * ($y2 - $y1));
        $this->sideBCLenght = sqrt(($x3 - $x2) * ($x3 - $x2)
            + ($y3 - $y2) * ($y3 - $y2));
        $this->sideACLenght = sqrt(($x1 - $x3) * ($x1 - $x3)
            + ($y1 - $y3) * ($y1 - $y3));
    }

    /**
     * @return float вычисление полупериметра треугольника
     */

    public function calculateHalfPerimeter(): float
    {
        return ($this->sideABLenght + $this->sideBCLenght + $this->sideACLenght) / 2;
    }

    /***
     * @return float вычисляет площадь
     */

    public function calculateArea()
    {
        return sqrt($this->calculateHalfPerimeter() * ($this->calculateHalfPerimeter() - $this->sideABLenght) *
            ($this->calculateHalfPerimeter() - $this->sideBCLenght) * ($this->calculateHalfPerimeter() - $this->sideACLenght));
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'triangle';
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

$triangle = new Triangle(
    $_POST['AonX'],
    $_POST['AonY'],
    $_POST['BonX'],
    $_POST['BonY'],
    $_POST['ConX'],
    $_POST['ConY']
);

//$TriangleArea = $triangle->calculateArea();
//echo $TriangleArea;

