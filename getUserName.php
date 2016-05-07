<?php
include_once("include.php");
$username=$_SESSION['username'];
$arr = array('username' => $username,
	'password'=>'qwe',
	'id'=>'1',
	''
	);
$json_string = json_encode($arr);  
echo "getProfile($json_string)"; 
?>