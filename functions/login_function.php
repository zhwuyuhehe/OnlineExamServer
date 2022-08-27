<?php
if ($_COOKIE) {
    echo "<div>你已经登录过了</div>";
    echo "<div>如需登录其他账户请先注销</div>";
} else {
    if ($_POST["out"]) { //此处仅仅防止点击注销按钮，提交了登录信息。
        echo "请先登录";
    } else {
        $username = $_POST['username'];
        $userpswd = $_POST['psd'];
        if (!$username || !$userpswd) {
            echo "请输入账号与密码";              //判断用书输入的账户与密码是否为空
        } else {               //不为空，判断密码是否正确
            require './functions/conn.php';
            $result = $conn->query("SELECT * FROM `sky`.`userlogin` WHERE (username='$username' OR usernum='$username') AND (password='$userpswd')");
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            if ($rows) {
                foreach ($rows as $row) {
                    session_start();
                    $_SESSION['display_name'] = $row['username'];
                    setcookie("display_name", $row['username']);
                }
                header("location:login_logout_tmp.php");
            } else {
                echo "账号或密码不正确";
            }
        }
    }
}