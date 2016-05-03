<?php
include_once("include.php");
$rows=getAllArticle();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Trends</title>
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
        <div class="links"><a href="#" id="login">Log In</a> | <a href="register.html">Sign Up</a></div>
    </div>
    <ul id="menu">
        <li><a href="index.html">Home</a></li>
        <li><a href="information.html">Information</a></li>
         <li><a href="trends.html">Trends</a></li>
        <li><a href="forum.html">Forum</a></li>
       
        <li><a href="contct.html">Contact</a></li>
        <li><button class="btnw"><a href="post-create.html">Share My Achievements</a></button></li>
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
            <a href="#"><img src="images/trends/logo.jpg" alt="setalpm" width="198" height="156" /></a><br />
            <span class="slogan">Communication & Creation</span>
            <p class="text1">   Here, you can have a better understanding of the activities. For one thing, you can share your achievements with others after attending the activities, for another, you can find mates to join the activities together!</p>
        </div>
        <img src="images/trends/title1.gif" alt="" width="126" height="21" /><br />
        <ul id="navigation">
            <?php if ($rows != null) :?>
                <?php $i = 1; foreach ($rows as $row):?>
                <?php if (1 == $i%2) :?>
                <li class="color"><a href="article.php?id=<?php echo $row['id'];?>"><?php echo $row['articleTitle'];?></a></li>
                <?php endif;?>
                <?php if (0 == $i%2) :?>
                <li><a href="article.php?id=<?php echo $row['id'];?>"><?php echo $row['articleTitle'];?></a></li>
                <?php endif;?>
            <?php $i++; endforeach;?>
            <?php endif;?>
            <!-- <li class="color"><a href="article.html">Article1</a></li>
            <li><a href="article.html">Article1</a></li>
            <li class="color"><a href="article.html">Article2</a></li>
            <li><a href="article.html">Article2</a></li>
            <li class="color"><a href="article.html">Article3</a></li>
            <li><a href="article.html">Article3</a></li>
            <li class="color"><a href="article.html">Article4</a></li>
            <li><a href="article.html">Article4</a></li>
            <li class="color"><a href="article.html">Article5</a></li>
            <li><a href="article.html">Article5</a></li>
            <li class="color"><a href="article.html">Article6</a></li> -->
        </ul>

    </div>
    <div id="content1">
        <div class="search"></div>
        <div class="bg">
            <div class="column1">
                <img src="images/trends/title3.gif" alt="" width="258" height="21" /><br />
                <div id="items">
                    <div class="item">
                        <a href="article.html"><img src="images/trends/pic1.jpg" alt="" /></a>
                        <span><a href="#">Team Work</a></span>
                    </div>
                    <div class="item">
                        <a href="article.html"><img src="images/trends/pic2.jpg" alt="" /></a>
                        <span><a href="#">Create My Plan</a></span>
                    </div>
                </div>
                <div id="items">
                    <div class="item">
                        <a href="article.html"><img src="images/trends/pic3.jpg" alt="" /></a>
                        <span><a href="#">Enjoy Sports</a></span>
                    </div>
                    <div class="item">
                        <a href="#"><img src="images/trends/pic4.jpg" alt="" /></a>
                        <span><a href="article.html"><M></M>anual</a></span>
                    </div>
                </div>
                <div id="items">
                    <div class="item">
                        <a href="#"><img src="images/trends/pic5.jpg" alt="" /></a>
                        <span><a href="article.html">Water, critical thinking</a></span>
                    </div>
                    <div class="item">
                        <a href="article.html"><img src="images/trends/pic6.jpg" alt="" /></a>
                        <span><a href="article.html">Plane</a></span>
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
                <img src="images/trends/title4.gif" alt="" width="133" height="18" /><br />
                <div class="news">

                    <a href="article.html"><img src="images/trends/photo1.jpg" alt="" width="183" height="97" /></a>
                    <span>12 April 2016</span><br />
                    <p>We will invite 12 students to join this activity, We will have a visit to Microsoft Company, and you will have the chance to create a plan... </p>
                     <span>12 may 2016</span><br />
                    <p>We will invite 12 students to join this activity, We will have a visit to Microsoft Company, and you will have the chance to create a plan... </p>
                    <span>20 may 2016</span><br />
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
