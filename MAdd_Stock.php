<? session_start();
header ('Content-Type: text/html; charset=windows-874');
 include ("chksess_b.php");
?>
<script>
function handleEnter(event){
var e=window.event?window.event:event;
var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;
if (keyCode == 13){
if (this.className && this.className=='last'){
this.form.submit();
return true;
}
var i;
for (i = 0; i < this.form.elements.length; i++)
if (this == this.form.elements[i])
break;
if (this.type=='textarea' && e.shiftKey)
return true;
else if (this.type=='radio')
this.form.elements[i+this.form.elements[this.name].length].focus();
else
this.form.elements[i+1].focus();
return false;
}
else
return true;
}

window.onload=function(){
var a=document.formA;
for(var i=0;i<a.elements.length;i++){
var e=a.elements[i];
e.onkeypress=handleEnter;
}
}

</script>
<script language="JavaScript">
function check_re() {
if( (document.formA.location.value.length != 7)  && (document.formA.location.value.length != 12) && (document.formA.location.value.length != 13))
		{
		 alert("กรุณากรอกรหัส Locaiotn ถูกต้อง"); 
		 formA.location.focus();
		 return false;
		}
	}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(img/BG.jpg);
}
.style6 {
	font-size: 13px;
	color: #333333;
	border: 0px solid #fff;
	font-weight: bold;
}
.style7 {	font-size: 13px;
	color: #333333;
	border: 0px solid #fff;
	font-weight: bold;}
</style>
</head>

<body onLoad="document.formA.location.focus()";>
<form name="formA"  onSubmit="return check_re();">
  <table width="295" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4"><img src="img/HeaderHome.jpg" border="0" usemap="#Map"  /></td>
    </tr>
    <tr>
      <td height="25" colspan="4" align="left"> &nbsp;<span class="style7" ><? echo "สาขา  ("."$SESS_BRANCH".")";?></span></td>
    </tr>
    <tr>
      <td width="16">&nbsp;</td>
      <td width="123" bgcolor="#FFFFFF" class="style6">&nbsp;ระบุ Location No.</td>
      <td width="144" bgcolor="#FFFFFF"><input name="location" type="text" style="font-size:18px" size="14" maxlength="14" class='last'  value="<?=$location;?>" onChange="javascript:this.value=this.value.toUpperCase();"/></td>
      <td width="22">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="style6">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
       &nbsp;<?php
//substr($_GET["location"], 0, 12);  
$location_chk=substr($_GET["location"], 0, 12); 
$location =substr($_GET["location"], 0, 12); 
if($location_chk<>''){
include ("../connect/connect.php");
   $sql_chk1="select count(*) as total1  from location where location = '$location_chk' and BRANCH_ID='$SESS_BRANCH'";
  $sql_chk1  = utf8_decode($sql_chk1);
	   $exec_chk1  = odbc_exec($connect,$sql_chk1) or die ("cannot execute query ");
	   
	  
	   $total1 = odbc_result($exec_chk1,"total1");
	   //====check location
	   if($total1>0){ echo "พบข้อมูล";
	  echo "<meta http-equiv=\"refresh\"  content=\"0;url=MInsert_AddStock.php?location=$location\">";
	   }else {echo "ไม่พบ Location";
	   
	   }	
  }
?>
      </td>
    </tr>
    <tr>
      <td colspan="4"><input type="image" name="Submit" id="Submit" src="img/Search.jpg"  value="submit"/></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>

<map name="Map" id="Map">
  <area shape="rect" coords="262,8,301,29" href="MIndex.php" />
</map>
</body>
</html>