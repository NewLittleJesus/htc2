<?php
namespace Controllers;

use Models\Figure;

class FigureController extends BaseController
{

    public function list()
    {
        $this->renderList();
    }

    public function error()
    {
        $this->error();
    }
}
