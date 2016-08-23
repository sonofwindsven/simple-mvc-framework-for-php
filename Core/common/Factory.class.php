<?php
namespace Core\common;

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
                echo "The class is not exist";
            }
        }
        return $rs;
    }
}