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
        $params = [

        ];
        $this->render('index.tpl.php', $params);
    }

    public function circleTpl()
    {
        $params = [];
        $this->render('Circle.tpl.php', $params);
    }
    public function triangleTpl()
    {
        $params = [];
        $this->render('Triangle.tpl.php', $params);
    }
    public function parallelogramTpl()
    {
        $params = [];
        $this->render('Parallelogram.tpl.php', $params);
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