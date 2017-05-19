<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="<?php echo get_template_directory_uri(); ?>/file3css.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="all">
<div id="head" style="height: 155px">
        <div id="header">
            <div id="headerl">
                <img src="<?php echo get_template_directory_uri(); ?>/image/file1.image/LOGO鲜花隧道.jpg" style="height: 100px;width: 200px">
            </div>
            <div id="header2">
                <ul id="menu">
                    <li><a href="#">关于我们</a></li>
                    <li><a href="index.php?page=server">服务领域</a></li>
                    <li><a href="index.php?page=signup">我要报名</a></li>
                    <li><a href="index.php?page=news">新闻动态</a></li>
                    <li><a href="index.php">首页</a></li>
                </ul>
            </div>
</div>

    <!--</div>header结束-->
    </div>
<div id="main">
    <div id="main-top">
        <span  ><a href="#">首页</a> <img src="<?php echo get_template_directory_uri(); ?>/image/file1.image/arrow.jpg" style="height: 15px;width: 15px">
        <a href="#">我要报名</a> <img src="<?php echo get_template_directory_uri(); ?>/image/file1.image/arrow.jpg" style="height: 15px;width: 15px"> <a href="#">天目7尖越野赛中巴及住宿预定通道</a>
        </span>
        <div style="height: 40px" ></div>
        <h1>天目7尖越野赛中巴及住宿预定通道</h1>
        <hr>
        <div id="news" style="height: 380px">
            <div id="news-left"><img src="<?php echo get_template_directory_uri(); ?>/image/file1.image/time.jpg" style="height: 240px;width: 450px"></div>
            <div id="news-right">
                <div class="tb">
                    <table style="width: 100%">
                        <thead>
                        <tr>
                            <td style="text-align: left"> 费  用 ：<span class="cost">¥200</span></td>
                            <td style="text-align: right">已报名5/剩余25</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="text-align: left"> 开始时间 ：2017-04-27 14:55</td>
                        </tr>
                        <tr>
                            <td> 选择分组 ： <select>
                                <option>中巴预定</option>
                                <option>住宿补增</option>
                            </select></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                    <div id="td">
                        <table>
                            <tr>
                                <td>  集 合 点：浙江 杭州 滨江 地铁1号线江陵路c出口</td>
                            </tr>
                            <tr><td> 目 的 地 ：浙江 杭州 临安 天目山景区</td>
                            </tr>
                            <tr>
                                <td><input type="button" value="我要报名"></td>
                            </tr>
                        </table>
                </div>
            </div>
            <div id="pic" >
                <img src="<?php echo get_template_directory_uri(); ?>/image/file1.image/time.jpg" style="width: 90px;height: 65px">
                <img src="<?php echo get_template_directory_uri(); ?>/image/file1.image/map.jpg" style="width: 90px;height: 65px;padding-left: 20px">
            </div>
        </div><!--news结束-->
        <div id="tips">
            <div class="tips-top">
                <div class="tips-center">
                    <div class="same">注意事项</div>
                </div>
            </div>
            <div class="tips-below"><p>   如预定人数不足10人，我们可能会采用小车接送，往返交通请服从安排</p></div>
        </div>
        <div id="nav">
                <ul style="padding: 0px;">
                    <li><a href="#">赛事说明</a></li>
                    <li><a href="#">组别&奖金</a></li>
                    <li><a href="#">赛事动态</a></li>
                    <li><a href="#">成绩查询</a></li>
                    <li><a href="#">赛事点评</a></li>
                </ul>

        </div>
    </div><!--main-top结束-->
    <hr>
    <div id="main-below">
        <div id="detail">
            <div class="detail-top">
                <div class="detail-center"><div class="same">
                    详细信息
                </div></div>
            </div>
            <div class="detail-below">
                <div style="width: 80%;height: 350px;"><p>   如预定人数不足10人，我们可能会采用小车接送，往返交通请服从安排</p>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/image/file1.image/map.jpg" style="width: 80%;height: 250px">
            </div>
        </div>
        <div id="recommend">
            <div id="recommend-text"><h2>相关推荐</h2></div>
            <div id="recommend-pic">
                <div id="rcm-left">
                  <img src="<?php echo get_template_directory_uri(); ?>/image/file1.image/time.jpg" style="height: 170px;width: 230px">
                    <h6 style="margin-top: 10px;margin-bottom: 0px">天目7尖越野赛中巴及住宿预定通道</h6>
                    <p>¥130</p>
                </div>
                <div id="rcm-right">
                    <img src="<?php echo get_template_directory_uri(); ?>/image/file1.image/map.jpg" style="height: 170px;width: 230px">
                    <h6 style="margin-top: 10px;margin-bottom: 0px">第四界天目7尖越野赛</h6>
                    <p>¥130</p>
                </div>
            </div>
        </div>
        <div id="match">
            <h3>赛事动态</h3>
                <textarea  id="match-box" >
                </textarea>
        </div>
        <input id="bt" type="button" value="提交">
    </div>
</div>
</div>
</body>
</html>