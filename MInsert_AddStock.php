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
if( document.formA.barcode.value == '' )
		{
		formA.barcode.focus();
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

<body onLoad="document.formA.barcode.focus()";>
<form name="formA"  onSubmit="return check_re();">
  <table width="297" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4"><img src="img/HeaderHome.jpg" border="0" usemap="#Map"  /></td>
    </tr>
    <tr>
      <td height="25" colspan="4" align="left"><span class="style7" >&nbsp; Location No : <? 
$location = strtoupper($location);
echo "$location";?>&nbsp; <? echo "สาขา  ("."$SESS_BRANCH".")";?></span></td>
    </tr>
    <tr>
      <td width="5">&nbsp;</td>
      <td width="149" bgcolor="#FFFFFF" class="style6">&nbsp;ระบุ Barcode/Article</td>
      <td width="144" bgcolor="#FFFFFF">
  <input name="barcode" type="text" class='last' id="barcode" style="font-size:18px"  value="<?=$barcode;?>" size="15" maxlength="13"/>
  <input type="hidden" name="location" value="<?=$location?>" />
      </td>
      <td width="7">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="style6">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">
  <?php
$barcode=$_GET["barcode"];
$length = strlen($barcode);
if($barcode<>''){
include ("../connect/connect.php");
      //=====ตรวจสอบว่ามี รหัสสินค้าอยู่ในตาราง Product หรือไม่
   $sql_chk1="SELECT Count(*) AS total1 
                      FROM PRODUCT
                      WHERE ((material <>'' ) 
					  OR (oldmaterial <>'')) ";
	if($length>'9'){
	$sql_chk1.="AND ((barcode Like '$barcode%')) ";
	}else{
	$sql_chk1.="AND ((material Like '$barcode%')  OR (oldmaterial Like '$barcode%') 
	                    OR (oldmatuse Like '$barcode%'))";
	} 
     //	$sql_chk1 = iconv("UTF-8","TIS-620",$sql_chk1); 
	   $exec_chk1  = odbc_exec($connect,$sql_chk1) or die ("cannot execute query ");
	  
	   $total1 = odbc_result($exec_chk1,"total1");
	   //====
	   if($total1>=1)  //=====กรณีพบข้อมูลรหัสสินค้าในตาราง Product ตรวจสอบว่ามีอยู่ใน Precount แล้วหรือไม่
	     { echo "พบข้อมูล";
		            $sql_pre ="select Count(*) AS totalpre FROM precount 
				                       where  location = '$location' and branch_id = '$SESS_BRANCH' ";
					if($length>'9'){
		            $sql_pre.="and  barcode = '$barcode' ";
					}else{
		            $sql_pre.="and article ='$barcode' ";
					}
		//			$sql_pre = iconv("UTF-8","TIS-620",$sql_pre); 
					$exec_pre  = odbc_exec($connect,$sql_pre) or die ("cannot execute query ");
				
	                $totalpre = odbc_result($exec_pre,"totalpre");
					 if($totalpre>=1) //==กรณีที่มีการบันทึกรหัสสินค้าลงใน Location นี้แล้ว
					      {  echo "มีการบันทึกข้อมูลรหัสสินค้านี้แล้ว";
					         }else //====กรณีทียังไม่มีการบันทึกรหัสสินค้าลงใน Location นี้

					        {
         echo "<meta http-equiv=\"refresh\"  content=\"0;url=MInsert_AddStockArticle.php?location=$location&barcode=$barcode\">";						                              }	//===end  กรณีทียังไม่มีการบันทึกรหัสสินค้าลงใน Location นี้
	      }else {echo "ไม่พบข้อมูล";}	
  }
?>      </td>
    </tr>
    <tr>
      <td colspan="4"><input type="image" name="Submit" id="Submit" src="img/Search.jpg"  value="submit"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><a href="MCreate_Precount.php"><img src="../style/menu4.gif" alt="" width="120" height="26" border="0" /></a></td>
      <td colspan="2" align="center"><a href="MInsert_Codeprecount.php?location=<?=$location;?>"><img src="../style/menu3.gif" alt="" width="120" height="26" border="0" /></a></td>
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