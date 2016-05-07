<?php
include_once 'string.func.php';
// require_once '../include.php';
function verifyImage($type = 1,$length = 4,$pixel = 0,$line = 0,$sess_name = "verify"){
    //session_start();
    // ´´½¨»­²¼
    $width = 80;
    $height = 28;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    
    // ÓÃÌî³ä¾ØÐÎÌî³ä»­²¼
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    
    
    $chars = buildRandomString($type, $length);
    
    $_SESSION[$sess_name] = $chars;
    $fontfiles = array(
        "MSYH.TTC",
        "MSYHBD.TTC",
        "SIMLI.TTF",
        "MSYHL.TTC",
        "SIMSUN.TTC",
        "SIMYOU.TTF",
        "STZHONGS.TTF"
    );
    for ($i = 0; $i < $length; $i ++) {
        $size = mt_rand(14, 18);
        $angle = mt_rand(- 15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(20, 26);
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $fontfile = "../fonts/" . $fontfiles[mt_rand(0, count($fontfiles) - 1)];
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    
    if ($pixel) {
        for ($i = 0; $i < 50; $i ++) {
            imagesetpixel($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }
    
    if ($line) {
        for ($i = 1; $i < $line; $i ++) {
            imageline($image, mt_rand(0, $width - 1), mt_rand(0, $height - 1), mt_rand(0, $width - 1), mt_rand(0, $height - 1), $black);
        }
    }
    
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}

  // verifyImage();


//修改图片大小
function createsmallimg($source_img,$height,$width,$dir="./files/",$small_ex="_s") {
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
    $new_height=$height;
    // $new_height="100";
    // $new_width="201";
    $new_width=$width;
    // if($maxheight>=$maxheight) {
    //  $new_height=$maxheight;
    //  // $new_width=($new_height*$old_width)/$old_height;
        
    // }
    if($img_ex=="jpg"){
        $dst_img=imagecreatetruecolor($new_width,$new_height);
    }else{
        $dst_img=imagecreate($new_width,$new_height);
    }
    ImageCopyResized($dst_img,$src_img,0,0,0,0,$new_width,$new_height,$old_width,$old_height);
    $smallname=$dir.$img_name.$small_ex.".".$img_ex;
    switch($img_ex) {
        case "jpg":
            ImageJpeg($dst_img,$smallname,201);
            break;
        case "gif":
            imageGif($dst_img,$smallname,100);
            break;
    }
    return $smallname;
    // echo "<img src='{$smallname}'>";
}
// echo "<img src='../files/defaultFace_male.jpg'>";
// $dir="../files/";
// $source_img="defaultFace_male.jpg";
// createsmallimg($dir,$source_img);