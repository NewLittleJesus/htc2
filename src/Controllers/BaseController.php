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
        $params = ['type' => 'circle'];
        $this->render('Circle.tpl.php', $params);
    }
    public function triangleTpl()
    {
        $params = ['type' => 'triangle'];
        $this->render('Triangle.tpl.php', $params);
    }
    public function parallelogramTpl()
    {
        $params = ['type' => 'parallelogram'];
        $this->render('Parallelogram.tpl.php', $params);
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