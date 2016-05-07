<?php
 require ('email.class.php');
 include "dbconnect.php";
 include "functions.php";
 $form=check_form(@$_POST['edit']);
 extract($form);


$username=@$_POST['username'];
 $sql="insert into tb_user(id,username,password,mail) values(null,'".@$_POST['username']."','".@$_POST['password']."','".@$_POST['mail']."')";
 mysql_query($sql);

@$sql1 = "insert into tb_user(id,username,password,status,md5name) values(null,'{$name}','{$pass}','0',md5('{$name}'))";

$res = mysql_query($sql1);
  // echo $mail;                                                                                                                                         
 //echo $sql;
 //$sql1="select mad5name from tb_user where username='[$name]'";
 //mysql_query($sql1);
 $smtpserver = "smtp.163.com";//SMTP服务器
 $smtpserverport =25;//SMTP服务器端口
 $smtpusermail = "*********";//发信人
 @$smtpemailto = $mail;//收信人
 $smtpuser = "*************"; //smtp.qq.com需要验证的
 $smtppass = "**********";
 $mailsubject = "激活码";

$mailbody = "<a href=http://localhost/do_reg.php?id=3>点击http://localhost/do_reg.php?id=3</a>";
 $mailtype = "HTML";

$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
 $smtp->debug = false;
 $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);

 
