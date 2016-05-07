<?php
// include_once '../include.php';
include_once (ROOT.'/include.php');

function postAchievement() {
    $arr=$_POST;
    $arr['publishName']=$_SESSION['username'];
    $arr['publishTime']=time();
    $arr['isHot']=0;
    $arr['isHighQuality']=0;
    $arr['likeNumber']=0;
    $arr['achivementImg']=uploadFile();
    // $sql="select id from ".POST;
    // $result=fetchOne($sql);
    // $arr['cId']=$result['id'];
    // $arr['qImg']=getFile();
    // $arr['postImg']="This is a picture";
    if (insert(ACHIEVEMENT, $arr)) {
        alertMes("Post Successfully!","trends.php");
    }
    else{
        alertMes("Sorry!Post Failed!Please Post Again!","post-create.php");
    }
}

/**
 *管理员add帖子
 */
function addAchievement(){
    $arr=$_POST;
    $arr['publishName']=$_SESSION['adminName'];
    // echo $arr['publishName'];
    if ($arr['publishName'] == Null) {
        # code...
        alertMes("Sorry!Please login firstly!","login.html");
    }else{
        $arr['articleImg']=uploadFile();
        $arr['publishTime']=time();
        $arr['isHot']=0;
        $arr['isHighQuality']=0;
        $arr['likeNumber']=0;
        if (insert(ARTICLE,$arr)) {
            # code...
            alertMes("Add article successfully!","article-design.php");
        }else{
            alertMes("Add article failed!","article-design.php");
        }
    }
}

/**
 *帖子分页显示
 */
function getAchievementByPage($pageSize=2){
    $sql="SELECT * FROM ".ARTICLE;
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
    $sql="select * from ".ARTICLE." limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}

/**
 *修改帖子
 */
function editAchievement($id){
    $arr=$_POST;
    //     print_r($arr);
    $arr['publishName']=$_SESSION['adminName'];
    // $arr['regTime']=time();
    if ($arr['publishName'] == Null) {
        # code...
        alertMes("Sorry!Please login firstly!","login.html");
    }else{
        $arr['articleImg']=uploadFile();
        $arr['publishTime']=time();
        $arr['isHot']=0;
        $arr['isHighQuality']=0;
        $arr['likeNumber']=0;
        if (update(ARTICLE,$arr,"id={$id}")) {
            # code...
            alertMes("Edit article successfully!","article-design.php");
        }else{
            alertMes("Edit article failed!","article-design.php");
        }
    }
}

/**
 *删除帖子
 */
function delAchievement($id){
    if (delete(ARTICLE,"id={$id}")) {
        alertMes("Successfully!","article-design.php");
    }else{
        alertMes("Failed!","article-design.php");
    }
}

function getAllAchievement(){
    $sql="select *from ".ARTICLE;
    return fetchAll($sql);
}