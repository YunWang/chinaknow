<?php
include_once("include.php");
$pageSize=5;
$rowsActivity=getActivityByPage($pageSize);
$rowsPost=getPostByPage($pageSize);
$rowsArticle=getArticleByPage($pageSize);
if ($rowsActivity == null) {
    # code...
    //  "<script>alert('Sorry!There is still no any activity!');</script>";
    // alertMes("Sorry!There is still no any activity!","");
}
if ($rowsPost == null) {
    # code...
    //  "<script>alert('Sorry!There is still no any post!');</script>";
}if ($rowsArticle == null) {
    # code...
    //  "<script>alert('Sorry!There is still no any article!');</script>";
}
?>
<!DOCTYPE html>
<html>
 <head>
<title>ChinaKnow</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="css/stylesheet.css" type="text/css">
    <script src="js/main.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

<link rel="Stylesheet" type="text/css" href="css/loginDialog.css" />
</head>
<body>
    <?php if($_SESSION['username'] == null):?>
     <div class="header" id="beforeLogin">
         <div class="wrap">
         <!-- login/sign -->
             <div class="cssmenu" >
                 <ul>
             <li><a href="#" id="login">Log In</a></li>|
             <li><a href="register.html">Sign Up</a></li>
                 </ul>
             </div>
             <div class="clear"></div>
         </div>
     </div>
 <?php endif;?>
 <?php if($_SESSION['username'] != null):?>
     <div class="header"  id="afterLogin">
         <div class="wrap">
         <!-- login/sign -->
             <div class="cssmenu" >
                 <ul>
             <li><a href="./User/index.html?username=<?php echo $_SESSION['username'];?>" id="loginsd">Welcome <?php echo $_SESSION['username'];?></a></li>
             <!-- <li><a href="register.html">Sign Up</a></li> -->
                 </ul>
             </div>
             <div class="clear"></div>
         </div>
     </div>
 <?php endif;?>
     <div class="bg">
         <img id="bg-img" src="images/background.jpg">

     </div>
     <div id="LoginBox">
        <form action="doUserLogin.php" method="post">
         <div class="row1">
             Log In<a href="javascript:void(0)" title="Close" class="close_btn" id="closeBtn">×</a>
         </div>
         <div class="row">
                Email : <span class="inputBox">
                <input type="text" id="txtName" name="email" placeholder="Email" />
            </span>
         </div>
         <div class="row">
             Password: <span class="inputBox">
                <input type="password" id="txtPwd" name="password" placeholder="password" />
            </span>
         </div>
         <div class="row3">
            <input type="submit"  value="Login" id="loginbtn"/>
            <input type="submit"  value="register" id="signupbtn"/>
            <!-- <input type="submit"  value="Sign Up" id="signupbtn"/> -->
             <!-- <a href="index1.html" id="loginbtn">OK</a> -->
             <!-- <a href="register.html" id="signupbtn">Sign Up</a> -->

         </div>
         <div class="row2">
             Forget password? Click <a href="help.html">help</a>
         </div>
     </form>
     </div>

     <script type="text/javascript">
         $(function ($) {
             $("#login").hover(function () {
                 $(this).stop().animate({
                     opacity: '1'
                 }, 600);
             }, function () {
                 $(this).stop().animate({
                     opacity: '0.6'
                 }, 1000);
             }).on('click', function () {
                 $("body").append("<div id='mask'></div>");
                 $("#mask").addClass("mask").fadeIn("slow");
                 $("#LoginBox").fadeIn("slow");
             });
             //
             //按钮的透明度
             $("#loginbtn").hover(function () {
                 $(this).stop().animate({
                     opacity: '1'
                 }, 600);
             }, function () {
                 $(this).stop().animate({
                     opacity: '0.8'
                 }, 1000);
             });
             $("#signupbtn").hover(function () {
                 $(this).stop().animate({
                     opacity: '1'
                 }, 600);
             }, function () {
                 $(this).stop().animate({
                     opacity: '0.8'
                 }, 1000);
             });





             //关闭
             $(".close_btn").hover(function () { $(this).css({ color: 'black' }) }, function () { $(this).css({ color: '#999' }) }).on('click', function () {
                 $("#LoginBox").fadeOut("fast");
                 $("#mask").css({ display: 'none' });
             });
         });
     </script>


     <div class="header-bottom">
         <div class="wrap">
				<!--logo &nav-->

             <div class="logo">
				<a href="index.php"><img src="images/logo.png" alt=""/></a>
             </div>

             <div class="nav">
                 <ul >
                     <li><a href="index.php">Home</a></li>

                     <li><a href="information.php">Information</a></li>

                     <li><a href="trends.php">Trends</a></li>
                     
                     <li><a href="forum.php">Forum</a></li>

                     <li><a href="contct.php">Contact</a></li>
                 </ul>
             </div>

             <div class="header-bottom-right">
                 <div class="search">
                     <input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                     <input type="submit" value="Subscribe" id="submit" name="submit">
                     <div id="response"> </div>
                 </div>

             </div>
             <div class="clear"></div>
         </div>
     </div>

			    <!-- Large Pic-->
     <div class="main">
         <div class="wrap">
             <div class="picbox">
                 <img class="pic1" src="images/pic1.jpg"alt=""/>
             </div>
             <div class="inf1">
                 <div class="content">
                     <ul>
                         <div class="title">
                             <li><a href="information.php">New Information</a> </li>
                         </div>
                         <div class="tb">
                        <?php foreach ($rowsActivity as $rowActivity) :?>
                         <li><a href="article2.php?id=<?php echo $rowActivity['id'];?>"> <?php echo $rowActivity['activityTitle'];?></a></li>
                        <?php endforeach;?>
                         </div>
                     </ul>
                 </div>
             </div>
         </div>

         <div class="wrap">
             <img class="pic2" src="images/pic2.jpg"alt=""/>
             <a href="javascript:void(0);" onclick="divDisplay1()"><img src="images/icon1.jpg"alt="" id="icon1"/></a>
             <div id="inf2">
                 <div class="content">
                     <ul>
                         <div class="title">
                             <li><a href="information.php">Sharing</a> </li>
                         </div>
                         <div class="tb">
                        <?php foreach ($rowsArticle as $rowArticle) :?>
                         <li><a href="article1.php?id=<?php echo $rowArticle['id'];?>"> <?php echo $rowArticle['articleTitle'];?></a></li>
                        <?php endforeach;?>
                         <!-- <li><a href="information.html"> My Visit to TJ</a></li> -->
                         <!-- <li><a href="information.html">Eating in China, Happy in Shanghai</a> </li> -->
                         </div>
                     </ul>
                 </div>
             </div>
         </div>

         <div class="wrap">
             <img class="pic3" src="images/pic3.jpg"alt=""/>
             <a href="javascript:void(0);" onclick="divDisplay2()"><img id="icon2" src="images/icon2.jpg"alt=""/></a>
             <div id="inf3">
                 <div class="content">
                     <ul>
                         <div class="title">
                             <li><a href="trends.php">Forum</a> </li>
                         </div>
                         <div class="tb">
                        <?php foreach ($rowsPost as $rowPost) :?>
                         <!-- <li><a onclick="postDetail(<?php echo $rowPost['id'];?>)"> <?php echo $rowPost['postTitle'];?></a></li> -->
                         <li><a href="article3.php?id=<?php echo$rowPost['id'];?>"><?php echo$rowPost['postTitle'];?></a></li>
                        <?php endforeach;?>
                         <!-- <li><a href="talkingTopic.html">The feeling of Living In China</a></li>
                         <li><a href="talkingTopic.html">Travel in Shanghai</a> </li> -->
                         </div>
                     </ul>
                 </div>
             </div>
         </div>

     </div>


         <!--footer-->
    <div class="footer">
        <div class="fw">
            Copyright © 2016 ChinaKnow Company <br/>
            Email:chinaknow@163.com
        </div>
     </div>

</body>
<script type="text/javascript">
function activityDetail(id){
    document.location("activity.php?id="+id);
}
function articleDetail(id){
    document.location("article.php?id="+id);
}
</script>
</html>
