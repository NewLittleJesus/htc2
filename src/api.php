<?php


error_reporting(E_ALL);

spl_autoload_register(function ($class)
{

    $path = __DIR__ . $class . '.php';

    if (file_exists($path))
    {
        require_once $path;
    }

});


$PointID = "INSERT INTO params (point_id) SELECT id FROM points";
$sth = $db->prepare($PointID);
$sth->execute();








