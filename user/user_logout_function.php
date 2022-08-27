<?php
if ($_POST["out"]) {
    if (isset($_COOKIE['user_login'])) {
        session_start();
        setcookie("display_name",'',NULL,'/PHP');
        //服务器的此处设置为'/'
        setcookie(session_name(), '', NULL, '/');
        session_unset();
        session_destroy();
        header('location:../login_logout_tmp.php');
    } else {
        printf("<script>alert('登录过之后才能注销~');</script>");
    }
}
class user_logout_function{
    function __construct()
    {
            if (isset($_COOKIE['user_login'])) {
                session_start();
                setcookie("display_name",'',NULL,'/PHP');
                //服务器的此处设置为'/'
                setcookie(session_name(), '', NULL, '/');
                session_unset();
                session_destroy();
                header('location:../login_logout_tmp.php');
            } else {
                printf("<script>alert('登录过之后才能注销~');</script>");
            }
        }
}