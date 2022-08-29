<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <title>用户个人页面</title>
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">设置兼容的大小，暂时用不到。-->
    <script src="../js/jquery-3.4.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="../css/user_page.css"/>
</head>
<body>
<?php
//require '../functions/check_login_function.php';
require 'user_logout_function.php';
?>
<a href="../index.php" title="返回首页"><img src="../img/logo.png" alt="logo"></a>

<ul class="ca-menu">
    <li>
        <a href="../index.php">
            <span class="ca-icon">首页</span>
            <div class="ca-content">
                <h2 class="ca-main">返回首页</h2>
            </div>
        </a>
    </li>
    <li>
        <a type="button" onclick="toLogin()">
            <span class="ca-icon">答题</span>
            <div class="ca-content">
                <h2 class="ca-main">进入答题功能</h2>
            </div>
        </a>
    </li>

    <li>
        <form id="check_out" name="check_out" method="POST"
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <a onclick="document.getElementById('check_out').submit()">
                <span class="ca-icon">注销</span>
                <div class="ca-content">
                    <h2 class="ca-main">退出登录</h2>
                </div>
            </a>
            <input type="hidden" name="out" value="退出登录">
        </form>
    </li>


    <li>
        <a href="#">
            <span class="ca-icon" id="heart">待开发</span>
            <div class="ca-content">
                <h2 class="ca-main">新功能开发中~</h2>
            </div>
        </a>
    </li>
    <!--下方待增加功能，可自己写入新的跳转页面，功能按钮。......
    <li>
        <a href="#">
            <span class="ca-icon">L</span>
            <div class="ca-content">
                <h2 class="ca-main">Unconditional Support</h2>
            </div>
        </a>
    </li>
    <li>
        <a href="#">
            <span class="ca-icon">Z</span>
            <div class="ca-content">
                <h2 class="ca-main">Unconditional Support</h2>
            </div>
        </a>
    </li>
    <li>
        <a href="#">
            <span class="ca-icon">I</span>
            <div class="ca-content">
                <h2 class="ca-main">Unconditional Support</h2>
            </div>
        </a>
    </li>
    <li>
        <a href="#">
            <span class="ca-icon">M</span>
            <div class="ca-content">
                <h2 class="ca-main">Unconditional Support</h2>
            </div>
        </a>
    </li>
    -->
</ul>

<script type="text/javascript">
    function toLogin() {
        let name = '<?php echo $_COOKIE['display_name'];?>';
        if (!name) {
            layer.msg('进入答题功能出错，无法获取用户名。');
            return
        }
        let info1 = {
            sex: '1',
            name: name,
            grade: '20'
        }
        let info2 = {
            sex: '2',
            name: name,
            grade: '50'
        }
        let info = name.indexOf('1') > -1 ? JSON.stringify(info1) : JSON.stringify(info2);
        console.log(info, "  ===info", JSON.parse(info));
        location.href = "index.php?info=" + escape(info);

    }
</script>

</body>
</html>