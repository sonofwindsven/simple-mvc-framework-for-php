<?php
namespace App\Controll\home;

class Index{
    public function index(){
        $str1 = "1111111111111|";
        $str2 = "2222222222222";
        $arr = array("zhangsan","lisi","wangwu","zhaoliu");
        $template = new \Core\template\Template();
        $template->assign('str1',$str1);
        $template->assign('str2',$str2);
        $template->assign('arr',$arr);
        $template->display('index.php');
    }
}
?>