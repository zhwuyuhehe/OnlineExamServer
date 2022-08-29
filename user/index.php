<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1, minimum-scale=1">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css"/>
    <link rel="stylesheet" type="text/css" href="../font/iconfont.css"/>
    <script src="../js/jquery-3.4.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/common.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="container_index">
<?php
require '../functions/check_login_function.php';
?>
<div class="header">
    <div class="_user">
        <img src="../img/1.png" id="sex_boy" class="user_img _hidden" alt="男生默认头像"/>
        <img src="../img/2.png" id="sex_girl" class="user_img _hidden" alt="女生默认头像"/>
        <div class="user_name" id="user_name"></div>
    </div>
    <div class="_grade">
        <i class="iconfont icon-chengji"></i>
        <div class="_number" id="now-time"></div>
    </div>
</div>
<div class="handle_list">
    <div class="h_l_item" onclick="toExam()">
        <i class="iconfont icon-kaoshi"></i>第一套题
    </div>
</div>
<div class="_back" onclick="goBack()">
    <i class="iconfont icon-icon4"></i>
</div>
<script type="text/javascript">
    setInterval(function now_time() {
        let now = (new Date()).toLocaleString();
        $('#now-time').text(now);
    }, 500);

    $(function () {
        let userInfo = JSON.parse(unescape(getQueryName('info')));
        if (userInfo.sex == '1') {
            $('#sex_boy').removeClass('_hidden');
        } else {
            $('#sex_girl').removeClass('_hidden');
        }
        $("#user_name").text(userInfo.name);
        // console.log(userInfo,"  ===userInfouserInfo")
    })

    function toExam() {
        location.href = "exam.php";
    }

    function goBack() {
        location.href = "../login.php";
    }
</script>
</body>
</html>
