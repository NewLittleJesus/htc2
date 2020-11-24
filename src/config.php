<?php

define("ROOT", $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'src');
define("DBROOT", ROOT . DIRECTORY_SEPARATOR . "Database");
spl_autoload_register(function ($className) {
    include ROOT .  DIRECTORY_SEPARATOR . $className . '.php';
});

Router::init();

