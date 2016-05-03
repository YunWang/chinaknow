<?php
// include_once '../include.php';
include_once (ROOT.'/include.php');

function postMessages() {
    $arr=$_POST;
    $arr['publishName']=$_SESSION['username'];
    $arr['publishTime']=time();
    $arr['isHot']=0;
    $arr['isHighQuality']=0;
    $arr['likeNumber']=0;
    $arr['postImg']="This is a picture";
    // $sql="select id from ".POST;
    // $result=fetchOne($sql);
    // $arr['cId']=$result['id'];
    // $arr['qImg']=getFile();
    // $arr['postImg']="This is a picture";
    if (insert(POST, $arr)) {
        alertMes("Post Successfully!","index.html");
    }
    else{
        alertMes("Sorry!Post Failed!Please Post Again!","post-create.html");
    }
}

/**
 *管理员add帖子
 */
function addPost(){
    $arr=$_POST;
    $arr['publishName']=$_SESSION['username'];
    // echo $arr['publishName'];
    if ($arr['publishName'] == Null) {
        # code...
        alertMes("Sorry!Please login firstly!","../login.html");
    }else{
        $arr['postImg']="This is a picture";
        $arr['publishTime']=time();
        $arr['isHot']=0;
        $arr['isHighQuality']=0;
        $arr['likeNumber']=0;
        if (insert(POST,$arr)) {
            # code...
            alertMes("Add post successfully!","post-design.php");
        }else{
            alertMes("Add post failed!","post-design.php");
        }
    }
}

/**
 *帖子分页显示
 */
function getPostByPage($pageSize=2){
    $sql="SELECT * FROM ".POST;
    // print($sql);
    $totleRows=getResultNumber($sql);
    //  echo $totleRows;
    //得到总页码数
    global $totalPage;
    if (0 == $pageSize) {
        alertMes("每页显示条数不能为零", "index.php");
    }elseif (0 > $pageSize){
        alertMes("每页显示的条数不能小于零", "index.php");
    }else {
        $totalPage=ceil($totleRows/$pageSize);
    }
    $page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
    if ($page<1||$page==null||!is_numeric($page)) {
        $page=1;
    }
    if ($page>=$totalPage) {
        $page = $totalPage;
    }
    $offset = ($page-1)*$pageSize;
    $sql="select * from ".POST." limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 *修改帖子
 */
function editPost($id){
    $arr=$_POST;
    //     print_r($arr);
    $arr['publishName']=$_SESSION['adminName'];
    // $arr['regTime']=time();
    if ($arr['publishName'] == Null) {
        # code...
        alertMes("Sorry!Please login firstly!","login.html");
    }else{
        $arr['postImg']="This is a picture";
        $arr['publishTime']=time();
        $arr['isHot']=0;
        $arr['isHighQuality']=0;
        $arr['likeNumber']=0;
        if (update(POST,$arr,"id={$id}")) {
            # code...
            alertMes("Edit post successfully!","post-design.php");
        }else{
            alertMes("Edit post failed!","post-design.php");
        }
    }
}

/**
 *删除帖子
 */
function delPost($id){
    if (delete(POST,"id={$id}")) {
        alertMes("Successfully!","post-design.php");
    }else{
        alertMes("Failed!","post-design.php");
    }
}