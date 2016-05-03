<?php
// require_once '../include.php';
// $sql="SELECT * FROM imooc_admin";
// // print($sql);
// $totleRows=getResultNumber($sql);
// //  echo $totleRows;
// $pageSize=2;
// //得到总页码数
// $totalPage=ceil($totleRows/$pageSize);
// $page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
// if ($page<1||$page==null||!is_numeric($page)) {
//     $page=1;
// }
// if ($page>=$totalPage) {
//     $page = $totalPage;
// }
// $offset = ($page-1)*$pageSize;
// $sql="select * from imooc_admin limit {$offset},{$pageSize}";
// $rows=fetchAll($sql);
// // print_r($rows);
// if (! empty($rows)) {
//     foreach ($rows as $row) {
//         echo "编号：" . $row['id'], "<br/>";
//         echo "管理员的名称：" . $row['username'], "<hr/>";
//     }
// }
// echo showPage($page, $totalPage);
// echo "<hr/>";
// echo showPage($page, $totalPage,"cid=5");
function showPage($page,$totalPage,$where=null,$sep="&nbsp")
{
    // print($page);
    $where=($where==null)?null:"&".$where;
    $url = $_SERVER['PHP_SELF'];
    $index = ($page == 1) ? "首页" : "<a href='{$url}?page=1{$where}'>首页</a>";
    $last = ($page == $totalPage) ? "尾页" : "<a href='{$url}?page={$totalPage}{$where}'>尾页</a>";
    $prev = ($page == 1) ? "上一页" : "<a href='{$url}?page=" . ($page - 1) . "{$where}'>上一页</a>";
    $next = ($page == $totalPage) ? "下一页" : "<a href='{$url}?page=" . ($page + 1) . "{$where}'>下一页</a>";
    $str = "总共{$totalPage}页 当前是第{$page}页 ";
    for ($i = 1; $i <= $totalPage; $i ++) {
        // 当前页面无链接
        if ($page == $i) {
            $p .= "[{$i}]";
        } else {
            $p .= "<a href='{$url}?page={$i}'>[{$i}]</a>";
        }
    }
    // echo $p;
    $pageStr=$str .$sep. $index.$sep . $prev .$sep. $p .$sep. $next .$sep. $last;
    return $pageStr;
}