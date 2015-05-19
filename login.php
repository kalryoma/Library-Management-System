<?php header("content-type:text/html; charset=utf-8");
    $type = $_POST['type'];
    $id = $_POST['account'];
    setcookie("id", $id);
    $pwd = $_POST['password'];
    $conn = mysql_connect("localhost", "root", "root");
    mysql_query("set names utf8;");
    if ($type=="我是用户"){
        $result = mysql_db_query("test", "select cid from cards where cid='$id'", $conn);
        if (mysql_fetch_row($result))
            $url = "user.php";
        else
            $url = "login.html";
    }
    if ($type=="我是管理员"){
        $result = mysql_db_query("test", "select password from admin where aid='$id'", $conn);
        $row = mysql_fetch_row($result);
        $password = $row[0];
        if ($pwd==$password)
            $url = "admin.php";
        else
            $url = "login.html";
    }
    mysql_close($conn);
    echo "<script language='javascript' type='text/javascript'>window.location.href='$url';</script>";
?>