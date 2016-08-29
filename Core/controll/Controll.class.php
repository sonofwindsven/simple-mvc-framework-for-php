<?php
namespace Core\controll;

use Core\template\Template;
use Core\lib\Filter;
use App\config\config;

class Controll{

    public $template;  //模板对象
    public $request;  //请求对象

    final function __construct()
    {
        $this->init();
    }

    public function init(){
        $template = new Template();
        $this->template = $template;

        $filter = new Filter();
        $this->request = $filter;
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

    /**
     * js提醒跳转
     */
    public function alertLocation($url,$msg = '出现错误'){
        $config_all = Config::get_config();
        $config_host = $config_all['host'];
        $url = $config_host.$url;
        echo "<script>alert('{$msg}');location.href='{$url}';</script>";
        exit;
    }
}