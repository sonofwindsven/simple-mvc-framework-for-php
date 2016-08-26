<?php
namespace App\Controll\admin;

use App\config\Config;
use Core\controll\Controll;

class Login extends Controll{

    public function login(){
        $config_all = Config::get_config();
        $config_admin_front = $config_all['admin_front'];
        $this->template->assign('config_front',$config_admin_front);
        $this->template->display('admin/login.php');
    }
}