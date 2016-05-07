<?php
include_once("include.php");
$pageSize=5;
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
$rowsPost=getPostByPage($pageSize);
$rowsTag=getAllTag();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Forum</title>
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
        <!-- <a href="index.php" id="loginbtn">OK</a>
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
            <a href="index.php"><img src="images/forum/logo.jpg" alt="setalpm" width="198" height="156" /></a><br />
            <span class="slogan">Communication & Creation</span>
            <p class="text1">   Here, you can share your interests anf beautiful life in China. Also, we will have a weekly topic, we hope you can talk freely and show your wisdom!</p>
        </div>
        <img src="images/forum/title1.gif" alt="" width="126" height="21" /><br />
        <ul id="navigation">
            <?php $i = 1; foreach ($rowsTag as $rowTag):?>
                <?php if (1 == $i%2) :?>
                <li class="color"><a href="#"><?php echo $rowTag['tagName'];?></a></li>
                <?php endif;?>
                <?php if (0 == $i%2) :?>
                <li><a href="#"><?php echo $rowTag['tagName'];?></a></li>
                <?php endif;?>
            <?php $i++; endforeach;?>
            <li><a href="内容版式/talkingTopic.html">more</a></li>
        </ul>

    </div>
    <div id="content1">
        <div class="search"></div>
        <div class="bg">
            <div class="column1">
                <img src="images/forum/title3.gif" alt="" width="258" height="21" /><br />
                <li><button class="btnw2"><a href="topic-create.php">Write a Post</a></button></li>
                <?php foreach ($rowsPost as $rowPost):?>
                <article class="type-post hentry clear">
                    <header class="clear">
                        <h3 class="post-title">
                            <a href="article3.php?id=<?php echo $rowPost['id'];?>"><?php echo $rowPost['postTitle'];?></a>
                        </h3>

                        <div class="post-meta clear">
                            <span class="date"><?php echo date("j-M-Y",$rowPost['publishTime']);?></span>
                            <span class="category"><a href="#" title="View all posts in Server &amp; Database"><?php echo $rowPost['tagName'];?></a></span>
                            <?php 
                                $sql="select id from ".POSTCOMMENT." where postId='{$rowPost['id']}'";
                                $commentNumber = getResultNumber($sql);
                            ?>
                            <span class="comments"><a href="#" title="Comment on Integrating WordPress with Your Website"><?php echo $commentNumber;?> Comments</a></span>
                            <span class="like-count"><?php echo $rowPost['likeNumber'];?></span>
                        </div>

                    </header>

                    <div class="content3">Many of us work in an endless stream of tasks, browser tasks, social media, emails, meetings, rushing from one thing to another, never pausing and never ending.&nbsp;Then the day is over, and we are exhausted, and we often . . . <a class="readmore-link" href="article.html">Read more</a></div>

                </article>
            <?php endforeach;?>
                <!-- <article class="format-standard type-post hentry clear">

                    <header class="clear">

                        <h3 class="post-title">
                            <a href="article.html">Using Javascript</a>
                        </h3>

                        <div class="post-meta clear">
                            <span class="date">25 Feb, 2013</span>
                            <span class="category"><a href="#" title="View all posts in Advanced Techniques">Advanced Techniques</a></span>
                            <span class="comments"><a href="#" title="Comment on Using Javascript">0 Comments</a></span>
                            <span class="like-count">18</span>
                        </div>

                    </header>

                    <div class="content3">Many of us work in an endless stream of tasks, browser tasks, social media, emails, meetings, rushing from one thing to another, never pausing and never ending.&nbsp;Then the day is over, and we are exhausted, and we often  . . . <a class="readmore-link" href="article.html">Read more</a></div>

                </article>
                <article class="type-post hentry clear">
                    <header class="clear">
                        <h3 class="post-title">
                            <a href="article.html">Using Images</a>
                        </h3>

                        <div class="post-meta clear">
                            <span class="date">25 Feb, 2013</span>
                            <span class="category"><a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a></span>
                            <span class="comments"><a href="#" title="Comment on Integrating WordPress with Your Website">3 Comments</a></span>
                            <span class="like-count">66</span>
                        </div>

                    </header>

                    <div class="content3">Many of us work in an endless stream of tasks, browser tasks, social media, emails, meetings, rushing from one thing to another, never pausing and never ending.&nbsp;Then the day is over, and we are exhausted, and we often . . . <a class="readmore-link" href="article.html">Read more</a></div>

                </article>
                <article class="type-post hentry clear">
                    <header class="clear">
                        <h3 class="post-title">
                            <a href="article.html">Using Video</a>
                        </h3>

                        <div class="post-meta clear">
                            <span class="date">25 Feb, 2013</span>
                            <span class="category"><a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a></span>
                            <span class="comments"><a href="#" title="Comment on Integrating WordPress with Your Website">3 Comments</a></span>
                            <span class="like-count">66</span>
                        </div>

                    </header>

                    <div class="content3">Many of us work in an endless stream of tasks, browser tasks, social media, emails, meetings, rushing from one thing to another, never pausing and never ending.&nbsp;Then the day is over, and we are exhausted, and we often . . . <a class="readmore-link" href="article.html">Read more</a></div>

                </article>
                <article class="type-post hentry clear">
                    <header class="clear">
                        <h3 class="post-title">
                            <a href="article.html#">WordPress Site Maintenance</a>
                        </h3>

                        <div class="post-meta clear">
                            <span class="date">25 Feb, 2013</span>
                            <span class="category"><a href="#" title="View all posts in Server &amp; Database">Server &amp; Database</a></span>
                            <span class="comments"><a href="#" title="Comment on Integrating WordPress with Your Website">3 Comments</a></span>
                            <span class="like-count">66</span>
                        </div>

                    </header>

                    <div class="content3">Many of us work in an endless stream of tasks, browser tasks, social media, emails, meetings, rushing from one thing to another, never pausing and never ending.&nbsp;Then the day is over, and we are exhausted, and we often . . . <a class="readmore-link" href="article.html">Read more</a></div>

                </article> -->
                <!-- <div id="pagination">
                    <a href="#" class="btn active">1</a>
                    <a href="#" class="btn">2</a>
                    <a href="#" class="btn">3</a>
                    <a href="#" class="btn">Next »</a>
                    <a href="#" class="btn">Last »</a>
                </div> -->
                <div  id="pagination">
                        <?php if($rowsPost>$pageSize):?>
                            <tr>
                                <td  class="btn"><?php echo showPage($page, $totalPage);?></td>
                            </tr>
                        <?php endif;?>
                    </div>
            </div>
            <div class="column2">
                <img src="images/forum/title4.gif" alt="" width="133" height="30" /><br />
                <div class="news">

                    <a href="#"><img src="images/forum/photo1.jpg" alt="" width="183" height="97" /></a>
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
        <li><a href="index.php"></a></li>
    </ul>
    <p>Copyright © 2016 ChinaKnow Company <a href="http://www.bestfreetemplaes.info" target="_blank" title="Best Free Templates">Email:chinaknow@163.com</a>  </p>
</div>
</body>
</html>

