<?php
namespace Core\database;

class Mysql implements Database{
    protected $conn;
    //单例
    public function __construct(){
        if($this->conn)
        {
            return $this->conn;
        }
        else
        {
            $config = \App\config\config::get_config();
            $host = $config['dbconfig']['host'];
            $use = $config['dbconfig']['use'];
            $pass = $config['dbconfig']['pass'];
            $db = $config['dbconfig']['db'];
            $this->conn = mysql_connect($host,$use,$pass);
            mysql_select_db($db,$this->conn);
            return $this->conn;
        }
    }
}

?>