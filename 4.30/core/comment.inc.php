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