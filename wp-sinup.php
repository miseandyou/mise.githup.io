<?php
/**
 * Created by PhpStorm.
 * User: PulsarTAO
 * Date: 17-4-29
 * Time: 下午3:26
 */
//TODO:check login name
require( dirname(__FILE__) . '/wp-load.php' );
if(isset($_REQUEST['act'])){
    if ($_REQUEST['act']=="signup"){
        global $current_user;
        //var_dump($current_user);
        if ($current_user->cap_key!=null) {
            //TODO:build sinup html data
            $html = <<<HTML
<!DOCTYPE html>
<html>
        <head>
        </head>
        <body>
            <br>
            用户名：<input type="text" value="{$current_user->user_login}"><br>
            姓：<input type="text" value="{$current_user->first_name}"><br>
            名：<input type="text" value="{$current_user->last_name}"><br>
            电话号码：<input type="text" value=""><br>
            邮箱：<input type="text" value="{$current_user->user_email}"><br>
            地址：<input type="text" value=""><br>
            电话：<input type="text" value=""><br>
            请确定您的报名信息
            <button>提交报名信息</button>
        </body>
</html>
HTML;
            echo $html;
        }else{
            echo "请先登录！！！";
        }
    }
}