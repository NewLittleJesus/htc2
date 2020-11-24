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

$db = new PDO("sqlite:C:/Users/Кирилл/Desktop/workspace/1/OpenServer/Domains/htc2/src/Database/test.db");
$sth = $db->query("SELECT type, area FROM 'figures'");
//$result = $sth->fetchAll(SQLITE3_ASSOC);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

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

