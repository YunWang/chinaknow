<?php
include_once("include.php");
$rowsTag=getAllTag();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>ChinaKnow</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet"href="kindeditor/themes/default/default.css"/>
<script charset="utf-8" src="kindeditor/kindeditor-all-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>


 <script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
        </script>
    <link rel="stylesheet" type="text/css" href="css/information.css" />
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <link rel="Stylesheet" type="text/css" href="css/loginDialog.css" />
    <script type="text/javascript" src="js/login.js"></script></head>
<body>
<div id="header">
    <!-- <div class="login">
        <div class="links">
            <a href="#" id="login">Log In</a> |
            <a href="#">Sign Up</a>
        </div>
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
 <!--nav -->

<div class="post">
    <div class="post1" >Create Your Achievement</div>
   <form action="doAchievement.php" method="post">
       <div class="post2">
           Title:
       </div>
       <div class="post3">
           <input type="text" placeholder="Enter your title" style="width: 200px; height: 28px;" name="achivementTitle"/>
       </div>

       <div class="post2">
           Content:
       </div>

    <textarea id="editor_id" name="achivementDetail" style="width:700px;height:300px;"></textarea>

       <div class="post2">
           Tag:
       </div>
       <div>
       <select style="width: 200px;height: 25px;" name="tagName">
           <?php $i = 1; foreach ($rowsTag as $rowTag):?>
            <option value="<?php echo $rowTag['tagName'];?>"><?php echo $rowTag['tagName'];?></option>
            <?php $i++; endforeach;?>
       </select>
       </div>
       <div class="post4">
       <div class="btns">
              <input type="submit" value="Finish"/>
               <!-- <button type="submit">Finish</button> -->
       </div>
       <div class="btns">

           <button type="submit" onclick="post-create.php">Cancel</button>
       </div>
       </div>
   </form>
</div>
<div id="footer">
<ul>
    <li><a href="index.php"></a></li>
</ul>
 <p>Copyright © 2016 ChinaKnow Company <a href="http://www.bestfreetemplaes.info" target="_blank" title="Best Free Templates">Email:chinaknow@163.com</a>  </p>
</body>
</html>
