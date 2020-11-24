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
        if ((!preg_match("/^0-9]+$/", $_POST['CenterX'])) &&
            (!preg_match("/^0-9]+$/", $_POST['CenterY'])) &&
            (!preg_match("/^0-9]+$/", $_POST['RadX'])) &&
            (!preg_match("/^0-9]+$/", $_POST['RadY'])))
            {
                $this->redirect('http://htc2/public/figure/error');
            }
            else {

        $circle = new Circle(
            $_POST['CenterX'],
            $_POST['CenterY'],
            $_POST['RadX'],
            $_POST['RadY']
        );

        $circle->save();


        $this->redirect('http://htc2/public/figure/list');
    }
    }

}