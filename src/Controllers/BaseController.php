<?php


namespace Controllers;
use Models\Figure;


class BaseController
{
    protected function redirect($path)
    {
        header("Location: " . $path);
    }

    public function index()
    {

        $this->render('index.tpl.php');
    }

    public function circleTpl()
    {

        $this->render('Circle.tpl.php');
    }
    public function triangleTpl()
    {

        $this->render('Triangle.tpl.php');
    }
    public function parallelogramTpl()
    {

        $this->render('Parallelogram.tpl.php');
    }
    public function renderList()
    {
        $this->render('list.php');
    }

    protected function render(string $templateName, array $params=[])
    {
        ob_start();
        require ROOT . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $templateName;
        ob_flush();
        die();
    }
}