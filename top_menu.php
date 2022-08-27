
<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <title>用户菜单</title>
    <link rel="stylesheet" type="text/css" href="css/top_menu.css">
</head>
<body>
<?php
if (!isset($_COOKIE['user_login'])){
    echo '<script type="text/javascript">alert("请先登录");location.href="login.php";</script>';
}
require 'functions/logout_function.php';
?>
<nav class="top-right">
    <a class="disc l1">

        <form id="check_out" name="check_out" method="POST"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div onclick="document.getElementById('check_out').submit()">退出登录</div>
            <input type="hidden" name="out" value="退出登录">
        </form>
    </a>
    <a class="disc l2">
        <div>网站功能</div>
    </a>
    <a class="disc l3">
        <div>个人信息</div>
    </a>
    <a class="disc l4" href="user/user_page.php">
        <div>个人首页</div>
    </a>
    <a class="disc l5 toggle">
        菜单
    </a>
</nav>

<script>
    toggle = document.querySelectorAll(".toggle")[0];
    nav = document.querySelectorAll("nav")[0];
    toggle_open_text = '菜单';
    toggle_close_text = '菜单';

    toggle.addEventListener('click', function () {
        nav.classList.toggle('open');

        if (nav.classList.contains('open')) {
            toggle.innerHTML = toggle_close_text;
        } else {
            toggle.innerHTML = toggle_open_text;
        }
    }, false);
</script>

</body>
</html>

