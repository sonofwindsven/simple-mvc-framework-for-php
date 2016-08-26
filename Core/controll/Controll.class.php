<?php
namespace Core\controll;

use Core\template\Template;

class Controll{

    public $template;  //模板对象

    final function __construct()
    {
        $this->init();
    }

    public function init(){
        $template = new Template();
        $this->template = $template;
    }

    /**
     * @param $url 地址
     * 直接跳转
     */
    public function redirect($url){
        header("Location:".$url);
    }

    /**
     * @param $url 地址
     * @param int $sec 间隔默认1秒
     * 几秒后跳转
     */
    public function redirectSec($url,$sec=1){
        header("Refresh:{$sec};url:{$url}");
    }
}