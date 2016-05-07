<?php 
include_once("../include.php");
$username=$_REQUEST['username'];
$sql="select * from ".USER." where username = '{$username}'";
$row=fetchOne($sql);
if ($row==null) {
    # code...
    alertMes("Sorry!Usename is not available","index.php");
}
// echo $row['face'];
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clear">
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.php">Home</a></li>
                <li><a href="../index.php" target="_blank">ChinaKnow</a></li>
            </ul>
        </div>

    </div>
</div>
<div class="container clear">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
           <!-- <a href="#"> <img src="../files/defaultFace.jpg"/> </a> -->
           <a href="#"> <img src="<?php echo createsmallimg($row['face'],'100','100','../files/');?>"/> </a>
           <!-- <a href="#"> <img src="images/avatar.jpg"/> </a> -->
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="index.php"><i class="icon-font">&#xe003;</i>Management</a>
                    <ul class="sub-menu">
                        <li><a href="mypost.php">My Post</a></li>
                        <li><a href="mycomment.php">My Comment</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>Information</a>
                    <ul class="sub-menu">
                        <li><a href="identity.php">Modify</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>Welcome</span></div>
        </div>

        <div class="result-wrap">
            <div class="result-title">
                <h1>Basic Information</h1>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <li>
                        <label class="res-lab">UserName</label><span class="res-info">ABC</span>
                    </li>
                    <li>
                        <label class="res-lab">Email</label><span class="res-info">abc@163.com</span>
                    </li>
                    <li>
                        <label class="res-lab">Rank</label><span class="res-info">Level 1</span>
                    </li>
                    <li>
                    <label class="res-lab">Goal</label><span class="res-info">100</span>
                </li>
                    <li>
                    <label class="res-lab">icon</label><img src="images/onShow.gif"/>
                </li>
                    <li>
                        <label class="res-lab">Invitation Code</label><span class="res-info">1234567890dsdfasfajdk</span><img src="images/send.gif"/>
                    </li>


                </ul>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>
