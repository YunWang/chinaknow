<?php
// require_once '../lib/mysql.func.php';
include_once (ROOT.'/include.php');
// include_once './include.php';
// require_once '../include.php';
/**
 * 用户注册页
 * @return string
 */
function register(){
    //取出所有邀请码
    $sql="select invitationCode from ".USER;
    $rows=fetchAll($sql);
    $arr['username']=stripslashes(trim($_POST['username'])); 
    // echo "Username".$_POST['username'];
    $arr['email']=$_POST['email'];
    if (!verifyEmailFormat($arr['email'])) {
        # code...
        alertMes("Sorry,your email format is wrong,please enter again!","../register.html");
    }
    $arr['university']=$_POST['university'];
    $arr['phone']=$_POST['phone'];
    $arr['country']=$_POST['country'];
    $arr['address']=$_POST['address'];
    $arr['password']=md5(trim($_POST['password'])); 
    $arr['token'] = md5($username.$password.$regtime); //创建用于激活识别码 
    $arr['token_exptime'] = time()+60*60*24;//过期时间为24小时后 
    // $arr['face']="This is a picture!";
    if ($_FILE == null) {
        # code...
        $arr['face']=DEFAULTFACE;
    }else{
        $arr['face']=uploadFile();
    }
    $arr['regTime']=time();
    // echo "POST:".$_POST['invitationCode'];
    $arr['invitationCode']=$_POST['invitationCode'];
    $temp=$_POST['invitationCode'];
    // echo "arr:".$arr['invitationCode'];
    if ($arr['invitationCode'] == NULL) {
        # code...
        alertMes("Sorry!No invitation code!","register.html");
        exit("Sorry!No invitation code!");
    }else{
        foreach ($rows as $row) {
            # code...
            //验证码是否有效
            if ($arr['invitationCode'] == $row['invitationCode']) {
                # code...
                $arr['invitationCode']=md5($arr['username']);
            }
        }
    }
    if ($arr['invitationCode']==$temp) {
        # code...
        alertMes("Sorry!Invitation code is not available!","register.html");
        exit("Sorry!Invitation code is not available!");
    }
    $arr['integration']=0;
    $arr['level']="1";
    $arr['AuditState']=0;
    if (insert(USER, $arr)) {
        // $_SESSION['username']=$arr['username'];
        // alertMes("Register Successfully!Please login your email and active your account.","index.html");
        $smtpserver = "smtp.sina.com"; //SMTP服务器，如：smtp.163.com 
        $smtpserverport = 25; //SMTP服务器端口，一般为25 
        $smtpusermail = "ivanchhch@sina.com"; //SMTP服务器的用户邮箱，如xxx@163.com 
        $smtpuser = "ivanchhch@sina.com"; //SMTP服务器的用户帐号xxx@163.com 
        $smtppass = "chenhanchi"; //SMTP服务器的用户密码 
        $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //实例化邮件类 
        $emailtype = "HTML"; //信件类型，文本:text；网页：HTML 
        $smtpemailto = $arr['email']; //接收邮件方，本例为注册用户的Email 
        $smtpemailfrom = $smtpusermail; //发送邮件方，如xxx@163.com 
        $emailsubject = "Chinaknow:Active your account";//邮件标题 
        //邮件主体内容 
        $emailbody = "亲爱的".$arr['username']."：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/> 
        <a href='http://www.helloweba.com/demo/register/active.php?verify=".$arr['token']."' target= 
        '_blank'>http://www.helloweba.com/demo/register/active.php?verify=".$arr['token']."</a><br/> 
        如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。"; 
        //发送邮件 
        $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype); 
        if($rs==1){ 
            $_SESSION['username']=$arr['username'];
            alertMes("Register Successfully!Please login your email and active your account.","index.html");    
        }else{ 
            alertMes("Sorry,Some error occur,please try later","../register.html"); 
        } 

    }else{
        alertMes("Register Failed!","register.html");
    }
}

function checkUser($sql){
    return fetchOne($sql);
}

function getAllUser(){
    $sql = "select id,username,gander,email,regTime from chinaknow_user";
    $rows = fetchAll($sql);
    return $rows;
}

function getUserByPage($pageSize=2) {
    $sql="SELECT * FROM ".USER;
    // print($sql);
    $totleRows=getResultNumber($sql);
    //  echo $totleRows;
    //得到总页码数
    global $totalPage;
    if (0 == $pageSize) {
        alertMes("每页显示条数不能为零", "index.php");
    }elseif (0 > $pageSize){
        alertMes("每页显示的条数不能小于零", "index.php");
    }else {
        $totalPage=ceil($totleRows/$pageSize);
    }
    $page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
    if ($page<1||$page==null||!is_numeric($page)) {
        $page=1;
    }
    if ($page>=$totalPage) {
        $page = $totalPage;
    }
    $offset = ($page-1)*$pageSize;
    $sql="select * from ".USER." limit {$offset},{$pageSize}";
    $rows=fetchAll($sql);
    return $rows;
}

function editUser($id){
    $arr=$_POST;
    //     print_r($arr);
    $arr['password']=md5($_POST['password']);
    $arr['face']=uploadFile();
    $arr['regTime']=time();
    //     print_r($expression)
    if (update("chinaknow_user", $arr,"id={$id}")) {
        alertMes("Successfully!","user-design.php");
    }else{
        alertMes("Failed!","user-design.php");
    }
}

function delUser($id) {
    if (delete(USER,"id={$id}")) {
        alertMes("Successfully!","user-design.php");
    }else{
        alertMes("Failed!","user-design.php");
    }
}

function addUser(){
    $arr=$_POST;
    $arr['password']=md5($_POST['password']);
    // echo $arr['password'];
    $arr['face']=uploadFile();
    // echo $arr['face'];
    $arr['regTime']=time();
    $arr['invitationCode']=md5($_POST['username']);
    $arr['integration']=0;
    $arr['level']="1";
    $arr['AuditState']=1;
    // print_r($arr);
    if (insert(USER, $arr)) {
        alertMes("Successfully!","user-design.php");
    }else {
        // print_r(mysql_error());
        alertMes("Failed!","user-design.php");
    }
}