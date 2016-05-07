<?php
function createsmallimg($dir,$source_img,$small_ex="_s") {
	$img_name=substr($source_img,0,-4);
	$img_ex = strtolower(substr(strrchr($source_img,"."),1));
	// echo "ima_ex:".$img_ex;
	switch($img_ex){
		case "jpg":
			$src_img=ImageCreateFromJpeg($dir.$source_img);
			break;
		case "gif":
			$src_img=ImageCreateFromGif($dir.$source_img);
			break;
	}
	// $src_img=ImageCreateFromJpeg("../files/defaultFace_male.jpg");
	$maxheight="100";
	$old_width=imagesx($src_img);
	$old_height=imagesy($src_img);
	$new_height="100";
	$new_width="201";
	// if($maxheight>=$maxheight) {
	// 	$new_height=$maxheight;
	// 	// $new_width=($new_height*$old_width)/$old_height;
		
	// }
	if($img_ex=="jpg"){
		$dst_img=imagecreatetruecolor($new_width,$new_height);
	}else{
		$dst_img=imagecreate($new_width,$new_height);
	}
	ImageCopyResized($dst_img,$src_img,0,0,0,0,$new_width,$new_height,$old_width,$old_height);
	$smallname=$dir.$img_name.$small_ex.".".$img_ex;
	// echo $smallname;
	switch($img_ex) {
		case "jpg":
			ImageJpeg($dst_img,$smallname,201);
			break;
		case "gif":
			imageGif($dst_img,$smallname,100);
			break;
	}
	echo "<img src='{$smallname}'>";
}
// echo "<img src='../files/defaultFace_male.jpg'>";
// $dir="../files/";
// $source_img="defaultFace_male.jpg";
// createsmallimg($dir,$source_img);