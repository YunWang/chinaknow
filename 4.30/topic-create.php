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
<!--nav -->

<div class="post">
    <div class="post1" >Share Your Idea</div>
    <form action="doTopicCreate.php" method="post">
        <div class="post2">
            Title:
        </div>
        <div class="post3">
            <input type="text" name="postTitle" placeholder="What's your topic?" style="width: 200px; height: 28px;" />
        </div>

        <div class="post2">
            Content:
        </div>

        <textarea id="editor_id" name="postDetail" style="width:700px;height:300px;"></textarea>

        <div class="post2">
            Tag:
        </div>
        <div>
            <select name="tagName">
            <?php $i = 1; foreach ($rowsTag as $rowTag):?>
            <option value="<?php echo $rowTag['tagName'];?>"><?php echo $rowTag['tagName'];?></option>
            <?php $i++; endforeach;?>
		    </select>
        </div>
        <div class="post4">
            <div class="btns">
                <input type="submit" value="Finish" />
                <!-- <button type="submit">Finish</button> -->
            </div>
            <div class="btns">
                <button type="submit" onclick="topic-create.php">Cancel</button>
            </div>
        </div>
    </form>
</div>
<div id="footer">
    <ul>
        <li><a href="index.html"></a></li>
    </ul>
    <p>Copyright © 2016 ChinaKnow Company <a href="http://www.bestfreetemplaes.info" target="_blank" title="Best Free Te
</body>
</html>
