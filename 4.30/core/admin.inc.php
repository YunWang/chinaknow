<?php
/**
 * 检查是否是管理员
 * @param string $sql
 * @return multitype:
 */
function checkAdmin($sql){
    return fetchOne($sql);
}

/**
 * 是否登陆
 */
function checkLogined() {
    if ($_SESSION['adminId'] == "" && $_COOKIE['adminId'] == "") {
        alertMes("请先登陆", "admin.php");
    };
}

/**
 * 添加管理员
 * @return string
 */
function addAdmin() {
    $arr['username']=$_POST['username'];
    $arr['password']=md5($_POST['password']);
    $arr['email']=$_POST['email'];
//     print_r($arr);
    if (insert(ADMIN, $arr)) {
        alertMes("Successfully!","admin-design.php");
    }else {
        // print_r(mysql_error());
        alertMes("Failed!","admin-design.php");
    }
}

/**
 * 得到全部的管理员
 * @return multitype:
 */
function getAllAdmin(){
    $sql = "select id,username,email,password from ".ADMIN;
    $rows = fetchAll($sql);
    return $rows;
}

function getFirstAdminId(){
    $sql="select id from ".ADMIN;
    $rows=fetchAll($sql);
    $id=$rows[0]['id'];
    return $id;
}


/**
 * 编辑管理员
 * @param int $id
 * @return string
 */
function editAdmin($id){
    $arr['username']=$_POST['username'];
//     print_r($arr);
    $arr['password']=md5($_POST['password']);
    $arr['email']=$_POST['email'];
//     print_r($expression)
    if (update(ADMIN, $arr,"id={$id}")) {
        alertMes("Successfully!","admin-design.php");
    }else{
        alertMes("Failed!","admin-design.php");
    }
    return $mes;
}




/**
 * 删除管理员
 * @param int $id
 * @return string
 */
function delAdmin($id) {
    if (delete(ADMIN,"id={$id}")) {
        alertMes("Successfully!","admin-design.php");
    }else{
        alertMes("Failed!","admin-design.php");
    }
    return $mes;
}

function delMultipleAdmin($id,$pageSize=2)
{
    $firstId=getFirstAdminId();
    for($i=0;$i<$pageSize;$i++){
        $idOffset=$firstId+$id+$i;
        delete(ADMIN,"id={$idOffset}");
    }
    if($i == $pageSize)
    {
        alertMes("Successfully!","admin-design.php");
    }else{
        alertMes("Failed!","admin-design.php");
    }
}


function getAdminByPage($pageSize=2) {
    $sql="SELECT * FROM ".ADMIN;
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
    $sql="select id,username,email from ".ADMIN." limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}

function getTagName(){
    $sql="select tagName from ".TAG;
    $rows = fetchAll($sql);
    return $rows;
}

/**
 * 注销
 */
function logout(){
    $_SESSION=array();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(),"",time()-1);
    }
    if (isset($_COOKIE['adminId'])) {
        setcookie("adminId","",time()-1);
    }
    if (isset($_COOKIE['adminName'])) {
        setcookie("adminName","",time()-1);
    }
    session_destroy();
    header("location:login.html");
}