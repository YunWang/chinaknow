<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>测试PHP和JavaScript交换参数</title>
</head>
<body>
<form action="emailActive.php" method="post" id="user_register">

<table align="center" background="#cccccc">
 <tr bgcolor="#CCCCCC"><td colspan="2"><div align="center">会员注册</div></td></tr>
  <tr bgcolor="#6699CC">
 <td width="80"><div align="right">用户名：</div></td>
   <td width="378">   
   <input type="text" name="edit[name]" id="edit-name" size="30" />
      </td>
   </tr>
     <tr bgcolor="#CCCCCC">
    <td><div align="right">密 码：</div></td>
  
    <td>
    <input type="password" name="edit[pass]" id="edit-pass" size="30" />
    </td>
     <tr bgcolor="#6699CC"> 
 <td><div align="right">确认密码：</div></td>
 <td>
   <input type="password" name="edit[pass2]" id="edit-pass2" size="30" />
   </td>
   </tr>
   <tr bgcolor="#6699CC">

   <td width="45"><div align="right">邮箱：</div></td>
      <td>
          <input type="text" name="edit[mail]" id="edit-mail"/>
       </td>
   </tr>
  <tr bgcolor="#CCCCCC" align="center">
 <td colspan="2">
 <input type="submit" name="op" value="确认注册" onclick="return check_form()"/>
 </td>
 </tr>
 </table>
 </form>
 <script language="JavaScript">
 function check_form(){

 var username = document.getElementById("edit-name").value;

 var password = document.getElementById("edit-pass").value;

 var password2 = document.getElementById("edit-pass2").value;

 var mail = document.getElementById("edit-mail").value;  

 var msg ="";
  if(username=="")
  {
  msg+="username is not null! \n";
   alert(msg);
     }
  if(password==""){msg+="password is not null! \n";
    alert(msg);
     }
  if(password!=password2){msg+="password must equal! \n";
    alert(msg);
  
     }
  if(radiobutton==""){msg+="sex is not null! \n";
    alert(msg);
     }
  if(mail==""){msg+="mail is not null! \n";
    alert(msg);
     }
  if(msg==""){
   alert("哈哈，小飞飞又成功了");
   window.open("login.php");
      return true;
  
     }else{
       alert("小飞飞，你终于失败了");
        return false;
           }


 }

</script>
</body> 
<script type="text/javascript" src="../getUserName.php"></script> 
</body>
</html>