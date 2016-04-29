<?php
namespace Core\lib;

class Filter{
    public function get($field){
        return $this->filter_str($_GET[$field]);
    }
    public function post($field){
        return $this->filter_str($_POST[$field]);
    }
    public function filter_str($str){
        $str = trim($str);  //去首尾空格
        $reg = "/<script[\s\S]*?<\/script>/i";  //去script
        $newstr = preg_replace($reg,"",$str);
        return $newstr;
    }
    public function filter_sql($str){
        $reg = '/[select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile]/i';
        return preg_match($reg,$str);
    }
}

?>