<?php
include_once("include.php");
$id=$_REQUEST['id'];
// $id=14;
// echo "id=".$id;
$sql="select *from ".ARTICLE." where id = '{$id}'";
$row=fetchOne($sql);
//Guess you like
$pageSize=5;
$rows=getArticleByPage($pageSize);

//comment
$sql="select *from ".ARTICLECOMMENT." where postId='{$id}'";
$rowsComment=fetchAll($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Article </title>

    <!-- Meta-Tags -->
    <meta name="description" content="" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

    <!-- Stylesheets: Screen, Projection -->
    <link href="css/layout.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="css/article.css" media="screen, projection" rel="stylesheet" type="text/css" />

    <!--editor-->
    <link rel="stylesheet"href="kindeditor/themes/default/default.css"/>
    <script charset="utf-8" src="kindeditor/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>


    <script>
        KindEditor.ready(function(K) {
            window.editor = K.create('#editor_id');
        });
    </script>
    <!--end-->

    <!--[if IE 6]>
    <script src="js/ie.pngfix.js" type="text/javascript"></script>
    <script>DD_belatedPNG.fix('li, #logo a, #main, #preview, .post-data span, blockquote, .lightbox-image, .dropcap-circle, .breadcrumbs span.info');</script>
    <style>li, #footer .nav li a, #sidebar .nav li a {zoom:1}</style>
    <![endif]-->
    <!--[if lt IE 9]>
    <style>#showcase .rounded-corners-top, #showcase .rounded-corners-bottom {display: none}</style>
    <![endif]-->


</head>

<body class="">
<div id="body-wrapper">

    <div id="header">
        <div class="wrapper">
            <ul class="nav">
                <li class="first">
                <li><a href="index.html">Home</a></li>
                <li><a href="information.html">Information</a></li>
                <li><a href="trends.html">Trends</a></li>
                <li><a href="forum.html">Forum</a></li>
                <li class="last"><a href="contct.html">Contact</a></li>
            </ul>
        </div>
    </div>
    <div id="main">
        <div class="wrapper">
            <div id="content">

                <div class="entry">
                    <h3><?php echo $row['articleTitle'];?></h3>
                    <p>
                        <?php echo $row['articleDetail'];?>
                    </p>
                    <!-- <p>
                      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.
                      Ut, sem sit amet interdum consectetuer, odio augue aliquam leo, nec dapibus tortor nibh sed augue. Integer eu magna sit amet metus fermentum posuere. Morbi sit amet nulla sed dolor elementum imperdiet. Quisque fermentum.
                      Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor.
                    </p>
                    <img src="images/portfolio-2c_1.jpg">
                    <p>
                      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.
                      Ut convallis, sem sit amet interdum consectetuer, odio augue aliquam leo, nec dapibus tortor nibh sed augue. Integer eu magna sit amet metus fermentum posuere. Morbi sit amet nulla sed dolor elementum imperdiet. Quisque fermentum.
                      Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor.
                    </p>
                    -->
                    <div class="post-box">
                        <div class="info clear">
                            <span class="time">02-14 23:01</span>
                            <a class="praise" href="javascript:;">like</a>
                        </div>
                        <div class="praises-total" total="4" style="display: block;">4 people like it</div>
                    </div>

                </div>
                <!-- END .entry -->


                <div id="comments">
                    <div id="list">
                        <ol class="comment-list">
                            <li id="comment-1" class="comment">
                                <div class="gravatar">
                                    <img src="images/gravatar_2.jpg" alt="" height="70" width="70" />
                                </div>
                                <div class="content">
                                    <cite class="name">Mr. Smith</cite>
                                    <div class="text">
                                        <p>
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in anim id est laborum. Aehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        </p>
                                        <div class="info clear-ar">
                                            <span class="time">02-14 23:01</span>
                                            <a class="praise" href="#;">Like</a>
                                        </div>
                                        <div class="praises-total" total="4" style="display: block;">4 people like it</div>
                                        <div class="comment-list">
                                            <div class="comment-box clear-ar" user="other">
                                                <img class="myhead" src="images/4.jpg" alt=""/>
                                                <div class="comment-content">
                                                    <p class="comment-text">
                                                        <span class="user">Rogy:</span>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                                                    </p>
                                                    <p class="comment-time">
                                                        2014-02-19 14:36
                                                        <a href="#" class="comment-praise" total="0" my="0">Like</a>
                                                        <a href="#" class="comment-operate">Reply</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-box">
                                            <textarea class="comment-ar" placeholder="  Comment..."></textarea>
                                            <button class="btn-ar ">Replay</button>
                                        </div>
                                    </div>
                                </div>

                            </li>

                            <li id="comment-2" class="comment">
                                <div class="gravatar">
                                    <img src="images/gravatar_4.jpg" alt="" height="70" width="70" />
                                    <a href="#" class="reply-link" rel="nofollow">Reply</a>
                                </div>
                                <div class="content">
                                    <cite class="author">Doris</cite>
                                    <div class="text">
                                        <p>
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in anim id est laborum. Aehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        </p>
                                        <div class="info clear-ar">
                                            <span class="time">02-14 23:01</span>
                                            <a class="praise" href="#">Like</a>
                                        </div>
                                        <div class="praises-total" total="4" style="display: block;">0 people like it</div>
                                    </div>
                                    <div class="text-box">
                                        <textarea class="comment-ar" placeholder="  Comment..."></textarea>
                                        <button class="btn-ar ">Replay</button>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>


                    <!-- .ol.comment-list -->

                    <div id="respond">
                        <h3>Leave a Reply</h3>
                        <form method="post" action="doArticleComment.php?id=<?php echo $row['id'];?>">
                            <div class="divider">
                                <p class="full">
                                    <textarea id="editor_id" name="content" style="width:98%;height:300px;"></textarea>
                                </p>
                                <p>
                                    <input type="submit" value="Submit Reply" id="submit"/>
                                    <!-- <button id="submit" name="submit" type="submit">Submit Reply</button> -->
                                </p>
                            </div>
                        </form>
                    </div>

                </div>


            </div>


            <div id="sidebar">
                <div class="box">
                    <h3>Guess You Like</h3>
                    <div class="nav">
                        <ul>
                            <?php if ($rows != null) :?>
                                <?php foreach ($rows as $rowArticle) :?>
                                    <li><a href="article.php?id=<?php echo $rowArticle['id'];?>"><?php echo $rowArticle['articleTitle'];?></a></li>
                                <?php endforeach;?>
                            <?php endif;?>
                            <!-- <li><a href="article.html">Cras iaculis ultricies nulla</a></li>
                            <li><a href="article.html">Praesent placerat</a></li>
                            <li><a href="article.html">Cras ornare tristique elit</a></li>
                            <li><a href="article.html">Nunc dignissim metus</a></li>
                            <li><a href="article.html">Aliquam tincidunt mauris eu</a></li>
                            <li><a href="article.html">Ut aliquam sollicitudin leo</a></li>
                            <li><a href="article.html">Nam convallis pellentesque nisl</a></li>
                            <li><a href="article.html">Cras iaculis ultricies nulla</a></li>
           -->                </ul>
                    </div>
                </div>

            </div>
            <!-- END #sidebar -->


        </div>
        <!-- END .wrapper -->


    </div>
    <!-- END #main -->

</div>
<!-- END #body-wrapper -->

<script type="text/javascript">
    function articleDetail(id){
        document.location("article.php?id="+id);
    }
</script>
</body>
</html>
