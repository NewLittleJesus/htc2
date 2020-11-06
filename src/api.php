<?php
require_once 'test.db';

error_reporting(E_ALL);

spl_autoload_register(function ($class)
{

    $path = __DIR__ . $class . '.php';

    if (file_exists($path))
    {
        require_once $path;
    }

});

switch ($type) {
    case 'Круг' :
        $x1 = $_POST['CenterX'];
        $y1 = $_POST['CenterY'];
        $x2 = $_POST['RadX'];
        $y2 = $_POST['RadY'];
        $area = $circleArea;
    break;
    case 'Треугольник' :
        $x1 = $_POST['AonX'];
        $y1 = $_POST['AonY'];
        $x2 = $_POST['BonX'];
        $y2 = $_POST['BonY'];
        $x3 = $_POST['ConX'];
        $y3 = $_POST['ConY'];
        $area = $TriangleArea;
    break;
    case 'Параллелограмм' :
        $x1 = $_POST['AonX'];
        $y1 = $_POST['AonY'];
        $x2 = $_POST['BonX'];
        $y2 = $_POST['BonY'];
        $x3 = $_POST['ConX'];
        $y3 = $_POST['ConY'];
        $area = $ParallelogramArea;
    break;

}



$FirstPoint = "INSERT INTO points (x,y) VALUES (:x1, :y1)";
$sth = $db->prepare($FirstPoint);
$sth->bindParam('x1',$x1);
$sth->bindParam('y1',$y1);
$sth->execute();


$SecondPoint = "INSERT INTO points (x,y) VALUES (:x2, :y2)";
$sth = $db->prepare($SecondPoint);
$sth->bindParam('x2',$x2);
$sth->bindParam('y2',$y2);
$sth->execute();

$ThirdPoint = "INSERT INTO points (x,y) VALUES (:x3, :y3)";
$sth = $db->prepare($ThirdPoint);
$sth->bindParam('x3',$x3);
$sth->bindParam('y3',$y3);
$sth->execute();


$PointID = "INSERT INTO params (point_id) SELECT id FROM points";
$sth = $db->prepare($PointID);

$sth->execute();

//$PointType = 2 ;
//$FigureID = 2;

$figure = "INSERT INTO figures (figure,area) VALUE (:type,:area)";
$sth = $db->prepare($figure);
$sth->bindParam('type',$type);
$sth->bindParam('area',$area);
$sth->execute();






