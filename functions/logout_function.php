<script src="../layui/layui.js" type="text/javascript" charset="utf-8"></script>
<?php
if ($_POST["out"]) {
    if (isset($_COOKIE['user_login'])) {
        session_start();
        setcookie(session_name(), '', NULL, '/');
        setcookie("display_name");
        session_unset();
        session_destroy();
        header('location:login_logout_tmp.php');
    } else {
        printf("<script>layer.msg('登录过之后才能注销~');</script>");
    }
}