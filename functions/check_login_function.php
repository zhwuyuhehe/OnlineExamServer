<?php
if (!isset($_COOKIE['user_login'])) {
    echo '<script type="text/javascript">alert("请先登录");location.href="../login.php";</script>';
}