<?php
namespace Models;

use Database\DB;

abstract class Figure
{



    /**
     * @var DB
     */
    protected $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * @return string
     */
    abstract public function getType();

    /**
     * Сохраняет фигуру в базу
     * @return mixed
     */
    abstract public function save();
	
}

