<?php
include_once("include.php");
 
$verify = stripslashes(trim($_GET['verify'])); 
$nowtime = time(); 
 
$query = mysql_query("select id,token_exptime from ".USER." where status='0' and  
`token`='$verify'"); 
$row = mysql_fetch_array($query,MYSQL_ASSOC); 
if($row){ 
    if($nowtime>$row['token_exptime']){ //24hour 
        // $msg = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.'; 
        alertMes("Sorry,your active is not available","index.html");
    }else{ 
        mysql_query("update ".USER." set status=1 where id=".$row['id']); 
        if(mysql_affected_rows($link)!=1) die(0); 
        // $msg = '激活成功！';
        alertMes("active successfully!","index.html");
    } 
}else{ 
    // $msg = 'error.';
    alertMes("Sorry,some error occur,please active later","index.html");
} 
// echo $msg;
