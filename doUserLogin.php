<?php
require_once './include.php';
// require_once './include.php';

$email=$_POST['email'];
if (verifyEmailFormat($email)) {
	# code...
	$password=md5($_POST['password']);
	$sql="select username,email,password from ".USER." where email = '{$email}' and password = '{$password}'";
	$row=checkUser($sql);
	if($row){
		$_SESSION['username']=$row['username'];
		alertMes("Login Successfully!","index.php");
	}else{
		alertMes("Failed!","index.php");
	}
}else{
	alertMes("Your email format is error","index.php");
}