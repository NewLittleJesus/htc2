<?php


namespace Controllers;

use Models\Parallelogram;

class ParallelogramController extends BaseController
{
    public function form()
    {
        $this->parallelogramTpl();
    }
    public function add()
    {
        $parallelogram = new Parallelogram(
            $_POST['AonX'],
            $_POST['AonY'],
            $_POST['BonX'],
            $_POST['BonY'],
            $_POST['ConX'],
            $_POST['ConY']
        );

        $parallelogram->save();

        $this->redirect('http://htc2/figure/list');
    }


}