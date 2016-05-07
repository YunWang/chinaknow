<?php
include_once("include.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Contact</title>
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
        <div class="links"><a href="#" id="login">Log In</a> | <a href="register.html">Sign Up</a></div>
    </div> -->
    <?php if($_SESSION['username'] == null):?>
     <div class="header" id="beforeLogin">
         <div class="login">
         <!-- login/sign -->
             <div class="links" >
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
         <div class="login">
         <!-- login/sign -->
             <div class="links" >
                 <ul>
             <li><a href="./User/index.html?username=<?php echo $_SESSION['username'];?>" id="loginsd">Welcome <?php echo $_SESSION['username'];?></a></li>
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
    <div id="content2">
        <div class="search"></div>
        <div class="bg">
            <div class="column1">
                <img src="images/contact/title.gif" alt="" width="258" height="21" /><br />

                <form action="doContact.php" method="post" class="contact">
                    <label>
                        <span>Your Name:</span>
                        <input id="name" type="text" name="username" placeholder="Your Full Name" />
                    </label>

                    <label>
                        <span>Your Email:</span>
                        <input id="email" type="email" name="email" placeholder="Valid Email Address" />
                    </label>

                    <label>
                        <span>Message:</span>
                        <textarea id="message" name="message" placeholder="Your Message to Us"></textarea>
                    </label>

                    </label>
                    <label>
                        <span>&nbsp;</span>
                        <input type="submit" class="button" value="Send" />
                    </label>

                </form>


            </div>
            <div class="column2">
                <img src="images/contact/title4.gif" alt="" width="133" height="18" /><br />
                <div class="news">
                    <a href="#"><img src="images/forum/photo1.jpg" alt="" width="183" height="97" /></a>
                    <span>Tel</span><br />
                    <p>12345678987</p>
                    <span>Address</span><br />
                    <p>4800,Cao'an Road,Shanghai </p>
                    <span>Email</span><br />
                    <p>123@163.com </p>

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
