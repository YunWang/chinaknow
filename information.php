<?php
include_once("include.php");
$pageSize=4;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rows=getArticleByPage($pageSize);
// $rows=getAllArticle();
if ($rows == null) {
    # code...
    alertMes("Sorry!There is no any activity!","index.php");
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
    <!-- <div class="login">
        <div class="links">
            <a href="#" id="login">Log In</a> |
            <a href="register.html">Sign Up</a>
        </div>
    </div> -->
    <?php if($_SESSION['username'] == null):?>
     <div class="header" id="beforeLogin">
         <div class="login">
         <!-- login/sign -->
             <div class="links" >
                 <ul>
             <a href="#" id="login">Log In</a>|
             <a href="register.html">Sign Up</a>
                 </ul>
             </div>
             <div class="clear"></div>
         </div>
     </div>
 <?php endif;?>
 <?php if($_SESSION['username'] != null):?>
     <div class="header"  id="afterLogin">
         <div class="login">
         <!-- login/sign -->
             <div class="links" >
                 <ul>
             <li><a href="./User/index.php?username=<?php echo $_SESSION['username'];?>" id="loginsd">Welcome <?php echo $_SESSION['username'];?></a></li>
             <!-- <li><a href="register.html">Sign Up</a></li> -->
                 </ul>
             </div>
             <div class="clear"></div>
         </div>
     </div>
 <?php endif;?>
    <ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="information.php">Information</a></li>
        <li><a href="trends.php">Trends</a></li>
        <li><a href="forum.php">Forum</a></li>
        
        <li><a href="contct.php">Contact</a></li>
    </ul>
</div>
<div id="LoginBox">
    <form action="doUserLogin.php" method="post">
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
        <input type="submit"  value="Login" id="loginbtn"/>
        <input type="submit"  value="register" id="signupbtn"/>
        <!-- <a href="index1.html" id="loginbtn">OK</a>
        <a href="register.html" id="signupbtn">Sign Up</a> -->

    </div>
    <div class="row2">
        Forget password? Click <a href="help.html">help</a>
    </div>
    </form>
</div>
<div id="wrapper">
    <div id="sidebar">
        <div class="logo_block">
            <a href="index.php"><img src="images/infor/logo.jpg" alt="setalpm" width="198" height="156" /></a><br />
            <span class="slogan">Communication & Creation</span>
            <p class="text1">Here you can find many activities. You can join the activity you like or you can choose an activity that is helpful for you.</p>
        </div>
        <img src="images/infor/title1.gif" alt="" width="126" height="21" /><br />
        <ul id="navigation">
            <li class="color"><a href="#">Travel</a></li>
            <li><a href="#">Culture</a></li>
            <li class="color"><a href="#">Food</a></li>
            <li><a href="#">Life</a></li>
        </ul>
    </div>
    <div id="content">
        <div class="search"></div>
        <div class="bg">
            <div class="column1">
                <img src="images/infor/title3.gif" alt="" width="258" height="30" /><br />
                <div id="items">
                    <?php foreach ($rows as $row) :?>
                    <div class="item">
                        
                        <a href="article1.php?id=<?php echo $row['id'];?>"><img src="<?php echo createsmallimg($row['articleImg'],'100','201');?>" alt="" /></a>
                        <span><a href="article1.php?id=<?php echo $row['id'];?>"><?php echo $row['articleTitle'];?></a></span>
                    
                    </div>
                    <?php endforeach;?>
                    <!-- <div class="item">
                        <a href="article.php"><img src="images/infor/pic2.jpg" alt="" /></a>
                        <span><a href="article.php">VR Experience</a></span>
                    </div> -->
                </div>
                <!-- <div id="items">
                    <div class="item">
                        <a href="article.php"><img src="images/infor/pic2.jpg" alt="" /></a>
                        <span><a href="article.php">VR Experience</a></span>
                    </div>
                    <div class="item">
                        <a href="article.php"><img src="images/infor/pic1.jpg" alt="" /></a>
                        <span><a href="article.php">DIY</a></span>
                    </div>
                </div> -->
                <!-- <div id="pagination">
                    <a href="#" class="btn active">1</a>
                    <a href="#" class="btn">2</a>
                    <a href="#" class="btn">3</a>
                    <a href="#" class="btn">Next »</a>
                    <a href="#" class="btn">Last »</a>
                </div> -->
                <div  id="pagination">
                        <?php if($rows>$pageSize):?>
                            <tr>
                                <td colspan="4"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                        <?php endif;?>
                    </div>
            </div>
            <div class="column2">
                <img src="images/infor/title4.gif" alt="" width="133" height="18" /><br />
                <div class="news">
                    <span>12 may 2016</span><br />
                    <a href="article.php"><img src="images/infor/pic5.jpg" alt="" width="183" height="97" /></a>
                    <p>We will invite 12 students to join this activity, We will have a visit to Microsoft Company, and you will have the chance to create a plan... </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <ul>
        <li><a href="index.php"></a></li>
    </ul>
    <p>Copyright © 2016 ChinaKnow Company <a href="http://www.bestfreetemplaes.info" target="_blank" title="Best Free Templates">Email:chinaknow@163.com</a>  </p>
</div>
</body>
</html>
