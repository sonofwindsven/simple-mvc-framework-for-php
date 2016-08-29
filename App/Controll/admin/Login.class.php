<?php
namespace App\Controll\admin;

use App\config\Config;
use Core\controll\Controll;
use App\Module\UserModule;

class Login extends Controll{

    public function login(){
        $config_all = Config::get_config();
        $config_admin_front = $config_all['admin_front'];
        $this->template->assign('config_front',$config_admin_front);
        $this->template->display('admin/login.php');
    }

    public function doLogin(){
        $userName = $this->request->post('userName');
        $password = $this->request->post('password');
        $password = md5($password);

        $userModule = new UserModule();
        $userInfo = $userModule->infoByUsername($userName);

        if(empty($userInfo)){
            $this->alertLocation('/admin/Login/login','用户名或者密码错误');
        }

        if($userInfo['password'] == $password){
            echo "登录成功";
        }else{
            $this->alertLocation('/admin/Login/login','用户名或者密码错误');
        }
    }
}