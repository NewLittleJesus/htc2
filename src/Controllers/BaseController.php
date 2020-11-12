<?php


namespace Controllers;


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

    public function Circle()
    {
        $this->render('Circle.tpl.php');
    }
    public function Triangle()
    {
        $this->render('Triangle.tpl.php');
    }
    public function Parallelogram()
    {
        $this->render('Parallelogram.tpl.php');
    }
    public function list()
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