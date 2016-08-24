<?php
namespace App\Module;
use Core\database\Model;

class UserModule extends Model{

    public function getUser(){
        $list = $this->database->table('user')->select();
        return $list;
    }
}