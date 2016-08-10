<?php
namespace Core\template;

class Template{
    private $global_array=array();
    //包含模板页面
    public function display($tmp_url)
    {
        //将所有的复制进行渲染方便模板页面调用
        foreach($this->global_array as $key=>$val){
            $$key=$val;
        }
        include(ROOT."/".APP_NAME."/View/".$tmp_url);
    }
    //赋值所有模板变量到全局的树
    public function assign($field,$value){
        $this->global_array[$field] = $value;
    }
}

?>