<?php

/**
 * Class Router
 * url http://htc2/ :: Главная страница (выбор фигуры)
 * url http://htc2/circle/add/ - добавление круга
 * url http://htc2/triangle/add - добавление треугольника
 * url http://htc2/parallelogram/add - добавление параллелограмма
 * url http://htc2/figure/list - список фигур
 */
class Router
{
    //TODO

    public static function init()
    {
        $controller = \Controllers\BaseController::class;
        $action = 'index';

        $routeInfoList = explode('/',$_SERVER['REQUEST_URI']);

        var_dump($routeInfoList);

    }


}