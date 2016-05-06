<?php
include_once './include.php';
$arr=$_POST;
$arr['email'] = stripslashes(trim($_POST['email'])); 
$query = mysql_query("select id from ".USER." where email ='{$arr['email']}'"); 
$num = mysql_num_rows($query);
if($num==1){ 
    alertMes("Email is exist,Please enter login directly","index.php"); 
    exit; 
} 
if ($arr['password'] != $arr['confirmpassword']) {
	# code...
	alertMes("Failed!Double passwords are different!","register.html");
}
register();
?>