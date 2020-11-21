<?php


namespace Controllers;

use Models\Triangle;

class TriangleController extends BaseController
{
    public function form()
    {
        $this->triangleTpl();
    }
    public function add()
    {
        $triangle = new Triangle(
            $_POST['AonX'],
            $_POST['AonY'],
            $_POST['BonX'],
            $_POST['BonY'],
            $_POST['ConX'],
            $_POST['ConY']
        );

        $triangle->save();

        $this->redirect('http://htc2/figure/list');
    }


}