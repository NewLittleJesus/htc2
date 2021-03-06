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
        if ((preg_match("/^0-9]+$/", $_POST['AonX'])) &&
            (preg_match("/^0-9]+$/", $_POST['AonY'])) &&
            (preg_match("/^0-9]+$/", $_POST['BonX'])) &&
            (preg_match("/^0-9]+$/", $_POST['BonY'])) &&
            (preg_match("/^0-9]+$/", $_POST['ConX'])) &&
            (preg_match("/^0-9]+$/", $_POST['ConY'])))
        {
            $this->redirect('http://htc2/public/figure/error');
        }
        else {

        $triangle = new Triangle(
            $_POST['AonX'],
            $_POST['AonY'],
            $_POST['BonX'],
            $_POST['BonY'],
            $_POST['ConX'],
            $_POST['ConY']
        );

        $triangle->save();

        $this->redirect('http://htc2/public/figure/list');
    }
}

}