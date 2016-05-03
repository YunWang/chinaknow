<?php
include_once '../include.php';
$pageSize=2;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getActivityByPage($pageSize);
if(!$rows){
    alertMes("sorry,没有文章,请添加!","activity-addView.php");
    exit;
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ChinaKnow Admin</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.php" class="navbar-brand">Admin</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.php">Home</a></li>
                <li><a href="../index.html" target="_blank">ChinaKnow</a></li>
            </ul>
        </div>

    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>Menu</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>Admin</a>
                    <ul class="sub-menu">
                        <li><a href="admin-design.php"><i class="icon-font">&#xe0017;</i>Management</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>User</a>
                    <ul class="sub-menu">
                        <li><a href="user-design.php"><i class="icon-font">&#xe017;</i>Management</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>Post</a>
                    <ul class="sub-menu">
                        <li><a href="post-design.php"><i class="icon-font">&#xe017;</i>Management</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>Tag</a>
                    <ul class="sub-menu">
                        <li><a href="tag-design.php"><i class="icon-font">&#xe017;</i>Management</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>Activity</a>
                    <ul class="sub-menu">
                        <li><a href="activity-design.php"><i class="icon-font">&#xe017;</i>Management</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>Article</a>
                    <ul class="sub-menu">
                        <li><a href="article-design.php"><i class="icon-font">&#xe017;</i>Management</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="index.php">Home</a><span class="crumb-step">&gt;</span><span class="crumb-name">Management</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="70">Key Word:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="activity-addView.php"><i class="icon-font"></i>Add New</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>Delete</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>Update</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>Order</th>
                            <th>ID</th>
                            <th>ActivityTitle</th>
                            <th>PublishName</th>
                            <th>PublishTime</th>
                            <th>TagName</th>
                            <th>IsHot</th>
                            <th>IsHighQuality</th>
                            <th>LikeNumber</th>
                            <th>Operation</th>
                        </tr>
                        <!-- php代码 -->
                        <?php  $i=1; foreach($rows as $row):?>
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="<?php echo $i;?>" type="text">
                            </td>
                            <td><?php echo $row['id'];?></td>
                            <td title=""><a target="_blank" href="#" title=""><?php echo $row['activityTitle'];?></a>
                            </td>
                            <td><?php echo $row['publishName'];?></td>
                            <td><?php echo $row['publishTime'];?></td>
                            <td><?php echo $row['tagName'];?></td>
                            <td><?php echo $row['isHot'];?></td>
                            <td><?php echo $row['isHighQuality'];?></td>
                            <td><?php echo $row['likeNumber'];?></td>
                            <td>
                                <a class="link-update" onclick="editActivity(<?php echo $row['id'];?>)">修改</a>
                                <a class="link-del" onclick="delActivity(<?php echo $row['id'];?>)">删除</a>
                            </td>
                        </tr>
                        <?php $i++;endforeach;?>
                        
                    </table>
                    <div class="list-page">
                        <?php if($rows>$pageSize):?>
                            <tr>
                                <td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                        <?php endif;?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
<script type="text/javascript">
    function editActivity(id){
        window.location = "activity-editView.php?id="+id;
    }
    function delActivity(id){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
                window.location="activity-delete.php?id="+id;
            }
    }
</script>
</html>
