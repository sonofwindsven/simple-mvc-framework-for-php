<?php
namespace Core\lib;

class Session{
    public function __construct()
    {
        session_start();
    }

    /**
     * 设置session
     */
    public function setSession($key,$value){
        $_SESSION[$key] = $value;
    }

    /**
     * @param $key  获取session
     */
    public function getSession($key){
        if(isset($_SESSION['userId'])){
            return $_SESSION['userId'];
        }
        return 0;
    }

    /*
     * 删除
     */
    public function delSession($key){
        unset($_SESSION[$key]);
    }

    /**
     * 删除所有
     */
    public function delAllSession(){
        session_destroy();
    }
}