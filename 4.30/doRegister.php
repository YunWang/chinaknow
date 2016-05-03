<?php
include_once './include.php';
$arr=$_POST;
if ($arr['password'] != $arr['confirmpassword']) {
	# code...
	alertMes("Failed!Double password is different!","register.html");
}
register();
?>