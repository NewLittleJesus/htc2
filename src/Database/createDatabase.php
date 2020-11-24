<?php

$db = new PDO('sqlite:test.db');

$db->exec('INSERT INTO points (x, y)  VALUES (150,2)');


$st = $db->query('SELECT * FROM points');
$results = $st->fetchAll();
foreach ($results as $row) {echo $row['x'];}
