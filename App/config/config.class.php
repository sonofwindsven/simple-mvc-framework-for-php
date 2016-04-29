<?php
namespace App\config;

class config{
    static $config=array(
        'dbconfig'=>array(
            'host'=>'localhost',
            'use'=>'root',
            'pass'=>'root',
            'db'=>'blog'
        ),
    );
    static function get_config(){
        return self::$config;
    }
}
?>