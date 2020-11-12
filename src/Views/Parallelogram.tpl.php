<html>
<body>
<form name = "ParallelogramParameters" action = "/src/Models/Parallelogram.php" method="post" accept-charset="utf-8">
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

</body>
</html>

<ul>
    <?php foreach ($params as $val): ?>
        <li></li>
    <?php endforeach; ?>
</ul>
