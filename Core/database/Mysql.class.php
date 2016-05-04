<?php
namespace Core\database;

class Mysql implements Database{
    protected $conn;
    private $sql=array(
        'field'=>'*',
        'table'=>'',
        'where'=>'',
        'order'=>'',
        'limit'=>'',
        'group'=>'',
        'having'=>'',
    );
    private $sqlstr = '';
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
    //连贯操作
    public function __call($name, $arguments)
    {
        //方法名转化成小写
        $name = strtolower($name);
        if(array_key_exists($name,$this->sql))
        {
            $this->sql[$name] = $arguments[0];
        }
        else
        {
            echo "{$name} of class ".get_class($this)." does`t exist";
        }
        return $this;
    }
    //解析sql成数据库可执行的sql语句
    public function selectsql(){
        $this->sqlstr = 'select '.$this->sql['field'].' from '.$this->sql['table'];
        if($this->sql['where']!=''){
            $this->sqlstr .= " where ".$this->sql['where'];
        }
        if($this->sql['group']!=''){
            $this->sqlstr .= " group ".$this->sql['group'];
        }
        if($this->sql['having']!=''){
            $this->sqlstr .= " having ".$this->sql['having'];
        }
        if($this->sql['order']!=''){
            $this->sqlstr .= " order ".$this->sql['order'];
        }
        if($this->sql['limit']!=''){
            $this->sqlstr .= " where ".$this->sql['limit'];
        }
    }
    //执行查询
    public function select(){
        $this->selectsql();
        $query = $this->query();
        $array = $this->fetch_array($query);
        return $array;
    }
    //执行
    public function query(){
        $query = mysql_query($this->sqlstr,$this->conn);
        if($query==false)
        {
            echo "error";
            exit;
        }
        else
        {
            return $query;
        }
    }
    //结果集返回数组
    protected function fetch_array($query){
        $array = array();
        $i = 0;
        while($row = mysql_fetch_array($query,MYSQL_ASSOC))
        {
            $array[$i] = $row;
        }
        return $array();
    }
    //返回一行数据
    public function find(){
        $this->sql['limit'] = 1;
        $this->selectsql();
        $query = $this->query();
        $array = $this->fetch_array($query);
        return $array[0];
    }
    //增加一行记录
    public function add($data){
        if($this->sql['table']=='') {echo "table is not empty";}
        if(empty($data)){echo "data is not empty";}
        $key = '';
        $value = '';
        if(!function_exists('mysql_real_escape_string'))
        {
            foreach($data as $k=>$v){
                $key .= ',`'.addslashes($k).'`';
                $value .=',\''.addslashes($v).'\'';
            }
        }
        $key = substr($key,1);
        $value = substr($value,1);
        $this->sqlstr = "insert info ".$this->sql['table']."({$key}) values($value)";

        $query = $this->query();

        return $this->insert_id();
    }
    //获取最后一个插入id
    public function insert_id(){
        return mysql_insert_id();
    }
}

?>