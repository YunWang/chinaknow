<?php
include_once '../include.php';
$pageSize=4;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getUserByPage($pageSize);
if(!$rows){
    alertMes("sorry,没有用户,请添加!","user-addView.html");
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
                <li><a href="../index.php" target="_blank">ChinaKnow</a></li>
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
                        <a href="user-addView.html"><i class="icon-font"></i>Add New</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>Delete</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>Update</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <!-- <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th> -->
                            <th>Order</th>
                            <th>UserName</th>
                            <th>Gender</th>
                            <th>age</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Address</th>
                            <th>University</th>
                            <th>Phone</th>
                            <th>InvitationCode</th>
                            <th>Integration</th>
                            <!-- <th>Identity</th> -->
                            <th>Level</th>
                            <!-- <th>Audit state</th> -->
                            <th>RegTime</th>
                            <th>Operation</th>
                        </tr>
                        <?php  $i=1; foreach($rows as $row):?>
                        <tr>
                            <!-- <td class="tc"><input name="id[]" value="59" type="checkbox"></td> -->
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="<?php echo $i;?>" type="text">
                            </td>
                            <th><?php echo $row['username'];?></th>
                            <th><?php echo $row['gender'];?></th>
                            <th><?php echo $row['age'];?></th>
                            <th><?php echo $row['email'];?></th>
                            <th><?php echo $row['country'];?></th>
                            <th><?php echo $row['address'];?></th>
                            <th><?php echo $row['university'];?></th>
                            <th><?php echo $row['phone'];?></th>
                            <th><?php echo $row['invitationCode'];?></th>
                            <th><?php echo $row['integration'];?></th>
                            <!-- <th><?php echo $row['identity'];?></th> -->
                            <th><?php echo $row['level'];?></th>
                            <!-- <th><?php echo $row['auditState'];?></th> -->
                            <th><?php echo $row['regTime'];?></th>
                            <td>
                                <a class="link-update" onclick="editUser(<?php echo $row['id'];?>)">修改</a>
                                <a class="link-del" onclick="delUser(<?php echo $row['id'];?>)">删除</a>
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
    function editUser(id){
        window.location = "user-editView.php?id="+id;
    }
    function delUser(id){
        if(window.confirm("您确定要删除吗？删除之后不可以恢复哦！！！")){
                window.location="user-delete.php?id="+id;
        }
    }
</script>
</html>
