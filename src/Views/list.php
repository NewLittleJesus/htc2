<!DOCTYPE html>
<html>
<head>
    <title>Список фигур</title>
    <style type="text/css">
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
            padding: 5px 7px;
        }
    </style>

</head>
<body>
<table>
    <tr>
        <th>Тип фигуры</th>
        <th>Площадь</th>
    </tr>
<?php

$db = new SQLite3("test.db");
$sth = $db->query("SELECT type, area FROM figures");
$result = $sth->fetchArray(SQLITE3_ASSOC);

foreach ($result as $item) {
    ?><tr>
        <td><?=$item['type'] ?></td>
        <td><?=$item['area'] ?></td>
    </tr><?
}
?>
</body>
</html>
</table>
<?php
require_once 'src/Models/Circle.php';
require_once 'src/Models/Triangle.php';
require_once 'src/Models/Parallelogram.php';

$db = new SQLite3("test.db");
$sth = $db->query("SELECT type, area FROM figures");

$result = $sth->fetchArray(SQLITE3_ASSOC);

foreach ($result as $item) {

}
?>

