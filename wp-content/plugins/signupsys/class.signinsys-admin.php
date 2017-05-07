<?php
/**
 * Created by PhpStorm.
 * User: PulsarTAO
 * Date: 17-5-1
 * Time: 下午4:40
 */
add_action('wp_ajax_nopriv_signupsys-alipay', 'signupsys_alipay');
function signupsys_alipay(){
    file_put_contents(time()."_alipay_call_back.log",var_export($_POST));
}
add_action('wp_ajax_signupsys-edit', 'signupsys_edit');
function signupsys_edit()
{
    $act = $_POST;
    if (isset($act['act'])) {
        if (isset($act['data'])) {
            $id = $act['data'];
        } else exit();
    }
}

add_action('admin_menu', 'comments_submenu');
function comments_submenu()
{
    add_comments_page(__('报名情况'), __('报名情况'), 10, 'my-unique-identifier-datasave', function () {
        global $wpdb;
        $sql = "select * from " . UESTC_SIGNIN;
        $signin = $wpdb->get_results($sql);
        $html = <<<HTML
<!DOCTYPE html>
<html>
    <body>
    <script>
     function send(act){
        var tag=document.getElementsByClassName('state');
        console.log(tag);
        id={};
        for(var x=0;x<tag.length;x+=1){
            if(tag[x].checked==true){
            id[x]=tag[x].value;
            }
        }
        jQuery.ajax({
             url:"admin-ajax.php",
             dataType:"html",
             type:"POST",
             data:{
                    "action" : "signupsys-edit",
                    'act' : act,
                    'data':id
                  },
             success:function(data){
                alert(data);
             }
      });
    }
</script>
    %s
    <button onclick="send('check')">确认收款</button>
    <button onclick="send('delete')">删除订单</button>
</form>
    </body>
</html>
HTML;
        $add = "<table><td>订单号</td><td>名字</td><td>联系电话</td><td>用户名</td><td>订单日期</td><td>支付宝</td><td>支付情况</td></tr>";
        foreach ($signin as $x) {
            $alipay="未付款";
            if($x->alipay==1)$alipay="已付款";
            $pay = "未付款";
            if ($x->ispayd == 1) $pay = "已付款";
            $add = $add . "<td>" . $x->payid . "</td><td>" . $x->name . "</td><td>" . $x->phone . "</td><td>" . $x->discrib . "</td><td>" . $x->time . "</td><td>" . $alipay . "</td><td>" . $pay . "</td><td><input class='state' value='$x->payid' type='checkbox'></td></tr>";
        }
        $outPut = sprintf($html, $add . "</table>");
        echo $outPut;
    });
}