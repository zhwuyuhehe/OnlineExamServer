<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <link rel="stylesheet" type="text/css" href="css/login_logout_tmp.css">
    <?php
    if (isset($_COOKIE['user_login']))
        echo '<meta charset="UTF-8" http-equiv="refresh" content="3;url=user/user_page.php">';
    else echo '<meta charset="UTF-8" http-equiv="refresh" content="3;url=index.php">';
    ?>
    <title>登录成功</title>
</head>
<body>
<a href="index.php" title="返回首页"><img src="img/logo.png" alt="logo"></a>
<?php
if (isset($_COOKIE['user_login'])) {
    printf("<h3>%s，欢迎登入！</h3>", $_COOKIE['display_name']);
    echo "<h3>即将跳转个人首页，请稍等~</h3>";
} else {
    printf("<h3>注销成功</h3>");
    echo "<h3>即将跳转首页，请稍等~</h3>";
}
?>

<div class="waiting"></div>

</body>
</html>