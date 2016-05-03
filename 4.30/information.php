<?php
include_once("include.php");
$rows=getAllActivity();
if ($rows == null) {
    # code...
    alertMes("Sorry!There is no any activity!","index.html");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Information</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/information.css" />
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <link rel="Stylesheet" type="text/css" href="css/loginDialog.css" />
    <script type="text/javascript" src="js/login.js"></script>
</head>
<body>
<div id="header">
    <div class="login">
        <div class="links">
            <a href="#" id="login">Log In</a> |
            <a href="register.html">Sign Up</a>
        </div>
    </div>

    <ul id="menu">
        <li><a href="index.html">Home</a></li>
        <li><a href="information.html">Information</a></li>
        <li><a href="trends.html">Trends</a></li>
        <li><a href="forum.html">Forum</a></li>
        
        <li><a href="contct.html">Contact</a></li>
    </ul>
</div>
<div id="LoginBox">
    <div class="row1">
        Log In<a href="javascript:void(0)" title="Close" class="close_btn" id="closeBtn">×</a>
    </div>
    <div class="row">
        Username: <span class="inputBox">
                <input type="text" id="txtName" placeholder="Email" />
            </span>
    </div>
    <div class="row">
        Password: <span class="inputBox">
                <input type="password" id="txtPwd" placeholder="password" />
            </span>
    </div>
    <div class="row3">
        <a href="index1.html" id="loginbtn">OK</a>
        <a href="register.html" id="signupbtn">Sign Up</a>

    </div>
    <div class="row2">
        Forget password? Click <a href="help.html">help</a>
    </div>
</div>
<div id="wrapper">
    <div id="sidebar">
        <div class="logo_block">
            <a href="index.html"><img src="images/infor/logo.jpg" alt="setalpm" width="198" height="156" /></a><br />
            <span class="slogan">Communication & Creation</span>
            <p class="text1">Here you can find many activities. You can join the activity you like or you can choose an activity that is helpful for you.</p>
        </div>
        <img src="images/infor/title1.gif" alt="" width="126" height="21" /><br />
        <ul id="navigation">
            <?php $i = 1; foreach ($rows as $row):?>
                <?php if (1 == $i%2) :?>
                <li class="color"><a href="activity.php?id=<?php echo $row['id'];?>"><?php echo $row['activityTitle'];?></a></li>
                <?php endif;?>
                <?php if (0 == $i%2) :?>
                <li><a href="activity.php?id=<?php echo $row['id'];?>"><?php echo $row['activityTitle'];?></a></li>
                <?php endif;?>
            <?php $i++; endforeach;?>
        </ul>
    </div>
    <div id="content">
        <div class="search"></div>
        <div class="bg">
            <div class="column1">
                <img src="images/infor/title2.gif" alt="" width="258" height="21" /><br />
                <p>In this page, you can see lots of interesting activities. Through these activities, you may have a better understanding of China, you may make friends with people in conmmon, and you will love China at the same time. But, we must remind you that our activities are suitable for university students, so you must offer you real information including name, telphone number and university. Otherwise you may be uncapable to join us. Anyway, wish you enjoy studying in China!</p>
                <img src="images/infor/title3.gif" alt="" width="258" height="21" /><br />
                <div id="items">
                    <div class="item">
                        <a href="article.html"><img src="images/infor/pic1.jpg" alt="" /></a>
                        <span><a href="article.html">DIY</a></span>
                    </div>
                    <div class="item">
                        <a href="article.html"><img src="images/infor/pic2.jpg" alt="" /></a>
                        <span><a href="article.html">VR Experience</a></span>
                    </div>
                </div>
                <div id="pagination">
                    <a href="#" class="btn active">1</a>
                    <a href="#" class="btn">2</a>
                    <a href="#" class="btn">3</a>
                    <a href="#" class="btn">Next »</a>
                    <a href="#" class="btn">Last »</a>
                </div>
            </div>
            <div class="column2">
                <img src="images/infor/title4.gif" alt="" width="133" height="18" /><br />
                <div class="news">
                    <span>12 may 2016</span><br />
                    <a href="article.html"><img src="images/infor/pic5.jpg" alt="" width="183" height="97" /></a>
                    <p>We will invite 12 students to join this activity, We will have a visit to Microsoft Company, and you will have the chance to create a plan... </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <ul>
        <li><a href="index.html"></a></li>
    </ul>
    <p>Copyright © 2016 ChinaKnow Company <a href="http://www.bestfreetemplaes.info" target="_blank" title="Best Free Templates">Email:chinaknow@163.com</a>  </p>
</div>
</body>
</html>
