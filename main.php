<?php

echo "现在时间是 " . date("h:i:sa");


$conn = new mysqli("这里是数据库IP", "数据库登录账户", "数据库密码", "选择的库");
$result = $conn->query("SELECT * FROM `sky`.`question_data` WHERE examNum='1'");
$rows = $result->fetch_all(MYSQLI_ASSOC);
if ($rows) {
    foreach ($rows as $row) {
        $examList = $row['examList'];
        echo $examList;
    }
} else echo '未获取到题目';
//session_name("wasd");
//session_start();
//echo session_name();
//$_SESSION['qwe']='8';
//$flag=$_SESSION['qwe'];
//echo boolval($flag);
//session_gc();
//session_destroy();

/*
echo htmlspecialchars($_SERVER["PHP_SELF"])."\r\n";
echo $_SERVER['PHP_SELF'];

 */





/*
setcookie("test","your own cookies",time()+20);
if (isset($_COOKIE["user"]))
    echo "欢迎 " . $_COOKIE["userlogin"] . "!<br>";
else
    echo "普通访客!<br>";
/*$servername = "数据库地址";
$username = "数据库登录账户";
$password = "数据库密码";
*/


/*
// 创建连接
$dbname ="sky";
$conn = new mysqli("数据库地址", "数据库登录账户", "数据库密码","选择的库");

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功\r\n";
$result = $conn->query("SELECT * FROM `sky`.`userlogin` ORDER BY `username` LIMIT 1000");
echo $result->num_rows,"\r\n";
$rows = $result->fetch_all(MYSQLI_ASSOC);
foreach ($rows as $row) {
    printf("%s [%s]\n", $row["username"], $row["password"]);
}
$research =$conn->query("SELECT * FROM `sky`.`userlogin` WHERE (username='1710734972@qq.com' OR usernum='20050101001')AND (password='123456')");
$rowresu =$research->fetch_all(MYSQLI_ASSOC);
foreach ($rowresu as $rs2) {
    printf("%s\n", $rs2["usernum"]);
}
*/

/*
echo "上方为数据库的访问，下方显示日志\r\n";

$file = fopen('C:\Users\Z\Desktop\项目\网站项目日志.htm','r');

if($file){
    while(!feof($file)){
        $line = fgetc($file);
        echo $line;
    }
}
fclose($file);

echo "上方为日志记录，下方显示phpinfo\r\n";

phpinfo();

*/

//<!--<!DOCTYPE HTML>-->
//<!--<html lang="zh_CN">-->
//<!--<head>-->
//<!--    <link rel="stylesheet" type="text/css" href="zhwuyuhehe.css">-->
//<!--    <meta charset="UTF-8">-->
//<!--    <title>登录页面</title>-->
//<!--</head>-->
//<!--<body>-->


//printf("%s\n",$_POST["out"]);
//printf("%s\n",$_POST["username"]);

//<!---->
//<!--<form action="functions/logout_function.php" method="POST" id="check_out">-->
//<!--    <div  onclick="document.getElementById('check_out').submit()">退出登录</div>-->
//<!--    <input type="hidden" name="out" value="退出登录">-->
//<!--</form>-->
//<!---->
//<!---->
//<!---->
//<!--</body>-->
