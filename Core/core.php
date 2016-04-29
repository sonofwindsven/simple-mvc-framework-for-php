<?php
namespace Core;
spl_autoload_register('\\Core\\Template::autoload');

class Template{
    static function autoload($class){
        require ROOT.'/'.str_replace('\\', '/', $class).'.class.php';
    }
}
class Factory{
    static function init($class_name,$param=array()){
        if(strpos($class_name,'\\')==0)
        {
            $rs = new $class_name($param);
        }
        else
        {
            $nsshort_arr = explode('\\',$class_name);
            $nsshort = $nsshort_arr[0];
            $config = \App\config\config::get_config();  //获取全局配置信息
            $nsconfig = $config['nsconfig'];
            if(isset($nsconfig[$nsshort])){
                $class = '\\'.$nsconfig[$nsshort].'\\'.$nsshort_arr[1];
                $rs = new $class($param);
            }else{
                echo "不存在此类库";
            }
        }
        return $rs;
    }
}
//实例化url类库
new \Core\dept\Dept();
?>