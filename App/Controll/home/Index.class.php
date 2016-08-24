<?php
namespace App\Controll\home;
use Core;
use App\Module\UserModule;

class Index{
    public function index(){
        $str1 = "1111111111111|";
        $str2 = "2222222222222";
        $arr = array("zhangsan","lisi","wangwu","zhaoliu");
        //$database = Core\Factory::init('Database\Mysql');
        //$sqlArr = $database->table("t_order")->select();
        //echo $database->getLastSql();
        //var_dump($sqlArr);
        $userModel = new UserModule();
        $userList = $userModel->getUser();
        var_dump($userList);
        $template = Core\Factory::init('Template\Template');
        $template->assign('str1',$str1);
        $template->assign('str2',$str2);
        $template->assign('arr',$arr);
        $template->display('index.php');
    }
    public function ceshi(){
        $template = Core\Factory::init('Template\Template');
        $template->display('home/ceshi.php');
    }
}
?>