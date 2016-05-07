<?php
// include_once("../include.php");
include_once (ROOT.'/include.php');

function postArticleComment($id){
	$arr=$_POST;
	$arr['publishName']=$_SESSION['username'];
	if ($arr['publishName'] == null) {
		# code...
		alertMes("Sorry!Please login Firstly!","index.html");
	}else{
		$arr['postId']=$id;
		$arr['publishTime']=time();
		if (insert(ARTICLECOMMENT,$arr)) {
			# code...
			alertMes("Comment successfully!","article.php?id=".$id);
		}else{
			alertMes("Comment failed!","article.php?id=".$id);
		}
	}
	
}

function postPostComment($id){
	$arr=$_POST;
	$arr['publishName']=$_SESSION['username'];
	if ($arr['publishName'] == null) {
		# code...
		alertMes("Sorry!Please login Firstly!","index.html");
	}else{
		$arr['postId']=$id;
		$arr['publishTime']=time();
		if (insert(POSTCOMMENT,$arr)) {
			# code...
			alertMes("Comment successfully!","post.php?id=".$id);
		}else{
			alertMes("Comment failed!","post.php?id=".$id);
	}
	}
	
}

function postActivityComment($id){
	$arr=$_POST;
	$arr['publishName']=$_SESSION['username'];
	if ($arr['publishName'] == null) {
		# code...
		alertMes("Sorry!Please login Firstly!","index.html");
	}else{
		$arr['activityId']=$id;
		$arr['publishTime']=time();
		if (insert(ACTIVITYCOMMENT,$arr)) {
			# code...
			alertMes("Comment successfully!","article1.php?id=".$id);
		}else{
			alertMes("Comment failed!","article1.php?id=".$id);
	}
	}
	
}

function postActivityCommentInComment(){
	$arr=$_POST;
	$arr['commentId']=$_REQUEST['commentId'];
	$arr['activityId']=$_REQUEST['activityId'];
	$arr['publishName']=$_SESSION['username'];
	if ($arr['publishName'] == null) {
		# code...
		alertMes("Sorry!Please login Firstly","index.php");
	}
	$arr['publishTime']=time();
	$arr['likeNumber']=0;
	if (insert(COMMENTINCOMMENT,$arr)) {
		# code...
		alertMes("Post successfully!","article1.php?id=".$arr['activityId']);
	}else{
		alertMes("Post failed.Please post again","article1.php?id=".$arr['activityId']);
	}
}