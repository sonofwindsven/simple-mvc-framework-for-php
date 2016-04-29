<?php
namespace Core\dept;

class Dept{
    private $module;
    private $model;
    private $action;

    public function __construct()
    {
        $module = isset($_GET['module'])?$_GET['module']:'home';
        $model = isset($_GET['model'])?$_GET['model']:'Index';
        $action = isset($_GET['action'])?$_GET['action']:'index';
        $class_name = "\App\Controll\\{$module}\\{$model}";
        $class_obj = new $class_name();
        $class_obj->$action();
    }
}
?>