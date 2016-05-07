<?php
include_once '../include.php';

/*
 *Get all admin
 */

$arr=getAllAdmin();
$json_arr=json_encode($arr);
echo $json_arr;