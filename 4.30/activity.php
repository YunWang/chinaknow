<?php
include_once("include.php");
$id=$_REQUEST['id'];
// $id=14;
$sql="select *from ".ACTIVITY."where id ='{$id}'";
// echo $sql;
$row=fetchOne($sql);

$pageSize=5;
$rows=getActivityByPage($pageSize);
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
            <li><a href="forum.html">Forum</a></li>
            <li><a href="trends.html">Trends</a></li>
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
                  <span class="categories">Tag,<?php echo $row['tagName'];?></span>
                  <?php 
                      // $sql="select id from ".COMMENT." where postId='{$row['id']}'";
                      // $commentNumber = getResultNumber($sql);
                  ?>
                  <span class="comments">0 Comments</span>
                </p> 
              </div>

            </div>
            <!-- END .entry -->


            <div id="comments">

            	<ol class="comment-list">

            	  <li id="comment-1" class="comment">
          	      <div class="gravatar">
                    <img src="images/gravatar_2.jpg" alt="" height="70" width="70" />
                    <a href="#" class="reply-link" rel="nofollow">Reply</a>
          	      </div>
                  <div class="content">
                    <cite class="name">Mr. Smith</cite>
                    <a class="meta-data" href="#">Nov 6, 2010 at 4:30 am</a>
                    <div class="text">
                      <p>
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in anim id est laborum. Aehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                      </p>
                    </div>
                  </div>
            	  </li>

            	  <li id="comment-2" class="comment">
          	      <div class="gravatar">
                    <img src="images/gravatar_1.jpg" alt="" height="70" width="70" />
                    <a href="#" class="reply-link" rel="nofollow">Reply</a>
          	      </div>
                  <div class="content">
                    <cite class="author"><a class="url" rel="external nofollow" href="#">Ruven</a></cite>
                    <a class="meta-data" href="#">Nov 7, 2010 at 8:22 am</a>
                    <div class="text">
                      <p>
                        Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nisl.
                      </p>
                    </div>
                  </div>

            	    <ol class="comment-list">
                	  <li id="comment-3" class="comment">
              	      <div class="gravatar">
                        <img src="images/gravatar_2.jpg" alt="" height="49" width="49" />
              	      </div>
                      <div class="content">
                        <cite class="author">Mr. Smith</cite>
                        <a class="meta-data" href="#">Nov 6, 2010 at 4:30 am</a>
                        <div class="text">
                          <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in anim id est laborum. Aehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                          </p>
                        </div>
                      </div>
                	  </li>

                	  <li id="comment-4" class="comment">
              	      <div class="gravatar">
                        <img src="images/gravatar.jpg" alt="" height="49" width="49" />
              	      </div>
                      <div class="content">
                        <cite class="author"><a class="url" rel="external nofollow" href="#">Toby</a></cite>
                        <a class="meta-data" href="#">Nov 7, 2010 at 8:22 am</a>
                        <div class="text">
                          <p>
                            Morbi interdum mollis sapien. Sed ac risus.
                          </p>
                        </div>
                      </div>
                	  </li>

                  </ol>

            	  </li>

            	  <li id="comment-5" class="comment">
          	      <div class="gravatar">
                    <img src="images/gravatar_4.jpg" alt="" height="70" width="70" />
                    <a href="#" class="reply-link" rel="nofollow">Reply</a>
          	      </div>
                  <div class="content">
                    <cite class="author">Doris</cite>
                    <a class="meta-data" href="#">Nov 6, 2010 at 4:35 am</a>
                    <div class="text">
                      <p>
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in anim id est laborum. Aehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                      </p>
                    </div>
                  </div>
            	  </li>

              </ol>
              <!-- .ol.comment-list -->

              <div id="respond">
                <h3>Leave a Reply</h3>
                <form method="post" action="#">
                  <div class="divider">
                  <p class="full">
                    <textarea name="comment" id="comment" class="textarea required" cols="40" rows="8"></textarea>
                  </p>
                  <p>
                    <button id="submit" name="submit" type="submit">Submit Reply</button>
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
                  <li><a href="activity.php?id=<?php echo $rowActivity['id'];?>"><?php echo $rowActivity['activityTitle'];?></a></li>
                  <?php endforeach;?>
                  <?php endif;?>
                  <!-- <li><a href="article.html">Nam convallis pellentesque nisl</a></li>
                  <li><a href="article.html">Cras iaculis ultricies nulla</a></li>
                  <li><a href="article.html">Praesent placerat</a></li>
                  <li><a href="article.html">Cras ornare tristique elit</a></li>
                  <li><a href="article.html">Nunc dignissim metus</a></li>
                  <li><a href="article.html">Aliquam tincidunt mauris eu</a></li>
                  <li><a href="article.html">Ut aliquam sollicitudin leo</a></li>
                  <li><a href="article.html">Nam convallis pellentesque nisl</a></li>
                  <li><a href="article.html">Cras iaculis ultricies nulla</a></li> -->
                </ul>
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
</html>
