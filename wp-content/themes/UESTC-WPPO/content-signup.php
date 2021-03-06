<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>file.2</title>
</head>
<body>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>form</title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/filecss2.css"/>
</head>
<body>
<div id="formtitle">
    <h1>填写报名信息</h1>
</div>
<div id="section1">
    <h1>
        <table class="table">
            <caption>天目七尖越野赛中巴及住预定通道</caption>
            <thead>
            <tr>
                <th colspan="2"><strong>活动信息</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>集 合 地：浙江 杭州 滨江 地铁1号线江陵路C出口</td>
                <td>目 的 地：浙江 杭州 临安 天目山景区</td>
            </tr>
            <tr>
                <td>开 始 时 间：2017-04-27</td>
                <td>天       数：14</td>
            </tr>
            <tr>
                <td>选 择 分 组：中巴预定</td>
                <td>费       用：<span class="cost">¥200/人</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2"><strong>报名人信息<><span>（本活动的相关通知会通知第1个报名人，请留意手机短信并准确填写报名人信息，以便办理各种手续和购买保险，最多添加25个）</span></td>
            </tr>
            </tfoot>
        </table>
</div>
<div  id="section2">
    <h1>第一个报名人</h1>
    <form>
        <table>
            <tr>
                <td><span class="stars">*</span> 真实姓名：
                    <input type="text" value="" id="name">
                </td>
                <td class="lastcol"><span class="stars">*</span>性别：
                    <select name="sex" id="sex">
                        <option value="male" selected="selected">男</option>
                        <option value="female">女</option>
                        <lect>
                </td>
            </tr>
            <tr>
                <td><span class="stars">*</span>手机号码：
                    <input type="text" pattern="[0-9]" value="" id="number">
                </td>
            </tr>
            <tr>
                <td><span class="stars">*</span>证件信息：
                    <select name="sex" id="card-number">
                        <option value="idcard" selected="selected">身份证</option>
                        <option value="none">none</option>
                        </select>
                </td>
                <td class="lastcol"><input  type="text"  placeholder="请输入证件号码" class="idnum" id="id-number"></td>
            </tr>
        </table>
    </form>
</div>
<div id="section3">
    <div id="buttons">
        <input type="button" value="+新增报名人员">
        <input type="button" value="导入最近报名人">
    </div>
    <div id="pay">
        <span id="left">支付方式：</span>
        <span><input name="shuzi" id="zhifubao" type="radio"  /><img src="<?php echo get_template_directory_uri(); ?>/image\file2.img\zhifubao.jpg"></span>
        <span><input name="shuzi" id="weixin" type="radio" /><img src="<?php echo get_template_directory_uri(); ?>/image\file2.img\weixin.jpg"></span>
        <span id="right">应付金额：<span class="cost">¥200</span></span>
    </div>
    <div id="submit">
        <input id="save" type="submit" value="提交订单">

    </div>
</div>


<script src="http://apps.bdimg.com/libs/jquery/1.11.1/jquery.js"></script>
<script>
    $(document).ready(function () {
        $("#save").click(function () {
            $.ajax({
                type:"POST",
                url:"wp-admin/admin-ajax.php" ,
                dataType:"json",
                data:
                {
                    action:"signupsys_alipay",
                    name:$("#name").val(),
                    sex:$("#sex").val(),
                    number:$("#number").val(),
                    card:$("#card-number").val(),
                    paid1:$("#zhifubao").val(),
                    paid2:$("#weixin").val(),
                },
                success:function (data) {
                    alert(data);
                }

        });

        });

    })
</script>
</body>
</html>