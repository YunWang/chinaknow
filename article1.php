<?php
include_once("include.php");
$id=$_REQUEST['id'];
// $id=14;
// echo "id=".$id;
$sql="select *from ".ACTIVITY." where id = '{$id}'";
$row=fetchOne($sql);
//Guess you like
$pageSize=5;
$rows=getActivityByPage($pageSize);

//comment
$sql="select *from ".ACTIVITYCOMMENT." where activityId='{$id}'";
$rowsComment=fetchAll($sql);
?>
<!DOCTYPE html>
<html>
 <head>
    <title>Activity </title>

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
            <li><a href="index.php">Home</a></li>
            <li><a href="information.php">Information</a></li>  
            <li><a href="trends.php">Trends</a></li>
            <li><a href="forum.php">Forum</a></li>
            <li class="last"><a href="contct.html">Contact</a></li>
          </ul>
        </div>
      </div>
      <div id="main">
        <div class="wrapper">
          <div id="content">

            <div class="entry">
              <h3><?php echo $row['activityTitle'];?></h3>
              <p>
                <?php echo $row['activityDetail'];?>
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
                <p class="post-data">
                  <span class="date"><?php echo date("M-j-Y",$row['publishTime']);?></span>
                  <span class="apply"><a href="Activity-form.php?id=<?php echo $row['id'];?>">Click here to Join it </a> </span>
                </p> 
              </div>

            </div>
            <!-- END .entry -->


              <div id="comments">
                  <div id="list">
                      <ol class="comment-list">
                        <?php if(isset($rowsComment)):?>
                        <?php foreach ($rowsComment as $rowComment): ?>
                          <li id="comment-1" class="comment">
                              <div class="gravatar">
                                <?php 
                                $sql="select *from ".USER." where username='{$rowComment['publishName']}'";
                                $user=fetchOne($sql);
                                ?>
                                  <img src="<?php echo createsmallimg($user['face'],'70','70');?>" alt="" height="70" width="70" />
                              </div>
                              <div class="content">
                                  <cite class="name"><?php echo $user['username'];?></cite>
                                  <div class="text">
                                      <!-- <p>
                                          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in anim id est laborum. Aehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                      </p> -->
                                      <p><?php echo $rowComment['commentDetail'];?>
                                      </p>
                                      <div class="info clear-ar">
                                          <span class="time"><?php echo date("M-j H:i:s",$rowComment['publishTime']);?></span>
                                          <a class="praise" href="doLike.php?id=<?php echo $rowComment['id'];?> & table=<?php echo ACTIVITYCOMMENT;?>">Like</a> 
                                      </div>
                                      <div class="praises-total" total="4" style="display: block;" id="likeNumber"><?php echo $rowComment['likeNumber'];?> people like it</div>
                                      <?php 
                                      $sql="select *from ".COMMENTINCOMMENT." where commentId='{$rowComment['id']}'";
                                      $subComments=fetchAll($sql);
                                      ?>
                                      <?php if(isset($subComments)):?>
                                      <?php $j=0;foreach ($subComments as $subComment ):?>
                                      <?php 
                                      $sql="select *from ".USER." where username='{$subComment['publishName']}'";
                                      $user2=fetchOne($sql);
                                      ?>
                                      <div class="comment-list">
                                          <div class="comment-box clear-ar" user="other">
                                              <img class="myhead" src="<?php echo createsmallimg($user2['face'],'30','30');?>" alt=""/>
                                              <div class="comment-content">
                                                  <p class="comment-text">
                                                      <span class="user"><?php echo $user2['username'];?>:</span><?php echo $subComment['commentDetail'];?>
                                                  </p>
                                                  <p class="comment-time">
                                                      <?php echo date("M-j H:i:s",$subComment['publishTime']);?>
                                                      <a class="comment-praise" href="doLike.php?id=<?php echo $subComment['id'];?>&table=<?php echo COMMENTINCOMMENT;?>">Like</a> 
                                                      
                                                      <div class="praises-total" total="4" style="display: block;" id="likeNumber"><?php echo $subComment['likeNumber'];?> people like it</div>
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                                      <?php $j++;endforeach;?>
                                    <?php endif;?>
                                    <form action="doCommentInComment.php?commentId=<?php echo $rowComment['id'];?>&activityId=<?php echo $row['id'];?>" method="post">
                                      <div class="text-box">
                                          <textarea class="comment-ar" placeholder="  Comment..." name="commentDetail"></textarea>
                                          <input class="btn-ar " value="Replay" type="submit">
                                      </div>
                                    </form>
                                  </div>
                              </div>

                          </li>
                        <?php endforeach;?>
                        <?php endif;?>
                          
                      </ol>
                  </div>


                  <!-- .ol.comment-list -->

                  <div id="respond">
                      <h3>Leave a Reply</h3>
                      <form method="post" action="doActivityComment.php?id=<?php echo $row['id'];?>">
                          <div class="divider">
                              <p class="full">
                                  <textarea id="editor_id" name="commentDetail" style="width:98%;height:300px;"></textarea>
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
                                <?php foreach ($rows as $rowActivity) :?>
                                    <li><a href="article1.php?id=<?php echo $rowActivity['id'];?>"><?php echo $rowActivity['activityTitle'];?></a></li>
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

  </body>
  <script type="text/javascript">
  // function replay(user){
  //   document.getElementById("editor_id").value="@"+user;
  // }
  </script>
</html>
