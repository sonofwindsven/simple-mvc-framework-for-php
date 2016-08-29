<?php
namespace Core\database;

class Model{
    protected $database;

    public function __construct()
    {
        $this->database = new Mysql();
    }

}