<?php
namespace App\config;

class config{
    private static $config=array(
        'dbconfig'=>array(  //数据库配置
            'host'=>'localhost',
            'use'=>'root',
            'pass'=>'root',
            'db'=>'blog'
        ),
        'nsconfig'=>array(  //命名空间别名配置
            'Database'=>'Core\database',
            "Dept"=>'Core\dept',
            "Lib"=>'Core\lib',
            "Template"=>'Core\template',
            "Config"=>'App\config',
            "Controll"=>'App\Controll',
            "Module"=>'App\Module',
        ),
    );
    static function get_config(){
        return self::$config;
    }
}
?>