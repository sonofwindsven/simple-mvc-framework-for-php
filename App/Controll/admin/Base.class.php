<?php
namespace App\Controll\admin;

use Core\controll\Controll;

class Base extends Controll{
    public $userId;
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        if(!$this->userId){
            $this->redirect('/admin/Login/login');
        }
    }
}