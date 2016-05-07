<?php
include_once("include.php");
$id=$_REQUEST['id'];
$sql="select *from ".ACTIVITY." where id='{$id}'";
$row=fetchOne($sql);
if (!isset($row)) {
    # code...
    alertMes("Sorry!Some error occur,please try later","article1.php?id=".$id);
}
?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link title="style1" rel="stylesheet" href="css/act-form.css" type="text/css" />
</head>
<body>

	<div class="form_content">
    <form id="test" action="doJoinIn.php?activityId=<?php echo $row['id'];?>" method="post">
    <fieldset>
        <legend>Join in <?php echo $row['activityTitle'];?></legend>
        <div class="form-row">
            <div class="field-label"><label for="field1">First Name</label>:</div>
            <div class="field-widget"><input name="firstname" id="field1" class="required"  /></div>
        </div>
        
        <div class="form-row">
            <div class="field-label"><label for="field2">Last Name</label>:</div>
            <div class="field-widget"><input name="lastname" id="field2" class="required"  /></div>
        </div>
		<div class="form-row">
            <div class="field-label"><label for="field3">Phone Number</label>:</div>
            <div class="field-widget"><input name="phone" id="field3" class="required"  /></div>
        </div> 
        <div class="form-row">
            <div class="field-label"><label for="field4">Your University</label>:</div>
            <div class="field-widget"><input name="university" id="field4" class="required" /></div>
        </div> 
		<div class="form-row">
            <div class="field-label"><label for="field5">Current Resident</label>:</div>
            <div class="field-widget"><input name="address" id="field5" class="required l" /></div>
        </div> 
               
        
    </fieldset>
    <input type="submit" class="submit" value="Submit" /> <input class="reset" type="button" value="Reset" onclick="valid.reset(); return false" />
    </form>
    </div>


</body>
</html>