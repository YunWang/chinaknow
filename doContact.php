<?php
include_once("include.php");
$arr=$_POST;
if (insert(CONTACT,$arr)) {
	# code...
	alertMes("Thank you for your suggestion","contct.html");
}else{
	alertMes("Sorry!","contct.html");
}
?>