<?php
/**
 * Created by PhpStorm.
 * User: PulsarTAO
 * Date: 17-5-1
 * Time: 下午4:40
 */
/**
 * 阿里支付前台回调
 */
add_action('wp_ajax_nopriv_signupsys-alipay-return', 'signupsys_alipay_return');
function signupsys_alipay_return(){
    if($_REQUEST['app_id']=="your app id"){
        global $wpdb;
        $sql="UPDATE ".UESTC_SIGNIN." SET alipay = 1 WHERE payid={$_REQUEST['out_trade_no']}";
        $wpdb->query($sql);
    }
}

/**
 * 支付回调
 */
add_action('wp_ajax_nopriv_signupsys-alipay', 'signupsys_alipay');
function signupsys_alipay(){
    //var_dump($_POST);
    session_start();
    $out_trade_no=time();//订单号码
    $_SESSION['payid']=$out_trade_no;
    include "./alipay/AopSdk.php";
    $aop = new AopClient ();
    $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
    $aop->appId = 'your app_id';
    $aop->rsaPrivateKey = '请填写开发者私钥去头去尾去回车，一行字符串';
    $aop->alipayrsaPublicKey='请填写支付宝公钥，一行字符串';
    $aop->apiVersion = '1.0';
    $aop->postCharset='GBK';
    $aop->format='json';
    $aop->signType='RSA2';
    $request = new AlipayTradeWapPayRequest ();
    $request->setBizContent("{" .
        "    \"body\":\"赛事报名支付\"," .
        "    \"subject\":\"赛事报名\"," .
        "    \"out_trade_no\":\"{$out_trade_no}\"," .
        "    \"timeout_express\":\"90m\"," .
        "    \"total_amount\":9.00," .
        "    \"product_code\":\"QUICK_WAP_PAY\"" .
        "  }");
    $result = $aop->pageExecute ( $request);
    global $wpdb;
    global $current_user;
    $name=htmlspecialchars($_POST['name']);            //姓名
    $uid=isset($current_user->ID)?$current_user->ID:10;//用户id
    $sex=htmlspecialchars($_POST['sex'])=="mail"?1:0;  //性别
    $payid=$out_trade_no;                              //订单号
    $alipay=0;                                         //阿里支付
    $phone=is_int($_POST['number'])?$_POST['number']:0;//电话号码
    $sql="insert into ".UESTC_SIGNIN."(name,uid,sex,payid,alipay,phone) values ({$name},{$uid}),{$sex},{$payid},{$alipay},{$phone}";
    $wpdb->query($sql);
    echo $result;
    file_put_contents(__DIR__."/log/".time()."_alipay_call_back.log",var_export($_POST));
}

/**
 * 管理员审核
 */
add_action('wp_ajax_signupsys-edit', 'signupsys_edit');
function signupsys_edit()
{
    $act = $_POST;
    if (isset($act['act'])) {
        if (isset($act['data'])) {
            if($act['act']=="delete"){
                $id = $act['data'];
                global $wpdb;
                foreach ($id as $x) {
                    $sql = "DELETE FROM " . UESTC_SIGNIN . " WHERE payid=$x";
                    echo $sql;
                    $wpdb->query($sql);
                }
            }
            echo "----------------";
            if($act['act']=="check"){
                $id = $act['data'];
                global $wpdb;
                foreach ($id as $x) {
                    $sql = "UPDATE " . UESTC_SIGNIN . " SET ispayd = 1 WHERE payid = $x";
                    //echo $sql."<br>";
                    $wpdb->query($sql);
                }
                //echo 1;
            }

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
        $add = "<table><td>订单号</td><td>名字</td><td>性别</td><td>联系电话</td><td>用户名</td><td>订单日期</td><td>支付宝</td><td>支付情况</td></tr>";
        foreach ($signin as $x) {
            $alipay="未付款";
            if($x->alipay==1)$alipay="已付款";
            $sex="男";
            if($x->sex==0)$sex="女";
            $pay = "未付款";
            if ($x->ispayd == 1) $pay = "已付款";
            $add = $add . "<td>" . $x->payid . "</td><td>" . $x->name . "</td><td>" . $x->sex . "</td><td>" . $x->phone . "</td><td>" . $x->discrib . "</td><td>" . $x->time . "</td><td>" . $alipay . "</td><td>" . $pay . "</td><td><input class='state' value='$x->payid' type='checkbox'></td></tr>";
        }
        $outPut = sprintf($html, $add . "</table>");
        echo $outPut;
    });
}