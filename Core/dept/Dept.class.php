<?php
namespace Core\dept;

class Dept{
    private $module;
    private $model;
    private $action;

    public function __construct()
    {
        $path_info = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:'';
        if($path_info!='')
        {
            $path_arr = explode('/',$path_info);
            $module = isset($path_arr[1])?$path_arr[1]:'home';
            $model = isset($path_arr[2])?$path_arr[2]:'Index';
            $action = isset($path_arr[3])?$path_arr[3]:'index';

            $path_num = count($path_arr);
            if($path_num>4)
            {
                for($i=4;$i<$path_num;$i++)
                {
                    $_GET[$path_arr[$i]] = $path_arr[$i+1];
                }
            }
        }
        else
        {
            $module = 'home';
            $model = 'Index';
            $action = 'index';
        }

        $class_name = "\App\Controll\\{$module}\\{$model}";
        $class_obj = new $class_name();
        $class_obj->$action();
    }
}
?>