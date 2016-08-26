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
        $tmp_view_file = APP_PATH . "runtime/".$tmp_url;
        $view_file = APP_PATH . "View/".$tmp_url;

        $is_create_tmp = false;
        if(!file_exists($tmp_view_file)){  //不存在更新模板
            $dirpath = pathinfo($tmp_view_file,PATHINFO_DIRNAME);
            mkdir($dirpath,0777,true);
            $is_create_tmp = true;
        }else{
            if(filemtime($tmp_view_file) < filemtime($view_file)) {  //存在 缓存模板生成时间小于模板修改时间
                $is_create_tmp = true;
            }
        }
        //如果模板文件有修改则更新模板缓存文件
        if($is_create_tmp){
            ob_start();
            $content = file_get_contents($view_file);
            ob_get_contents();
            ob_flush();
            file_put_contents($tmp_view_file,$content);
        }

        include $tmp_view_file;
    }
    //赋值所有模板变量到全局的树
    public function assign($field,$value){
        $this->global_array[$field] = $value;
    }
}

?>