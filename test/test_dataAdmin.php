<?php
require_once '../include.php';

/*
 *Get all admin
 */
$rows=getAllAdmin();
$arr=array(
	'username' => $rows[0]['username'],
	'id' => $rows[0]['id'],
	'password'=>$rows[0]['password'],
	'email'=>$rows[0]['email'],
	);
// print_r($arr);
$json_arr=json_encode($arr);
// echo $json_arr;
echo "getProfile($json_arr)";