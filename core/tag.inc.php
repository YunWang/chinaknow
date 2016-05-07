<?php
/**
 * 添加分类
 * @return string
 */
function addTag()
{
    $arr = $_POST;
    if (insert(TAG, $arr)) {
        alertMes("Add tag Successfully!","tag-design.php");
    }else {
        alertMes("Add tag Failed!","tag-design.php");        
    }
}

/**
 * 编辑标签
 * @param unknown $id
 * @return string
 */
function editTag($id) {
    $arr=$_POST;
//     print_r($arr);
    if (update(TAG, $arr,"id={$id}")) {
        alertMes("Edit tag successfully!","tag-design.php");
    }else{
        alertMes("Edit tag failed!","tag-design.php");
    }
    return $mes;
}

function delTag($id) {
    if (delete(TAG,"id={$id}")) {
        alertMes("Delete tag Successfully!","tag-design.php");
    }else{
        alertMes("Delete tag Failed!","tag-design.php");
    }
    return $mes;
}

function getAllTag() {
    $sql="select *from ".TAG;
//     print_r(fetchAll($sql));
    return fetchAll($sql);
}

function getTagByPage($pageSize=2){
    $sql="SELECT * FROM ".TAG;
    // print($sql);
    $totleRows=getResultNumber($sql);
     // echo $totleRows;
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
    $sql="select * from ".TAG." limit {$offset},{$pageSize}";
    // echo $sql;
    $rows=fetchAll($sql);
    return $rows;
}