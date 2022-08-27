<?php


class total
{
    function __construct()
    {
        require './functions/conn.php';
        $result = mysqli_fetch_array($conn->query("SELECT COUNT(*) AS Total FROM `userlogin`"));
        printf("当前已经有%d位小伙伴加入了我们哟~\n", $result["Total"]);
    }
}

class online
{
    function __construct()
    {
        $countFile = 0;
        $totalFiles = glob("./tmp/*");
        if ($totalFiles) {
            $countFile = count($totalFiles);
        }
        printf("目前有%d位小伙伴已上线~\n", $countFile);
    }
}