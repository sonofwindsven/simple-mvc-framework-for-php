<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>index</title>
    </head>
    <body>
        <?php echo $str1;?><?php echo $str2;?>
        <br />
        <?php
            foreach($arr as $k=>$v):
                echo $v."<br />";
            endforeach;
        ?>
    </body>
</html>