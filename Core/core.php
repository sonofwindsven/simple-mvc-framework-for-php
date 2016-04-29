<?php
namespace Core;
spl_autoload_register('\\Core\\Template::autoload');

class Template{
    static function autoload($class){
        require ROOT.'/'.str_replace('\\', '/', $class).'.class.php';
    }
}

//实例化url类库
new \Core\dept\Dept();
?>