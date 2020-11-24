<?php
$db = new PDO('sqlite:..src/Database/test.sqlite');

$db->exec('INSERT INTO points (x, y)  VALUES (1,2)');


$st = $db->query('SELECT * FROM points');
$results = $st->fetchAll();
foreach ($results as $row) {echo $row['id'];}


