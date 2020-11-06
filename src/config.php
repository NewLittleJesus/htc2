<?php

define("ROOT", $_SERVER['DOCUMENT_ROOT']);

spl_autoload_register(function ($className) {
    include ROOT . DIRECTORY_SEPARATOR . $className . '.php';
});


