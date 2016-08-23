<?php
namespace Core\common;

class Autoload{
    static function autoload($class){
        require ROOT.'/'.str_replace('\\', '/', $class).'.class.php';
    }
}