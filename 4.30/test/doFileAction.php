<?php
//$_FILES
$filename = $_FILES['myFile']['name'];
$type=$_FILES['myFile']['type'];
$tmp_name=$_FILES['myFile']['tmp_name'];
$error=$_FILES['myFile']['error'];
$size=$_FILES['myFile']['size'];

//判断错误信息
if($error == UPLOAD_ERR_OK){
	if (is_upload_file($tmp_name)) {
		# code...
		$destination="files/".$filename;
		if (move_uploaded_file($tmp_name, )) {
			# code...
			//
		}else{
			//文件移动失败
		}
	}else{

	}
}else{
	switch ($error) {
		case 1:
			# code...
			break;
		
		default:
			# code...
			break;
	}
}