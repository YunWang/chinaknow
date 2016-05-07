<?php
include_once("include.php");
$arr_join['activityId']=$_REQUEST['activityId'];
$arr=$_POST;
$arr['username']=$_SESSION['username'];
if (!update(USER,$arr,"username='{$arr['username']}'")) {
	# code...
	alertMes("Sorry error,please try later","article1.php?id=".$arr_join['activityId']);
}
$sql="select * from ".USER." where username='{$arr['username']}'";
$row=fetchOne($sql);
$arr_join['userId']=$row['id'];
if (!insert(JOIN,$arr_join)) {
	# code...
	alertMes("Sorry,error occur","article1.php?id=".$arr_join['activityId']);
}
alertMes("Successfully!","article1.php?id=".$arr_join['activityId']);
?>