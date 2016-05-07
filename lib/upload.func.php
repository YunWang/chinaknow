<?php
include_once (ROOT.'/include.php');
// include_once './include.php';
// header("content-type:text/html:charset=utf-8");

$uploaddir = "../files/"; // 设置文件保存目录 注意包含/

// 设置允许上传文件的类型
$type = array(
    "jpg",
    "gif",
    "bmp",
    "jpeg",
    "png"
);


// 判断文件类型
// function uploadFile1($type,$uploaddir = "../files/")
// {
//     if (! in_array(strtolower(fileext($_FILES['file']['name'])), $type)) {
//         $text = implode(",", $type);
//         //echo "You can upload the file as follows:", $text, "<br>";
//     }  // 生成目标文件的文件名
//     else {
//         $filename = explode(".", $_FILES['file']['name']);
//         do {
//             $filename[0] = random(10); // 设置随机数长度
//             $name = implode(".", $filename);
//             // $name1=$name.".Mcncc";
//             $uploadfile = $uploaddir . $name;
//         } while (file_exists($uploadfile));
//         if ( is_uploaded_file($_FILES['file']['tmp_name']))
//          {
//             // print_r($uploadfile);
//              if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)){
//                 // 输出图片预览
// //                 echo "<script>alert(Successfully!);</script>";
//                  echo "<center><img src='$uploadfile'></center>";
//                 // echo "<br><center><a href='javascript:history.go(-1)'>Upload again!</a></center>";
//             } else {
//                 // echo "上传失败";
// //                 alertMes("Failed!", "test.php");
//                 echo "Failed!";
//             }
//         }else {
// //             alertMes("Failed!!", "test.php");
//             echo "Failed!";
//         }
//     }
//     return $uploadfile;
// }

/**
 * 检查文件类型
 * @param string $type
 * @return boolean
 */
function checkFileType($type)
{
    if ( !in_array(strtolower(fileext($_FILES['image']['name'])), $type)) {
        $text = implode(",", $type);
        echo "You can only upload the file as follows:", $text, "<br>";
        return FALSE;
    } else {
        return TRUE;
    }
}

/**
 * 得到文件的路径和文件名（文件位置）
 * @param string $uploaddir
 */
function getFileName($uploaddir="../files/") {
    $filename = explode(".", $_FILES['image']['name']);
    do {
        $filename[0] = random(10); // 设置随机数长度
        $name = implode(".", $filename);
        // $name1=$name.".Mcncc";
        $uploadfile = $uploaddir . $name;
    }while (file_exists($uploadfile));
    return $name;
}

/**
 * 上传图片
 * @param string $type
 */
function uploadFile($uploaddir="../files/") {
    $type = array(
        "jpg",
        "gif",
        "bmp",
        "jpeg",
        "png"
    );
    $name=getFileName();
    $uploadfile=$uploaddir.$name;
    if (checkFileType($type)) {
        
        if ( is_uploaded_file($_FILES['image']['tmp_name']))
        {
            // print_r($uploadfile);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)){
                // 输出图片预览
                //                 echo "<script>alert(Successfully!);</script>";
                // echo "<img src='$uploadfile'>";
                // echo "<br><center><a href='javascript:history.go(-1)'>Upload again!</a></center>";
            } else {
                // echo "上传失败";
                //                 alertMes("Failed!", "test.php");
                echo "Failed!";
            }
        }else {
            //             alertMes("Failed!!", "test.php");
            echo "Failed!";
        }
    }
    return $name;
}
// uploadFile($type);
// $cmd=$_POST['upload'];
// if ($cmd == "uploadImage") {
//     uploadFile($type);
// }



?>