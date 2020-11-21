<?php
namespace Controllers;

use Models\Circle;

class CircleController extends BaseController
{
    public function form()
    {
        $this->circleTpl();
    }


    public function add()
    {
        $circle = new Circle(
            $_POST['CenterX'],
            $_POST['CenterY'],
            $_POST['RadX'],
            $_POST['RadY']
        );

        $circle->save();

        $this->redirect('http://htc2/figure/list');
        $this->circleTpl();
    }

}