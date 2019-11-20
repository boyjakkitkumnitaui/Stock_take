<? session_start();
header ('Content-Type: text/html; charset=windows-874');
 include ("chksess_b.php");
   include("../connect/connect.php");
?>
<script type="text/javascript">
function onKeyDown() {   
var keycode;  
 if (window.event) keycode = window.event.keyCode;  
  if (keycode == 13) {      
  window.event.keyCode = 9;   }  
  return true;}
  document.onkeydown = onKeyDown;
/*function setNextFocus(objId){
if (event.keyCode == 13){
var obj=document.getElementById(objId);
if (obj){
obj.focus();
}
}
}*/
</script>
<script type="text/javascript">
function handleEnter(event){
var e=window.event?window.event:event;
var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;
if (keyCode == 13){
if (this.className && this.className=='last'){
this.form.submit();
return true;
}
window.onload=function(){
var a=document.formA;
e.onkeypress=handleEnter;
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>สร้างใบ Pre-Count & บันทึกยอดนับ</title>
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
	}
</style>
</head>

<body onLoad="document.formA.barcode.focus()";>
<form name="formA"  id="formA" action="Insert_Codeprecount_AddQty.php"  method="post"  class='last'>
  <table width="295" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="4"><img src="img/HeaderHome.jpg" border="0" usemap="#Map"  /></td>
    </tr>
    <tr>
      <td height="25" colspan="4" align="left"><span class="style6"> Location No :
          <? 
$location = strtoupper($location);
echo "$location";?>
      &nbsp; <? echo "สาขา  ("."$SESS_BRANCH".")";?></span></td>
    </tr>
    <tr>
      <td width="16">&nbsp;</td>
      <td width="129" bgcolor="#FFFFFF" class="style7">
	  <?
//=================กรณีมีการบันทึกข้อมูล
  if(isset($_POST['SaveRequestForm'])) {
	  
		    include("../connect/connect.php");
	
	//ตรวจสอบว่าเคยมีการบันทึกข้อมูลในตาราง Upstock แล้วหรือไม่		
$sql_ck="SELECT  totalck FROM UPSTOCK_TOTALCHK 
             WHERE   LOCATION ='$location'
			 AND  BRANCH_ID ='$SESS_BRANCH'  ";
$exec_ck  = odbc_exec($connect,$sql_ck) or die ("cannot execute query ");
$totalck= odbc_result($exec_ck,"totalck");
			
			if($totalck>0){
			 $chk_lo='U'; //เคยมีการบันทึกแล้ว
			 }else{
			 $chk_lo='';
			 }
	//	echo "$location";
		
if($location!=''){
$date_now=date("m/d/Y H:i:s");
for($i=1;$i<=$num;$i++){
$chk_ar="SELECT count(*) as totalar FROM UPSTOCK 
             WHERE  ARTICLE = '$ARTICLE[$i]'
			 AND  LOCATION ='$location'
			 AND  BRANCH_ID ='$SESS_BRANCH'  ";
$exec_chkar  = odbc_exec($connect,$chk_ar) or die ("cannot execute query ");
$totalar= odbc_result($exec_chkar,"totalar");

if($totalar==0){
$add ="insert into UPSTOCK values ('$BARCODE[$i]','$ARTICLE[$i]','$QUANTITY[$i]','$qty[$i]','$location','$date_now','$SESS_BRANCH')";
//echo $add;
odbc_exec ($connect,$add) or die("<br>Query failed in insert data");

$addck ="INSERT INTO UPSTOCK_LOG
 VALUES ('$BARCODE[$i]' ,'$ARTICLE[$i]' ,'$QUANTITY[$i]','$qty[$i]' ,'999.99' ,'$chk_lo','$location'
,'$date_now','','$date_now' ,'$SESS_BRANCH')";
odbc_exec ($connect,$addck) or die("<br>Query failed in insert data02");

}else{
$query_edit = "UPDATE UPSTOCK SET QTY= '$qty[$i]'  ,DATEUP ='$date_now'
                WHERE ARTICLE = '$ARTICLE[$i]'
			    AND  LOCATION ='$location'
			    AND  BRANCH_ID ='$SESS_BRANCH' ";
odbc_exec($connect,$query_edit) or die("Query failed in update data");

$query_editck = "	UPDATE  UPSTOCK_LOG
SET QTY2 = '$qty[$i]',DATEUP02 = '$date_now'
WHERE BARCODE ='$BARCODE[$i]'
AND ARTICLE = '$ARTICLE[$i]'
AND  LOCATION ='$location'
AND  BRANCH_ID ='$SESS_BRANCH' ";
odbc_exec($connect,$query_editck) or die("Query failed in update data02");
} 
    if ($i==$num) {
	echo "OK";
      echo "<meta http-equiv=\"refresh\"  content=\"1;url=Insert_Codeprecount.php?location=$location\">";
    }
 } }
}//====end if location
  //==================================================================
  //==================================================================
  //==================================================================
  //======================จบ กรณีมีการบันทึกข้อมูล
?>	  </td>
      <td width="138" bgcolor="#FFFFFF" class="style7">&nbsp;</td>
      <td width="22">&nbsp;</td>
    </tr>
	<?
  if(!isset($_POST['SaveRequestForm'])) {
?>
  <?
//================แสดงข้อมูลใบ Precount
/*$sql_show="SELECT PRECOUNT.BARCODE, PRECOUNT.ARTICLE, PRECOUNT.DESCRIPTION, PRECOUNT.QUANTITY, UPSTOCK.QTY, UPSTOCK.DATEUP, UPSTOCK.LOCATION, UPSTOCK.BRANCH_ID, PRECOUNT.PRECOUNT_RUN
FROM UPSTOCK 
FULL  JOIN PRECOUNT ON (PRECOUNT.ARTICLE = UPSTOCK.ARTICLE) 
AND (PRECOUNT.LOCATION = UPSTOCK.LOCATION) 
WHERE  PRECOUNT.BRANCH_ID='$SESS_BRANCH' 
 AND  PRECOUNT.LOCATION = '$location%'  
ORDER BY PRECOUNT.PRECOUNT_RUN";*/
$sql_show="SELECT PRECOUNT.BARCODE, PRECOUNT.ARTICLE
, PRECOUNT.AR_MOTHER
, PRECOUNT.DESC_MOTHER
, PRECOUNT.DESCRIPTION, PRECOUNT.QUANTITY, PRECOUNT.LOCATION, UPSTOCK.QTY
FROM UPSTOCK 
RIGHT JOIN PRECOUNT ON (UPSTOCK.LOCATION = PRECOUNT.LOCATION) 
AND (UPSTOCK.BRANCH_ID= PRECOUNT.BRANCH_ID)
AND (UPSTOCK.ARTICLE = PRECOUNT.ARTICLE)

WHERE (PRECOUNT.LOCATION='$location' )
AND (PRECOUNT.BRANCH_ID='$SESS_BRANCH' )
AND  (PRECOUNT.BARCODE = '$barcode' or PRECOUNT.ARTICLE ='$barcode'  or PRECOUNT.AR_MOTHER ='$barcode')
ORDER BY  LEFT(PRECOUNT.ARTICLE,2),PRECOUNT.PRECOUNT_RUN";

$exec_show = odbc_exec($connect,$sql_show) or die ("cannot execute queryshow ");
?>

  <input name="barcode" type="hidden" value="<? echo "$barcode";?>" />
  <input name="location" type="hidden" value="<? echo "$location";?>" />
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" bgcolor="#FFFFFF" class="style6">
	  <input type="submit" name="SaveRequestForm" value="บันทึกข้อมูล">
	  
	  <table width="100%" border="1">
  <tr>
    <td bgcolor="#7489A6"><div align="center"><strong>Article</strong></div></td>
    <td bgcolor="#7489A6" ><div align="center"><strong>DESC.</strong></div></td>
    <td bgcolor="#7489A6" ><div align="center"><strong>Qty.</strong></div></td>
  </tr>
      <? 
		  $i=0; $p=1;
		  while($rower = odbc_fetch_array($exec_show)) 
			  { $i++;  $p++;
		  ?>
          <input type="hidden" name="num" value="<? echo $i;?>" />
          <? 
	if(($rower[ARTICLE] !=$rower[ AR_MOTHER]) and  ($chk_ar != $rower[ AR_MOTHER] )){
?>
  <tr>
    <td class="style7">+<? echo "$rower[AR_MOTHER]";?></td>
    <td class="style7"><? echo $rower[DESC_MOTHER];?></td>
    <td class="style7">&nbsp;</td>
  </tr>
  <? }?>
  <tr>
    <td class="style7">
	<? echo "$rower[ARTICLE]";?>
      <input type="hidden" name="<? echo "ARTICLE[$i]";?>" value="<? echo $rower[ARTICLE];?>" />
      <input type="hidden" name="<? echo "BARCODE[$i]";?>" value="<? echo "$rower[BARCODE]";?>" />
	  </td>
    <td class="style7"><? echo $rower[DESCRIPTION];?>
      <input type="hidden" name="<? echo "DESCRIPTION[$i]";?>" value='<? echo "$rower[DESCRIPTION]";?>'/>
      <input type="hidden" name="<? echo "QUANTITY[$i]";?>"  value="<? echo "$rower[QUANTITY]";?>"/></td>
    <td class="style7">
	 <?
		//echo "$rower[QTY]";
		if($rower[QTY] !=''){
		 $qqty=number_format($rower[QTY], 0, '.',',$rower[QTY]' );   }
		 ?>
          <input name="<? echo "qty[$i]";?>" type="text"  id="<? echo "qty[$i]";?>" style="font-size:18px" onKeyDown="onKeyDown();" value="<? echo "$rower[QTY]";?>" size="2" maxlength="5" />
		  </td>
  </tr>
    <? 

 $chk_ar = $rower[ AR_MOTHER];
	   } //============= end while แสดงข้อมูล กรณีมีตัวลูก
?>
</table>

	  
	  </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">      </td>
    </tr>
<?
}//========end  if(!isset($_POST['SaveRequestForm'])) {
?>
	
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