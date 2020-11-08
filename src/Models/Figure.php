<?php
namespace Models;

use Database\DB;

abstract class Figure
{


    /**
     * @var DB
     */
    protected $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * @return string
     */
    abstract public function getType();

    /**
     * Сохраняет фигуру в базу
     * @return mixed
     */
    abstract public function save();
	
}
?>
<html>
<body>
<?php switch ($type) { 
	case 'Круг' :?>
 	<form name = "CircleParameters" action = "Circle.php" method="post" accept-charset="utf-8">
 		Центр круга:
 		<input type = "number" name = "CenterX" placeholder="Ось X">
 		<input type = "number" name = "CenterY" placeholder="Ось Y">
 		<div> </div>
 		Радиус:
 		<input type = "number" name = "RadX" placeholder="Ось X">
 		<input type = "number" name = "RadY" placeholder="Ось Y">
 		<div> </div>
 		<input type = "submit" value = "Вычислить площадь">
 	</form>

<?php break;
case 'Треугольник' : ?>

	<form name = "TriangleParameters" action = "Triangle.php" method="post" accept-charset="utf-8">
		Точка A:
 		<input type = "number" name = "AonX" placeholder="Ось X">
 		<input type = "number" name = "AonY" placeholder="Ось Y">
 		<div> </div>
 		Точка B:
 		<input type = "number" name = "BonX" placeholder="Ось X">
 		<input type = "number" name = "BonY" placeholder="Ось Y">
 		<div> </div>
 		Точка C:
 		<input type = "number" name = "ConX" placeholder="Ось X">
 		<input type = "number" name = "ConY" placeholder="Ось Y">
 		<div> </div>
 		<input type = "submit" value = "Вычислить площадь">
 	</form>
<?php break;
case 'Параллелограмм' :	 ?>

<form name = "ParallelogramParameters" action = "Parallelogram.php" method="post" accept-charset="utf-8">
		Точка A:
 		<input type = "number" name = "AonX" placeholder="Ось X">
 		<input type = "number" name = "AonY" placeholder="Ось Y">
 		<div> </div>
 		Точка B:
 		<input type = "number" name = "BonX" placeholder="Ось X">
 		<input type = "number" name = "BonY" placeholder="Ось Y">
 		<div> </div>
 		Точка C:
 		<input type = "number" name = "ConX" placeholder="Ось X">
 		<input type = "number" name = "ConY" placeholder="Ось Y">
 		<div> </div>
 		<input type = "submit" value = "Вычислить площадь">
 	</form>
<?php break; } ?>
</body>
</html>