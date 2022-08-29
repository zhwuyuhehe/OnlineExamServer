<?php require './functions/logout_function.php' ?>
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <link rel="stylesheet" type="text/css" href="css/zhwuyuhehe.css">
    <meta charset="UTF-8">
    <title>登录页面</title>
</head>
<body>
<a href="index.php" title="返回首页"><img src="img/logo.png" alt="logo"></a>
<h3><?php require './functions/login_function.php'; ?></h3>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="login_form" name="login_form">
    <p><label for="user_login">请输入账户：</label><input id="user_login" name="username" placeholder="邮箱或学号"
                                                         autocapitalize="off" value size="32"/></p>
    <p><label for="user_pass">请输入密码：</label><input id="user_pass" name="psd" type="password" value size="32"></p>
    <p><input class="loginbutton" type="submit" value="登录"><input class="loginbutton" name="out" type="submit"
                                                                    value="注销"></p>
</form>
<p>如使用中有问题，请联系QQ：1710734972</p>
<p>在关闭页面前，请先退出登录，否则账户登录状态可能出现问题！</p>
<div><?php printf("你的IP为：%s\n", $ip = $_SERVER["REMOTE_ADDR"]); ?></div>
<div><?php require './functions/population_function.php';
    new online(); ?></div>

</body>
