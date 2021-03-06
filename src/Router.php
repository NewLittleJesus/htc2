<?php

/**
 * Class Router
 * url http://htc2/ - Главная страница (выбор фигуры)
 * url http://htc2/circle/form/ - форма заполнения точек круга
 * url http://htc2/circle/add/ - добавление круга
 * url http://htc2/triangle/form/ - форма заполнения точек треугольника
 * url http://htc2/triangle/add - добавление треугольника
 * url http://htc2/parallelogram/form - форма заполнения точек параллелограмма
 * url http://htc2/parallelogram/add - добавление параллелограмма
 * url http://htc2/figure/list - список фигур
 */
class Router
{


    public static function init()
    {
        $controllerName = $defaultControllerName = \Controllers\BaseController::class;
        $method = $defaultMethod = 'index';

        $routeInfoList = explode('/', $_SERVER['REQUEST_URI']);

        $controllerExists = false;
        if (!empty($routeInfoList[2])) {
            $tmpControllerName = ucfirst($routeInfoList[2]) . 'Controller';
            if (class_exists($controllerName, true)) {
                $controllerName = 'Controllers\\' . $tmpControllerName;
                $controllerExists = true;
            }
        }

        $methodExists = false;
        if (!empty($routeInfoList[3])) {
            $tmpMethodName = $routeInfoList[3];
            if (method_exists($controllerName, $tmpMethodName)) {
                $method = $tmpMethodName;
                $methodExists = true;
            }
        }

        if (!($controllerExists && $methodExists)) {
            $controllerName = $defaultControllerName;
            $method = $defaultMethod;
        }
        $controller = new $controllerName;
        $controller->$method();


    }


}