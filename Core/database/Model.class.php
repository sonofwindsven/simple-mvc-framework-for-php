<?php
namespace Core\database;
use Core\database\Mysql;

class Model{
    protected $database;

    public function __construct()
    {
        $this->database = new Mysql();
    }

}