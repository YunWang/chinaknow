<?php
include_once '../include.php';
// session_start();
$username=$_POST['username'];
// print_r($_POST['password']);
$password=md5($_POST['password']);
// $password=$_POST['password'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
// $autoFlag=$_POST['autoFlag'];
// if ($verify == $verify1) {
    $sql="select * from ".ADMIN." where username='{$username}'and password='{$password}'";
//     print_r($sql);
    $row=checkAdmin($sql);
//     print_r($row);
    if ($row) {
//         if ($autoFlag) {
//             setcookie("adminId",$row['id'],time() + 7*24*3600);
//             setcookie("adminName",$row['username'],time()+7*24*3600);
//         }
        $_SESSION['adminName']=$row['username'];
        $_SESSION['adminId']=$row['id'];
        //header("location:index.php");
        alertMes("登陆成功", "index.php");
    }else {
        alertMes("登陆失败,重新登陆", "login.html");
    }
// }else {
//     alertMes("验证码错误,重新登陆", "login.html");
// }