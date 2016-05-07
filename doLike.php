<?php
include_once("include.php");
$id=$_REQUEST['id'];
$table=$_REQUEST['table'];
// addLikeNumber($table,$id);
// $sql="update ".ACTIVITYCOMMENT." set likeNumber+1 where id = '{$id}'";
// mysql_query($sql);
$sql="select * from ".$table." where id='{$id}'";
    // echo $sql;
    // echo "<script>alert(window.location.href); </script>";
    $row=fetchOne($sql);
    if (isset($row)) {
        # code...
        $number=$row['likeNumber'] + 1;
        $row['likeNumber']=$number;
        $sql2="update ".$table." set likeNumber = '{$row['likeNumber']}' where id='{$id}'";
        mysql_query($sql2);
    }
echo '<script>history.go(-1);</script>';