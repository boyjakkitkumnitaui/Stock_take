<? session_start();
header ('Content-Type: text/html; charset=windows-874');
 include ("chksess_b.php");
?>
<script>
	function handleEnter(event) {
		var e = window.event ? window.event : event;
		var keyCode = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
		if (keyCode == 13) {
			if (this.className && this.className == 'last') {
				this.form.submit();
				return true;
			}
		}
		window.onload = function() {
			var a = document.formA;
			e.onkeypress = handleEnter;
		}
	}

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title>สร้างใบ Pre-Count & บันทึกยอดนับ</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(img/BG.jpg);
}
.pstylehead {
			font-size: 35px;
			font-weight: bold;
			text-align: center;
		}

		.pstyle {
			font-size: 18px;
			font-weight: bold;
			text-align: center;
		}

		.pstylelo {
			font-size: 16px;
			font-weight: bold;
		}

		.pstylebutton {
			font-size: 18px;
			font-weight: bold;
			text-align: center;
		}

		.pstyle6 {
			font-size: 16px;
			/* font-weight: bold; */
		}

		.pstyle7 {
			font-size: 14px;
			/* font-weight: bold; */
			word-wrap: break-word;
			width: 70px;
		}
</style>
</head>

<body onLoad="document.formA.location.focus()";>
<h1>&nbsp;</h1>
<div class="container">
<form name="formA"  id="formA" action="Insert_CodeprecountArticle.php"  method="post"  class='last'>
	<div class="form-group"><p class="pstylehead">STOCK TAKE</p></div>
  <table class="table">
    <tr>
      <td colspan="3"><img src="img/HeaderHome.jpg" border="0" usemap="#Map"  /></td>
    </tr>
    <tr>
      <td height="12" colspan="3" align="left"><span class="style7" >&nbsp; Location No : <? 
$location = strtoupper($location);
echo "$location";?>&nbsp; <? echo "สาขา  ("."$SESS_BRANCH".")";?></span></td>
    </tr>
    <tr>
      <td height="13" colspan="3" align="left">
 <!--      -->
 <input type="submit" name="SaveRequestForm" value="บันทึกข้อมูล">   <input name="barcode" type="hidden" value="<? echo "$barcode";?>" />
  <input name="location" type="hidden" value="<? echo "$location";?>" /> 
 
<?
//=================กรณีมีการบันทึกข้อมูล
  if(isset($_POST['SaveRequestForm'])) {
   //  echo "$SaveRequestForm";
     if(($SESS_BRANCH<>'' ) and ($location <>'')){///=====ตรวจสอบว่า รหัสสาขที่จะบันทึกเป็นค่าว่างหรือไม่
  include ("../connect/connect.php");
  $date_now=date("m/d/Y H:i:s");
	
if($a=='Y'){ //========กรณีมีรหัสสินค้าตัวลูก

 $countarr= count( $articlearr );
							//   echo  $countarr;
							  for($i=0;$i<$countarr;$i++)
			                      { 
								//  echo "$i" ;
								  	 $sql_pre ="select Count(*) AS totalpre,article FROM precount 
				                       where (barcode = '$barcodearr[$i]' or article ='$articlearr[$i]')
								       and location = '$location' and branch_id = '$SESS_BRANCH'
									   group by article ";
					$exec_pre  = odbc_exec($connect,$sql_pre) or die ("cannot execute query ");
	                $totalpre = odbc_result($exec_pre,"totalpre");
					 $articleS = odbc_result($exec_pre,"article");
					 if($totalpre>=1) //==กรณีที่มีการบันทึกรหัสสินค้าลงใน Location นี้แล้ว
					      { 
    echo "</br>";echo "</br>"; echo " -  มีการบันทึกข้อมูลนี้ไปเรียบร้อยแล้ว";echo "</br>";echo "</br>";
	//Remark 13 Aug 2013
echo "<meta http-equiv=\"refresh\"  content=\"2;url=Insert_Codeprecount_AddQty.php?location=$location&barcode=$article_mother\">";
				  ?>

<?
						    // exit();
					         }else //====กรณีทียังไม่มีการบันทึกรหัสสินค้าลงใน Location นี้
					        { 
								     //===ค้นหาจำนวนล่าสุด เพื่อเรียก ตัวเรียงในใบ Precount
  $max_count="SELECT MAX(PRECOUNT_RUN) AS NUM FROM PRECOUNT 
                         WHERE BRANCH_ID= '$SESS_BRANCH' 
						 AND LOCATION = '$location' ";
    
	$max_com = odbc_exec($connect,$max_count) or die ("cannot execute count ");
	
	$count_num = odbc_result($max_com,"NUM");

	$item_id=$count_num +1;
echo "<br>";
//echo "$articlearr[$i]";
$id = "$articlearr[$i]";
$vowels = array("'"); 


$id2=str_replace($vowels, " ", "$id "); 
								 $sql_insert1 ="insert into PRECOUNT 
	                                                	values ('$barcodearr[$i]','$id2','$location'
														,'$descriptionarr[$i]','$item_id','$SESS_BRANCH'
														,'$date_now','$quantityarr[$i]','','$article_mother','$desc_mother','')";
                                 $dbqueryb1=odbc_exec($connect,$sql_insert1);
							if($dbqueryb1){
									echo "</br>"; echo "บันทึกข้อมูลเรียบร้อยแล้ว";echo "</br>";
	 echo "<meta http-equiv=\"refresh\"  content=\"0;url=Insert_Codeprecount_AddQty.php?location=$location&barcode=$article_mother\">";
									           }else{  echo "</br>";echo "ไม่สามารถบันทึกข้อมูลได้";echo "</br>";
	 echo "<meta http-equiv=\"refresh\"  content=\"5;url=Insert_Codeprecount.php?location=$location\">";
											            }
											}//====end  if กรณีทียังไม่มีการบันทึกรหัสสินค้าลงใน Location นี้
	        }//===== end forในการเรียกข้อมูลมาจาดตาราง Temp เพื่อเก็บข้อมูลลงตารางPrecount
  }//=========== end if กรณีมีรหัสสินค้าตัวลูก
	              
	  else if($a=='N'){ //========กรณีไม่มีรหัสสินค้าตัวลูก
	  $length = strlen($barcode);
						       $sql_pre ="select Count(*) AS totalpre FROM precount 
				                       where location = '$location' and branch_id = '$SESS_BRANCH' ";
							if($length>'9'){
						       $sql_pre.="and barcode like  '$barcode%'  ";
							}else{
						       $sql_pre.="and article like '$barcode%'";
							}
					$exec_pre  = odbc_exec($connect,$sql_pre) or die ("cannot execute query ");
	                $totalpre = odbc_result($exec_pre,"totalpre");
					 if($totalpre>=1) //==กรณีที่มีการบันทึกรหัสสินค้าลงใน Location นี้แล้ว
					      {  echo "</br>";echo "มีการบันทึกข้อมูลนี้ไปเรียบร้อยแล้ว  EA";
 echo "<meta http-equiv=\"refresh\"  content=\"2;url=Insert_Codeprecount_AddQty.php?location=$location&barcode=$article_mother\">";	
					         }else //====กรณีทียังไม่มีการบันทึกรหัสสินค้าลงใน Location นี้
					        { 
							   //===ค้นหาจำนวนล่าสุด เพื่อเรียก ตัวเรียงในใบ Precount
  $max_count="SELECT MAX(PRECOUNT_RUN) AS NUM FROM PRECOUNT 
                         WHERE BRANCH_ID= '$SESS_BRANCH' 
						 AND LOCATION = '$location' ";
    
	$max_com = odbc_exec($connect,$max_count) or die ("cannot execute count ");
	
	$count_num = odbc_result($max_com,"NUM");

	$item_id=$count_num +1;
	
$id = $FirstOfdescription;
$vowels = array("'"); 
$id2=str_replace($vowels, " ", "$id ");         
//$idff = eregi_replace(chr(34),'', $id);   
//$idff=eregi_replace(chr(39),'',$id);
//$id2 = eregi_replace(chr(34),'', $idff);  
              echo $FirstOfdescription;
                                     $sql_insert2 ="insert into PRECOUNT 
	                                                	     values ('$FirstOfbarcode','$article','$location','$id2'
		                                                      ,'$item_id','$SESS_BRANCH','$date_now','$FirstOfunit','','$article','$id2','')";
                                     $dbqueryb2=odbc_exec($connect,$sql_insert2);
									 if($dbqueryb2){
									     echo "</br>";
									    echo "บันทึกข้อมูลเรียบร้อยแล้ว EA";
										echo "</br>";
 echo "<meta http-equiv=\"refresh\"  content=\"3;url=Insert_Codeprecount_AddQty.php?location=$location&barcode=$article_mother\">";
									        }else{
											    echo "</br>";
											    echo "ไม่สามารถบันทึกข้อมูลได้";
 echo "<meta http-equiv=\"refresh\"  content=\"4;url=Insert_Codeprecount.php?location=$location\">";
												echo "</br>";
											            }
												}//==end if กรณีทียังไม่มีการบันทึกรหัสสินค้าลงใน Location นี้
	                          }//=========== end if กรณีไม่มีรหัสสินค้าตัวลูก
			}else if(($SESS_BRANCH==''  ) or  ($location =='')){
			echo"กรุณา LOGIN ใหม่อีกครั้ง";
			echo "<meta http-equiv=\"refresh\"  content=\"1;url=../Login.php\">";		
			}
  }
  //==================================================================
  //==================================================================
  //==================================================================
  //======================จบ กรณีมีการบันทึกข้อมูล
?>
      </td>
    </tr>

<?
  if(!isset($_POST['SaveRequestForm'])) {
?>
    <tr>
      <td colspan="3" class="style9">
         <span class="style9">&nbsp;+
  <?php
if($barcode<>''){
$length = strlen($barcode);
include ("../connect/connect.php");
//=====เริ่มดึงรหัส Article ตัวแม่ที่รับข้อมูลเข้ามา

    $sql_chk="SELECT  description , 
                      oldmaterial , barcode ,price,unit
                      FROM PRODUCT
                      WHERE PACK != 'FG' ";
	if($length>'9'){
    $sql_chk.="AND barcode Like '$barcode%' ";
	}else{
    $sql_chk.="AND ((material Like '$barcode%') OR (oldmaterial Like '$barcode%') 
	OR (oldmatuse Like '$barcode%'))  ";
	}
	   $exec_chk = odbc_exec($connect,$sql_chk) or die ("cannot execute query ");
       $FirstOfdescription = odbc_result($exec_chk,"description");
	   $article = odbc_result($exec_chk,"oldmaterial"); //รหัส Article ตัวแม่
	   $FirstOfbarcode = odbc_result($exec_chk,"barcode");
	   $FirstOfprice = odbc_result($exec_chk,"price");
	   $FirstOfunit = odbc_result($exec_chk,"unit");
	    echo "$FirstOfdescription";
		//echo "EA";
		echo "$article";
		
	?>
    <input name="article_mother" type="hidden" value="<? echo "$article";?>" />
    <input name="desc_mother" type="hidden" value="<? echo "$FirstOfdescription";?>" />
    <?
		$vowels = array("'"); 
        $FirstOfdescription=str_replace($vowels, " ", "$FirstOfdescription"); 
		?>
  <input name="location" type="hidden" value="<?=$location;?>" />
  <input name="barcode" type="hidden" value="<?=$barcode;?>" />
  <input name='FirstOfdescription' type='hidden' value='<? echo "$FirstOfdescription";?>' />
  <input name="article" type="hidden" value="<?=$article;?>" />
  <input name="FirstOfbarcode" type="hidden" value="<?=$FirstOfbarcode;?>" />
   <input name="FirstOfunit" type="hidden" value="<?=$FirstOfunit;?>" />
  <input name="FirstOfquantity" type="hidden" value="1" />
		
  <?   //================ตรวจสอบว่ามีรหัสสินค้าตัวลูกหรือไม่
					   $sql_chksub="SELECT Count(*) AS totalsub
                      FROM PRODUCT_SUB
                      WHERE ARTICLE ='$article' ";
	   $exec_chksub  = odbc_exec($connect,$sql_chksub) or die ("cannot execute query ");
	   $totalsub = odbc_result($exec_chksub,"totalsub");
	   
	       if($totalsub>=1) //==========กรณีมีรหัสสินค้าตัวลูก
	             { echo " (มีรหัสสินค้าตัวลูก)";  $a='Y';
				 //=====สร้างตาราง Temp เพื่อเก็บข้อมูลในการแสดง รหัสสินค้าทั้งหมด 
                       $temptable="#"."$SESS_BRANCH"."$location";
					   ?>
  <input name="temptable" type="hidden" value="<?=$temptable;?>" />
  <?
                       $sql_temp1="CREATE TABLE $temptable (
                                           barcode varchar(50) ,
                                           article varchar(50) ,
                                           description nvarchar(300) ,
                                           quantity varchar(50) ,
                                           price varchar(50))";
                       $dbquery_temp1=odbc_exec($connect,$sql_temp1)or die ("error sql_temp");
                  
				       $sqlsub= "SELECT PRODUCT_SUB.ARTICLE, PRODUCT_SUB.COMPONENT, 
					                   PRODUCT_SUB.COMPONENT_DESC, PRODUCT_SUB.QUANTITY, 
									   PRODUCT_SUB.MATERIAL_CAT, PRODUCT.barcode, PRODUCT.price
                                       FROM PRODUCT_SUB INNER JOIN PRODUCT 
									   ON PRODUCT_SUB.COMPONENT = PRODUCT.oldmaterial
                                       WHERE PRODUCT_SUB.ARTICLE='$article'
                                       ORDER BY PRODUCT_SUB.ARTICLE, PRODUCT_SUB.COMPONENT";
						  $execsub = odbc_exec($connect,$sqlsub) or die ("cannot execute querygv ");
                             while($row = odbc_fetch_array($execsub)) 
			                      {   
			 //===กรณีที่ รหัสสินค้าตัวลูก มี  material cat เป็นแบบ sale set  มีตัวลูกอีก
                                     if($row[MATERIAL_CAT] =='10') 
									{  
									 $sqlsub2= "SELECT PRODUCT_SUB.ARTICLE, PRODUCT_SUB.COMPONENT, 
					                   PRODUCT_SUB.COMPONENT_DESC, PRODUCT_SUB.QUANTITY, 
									   PRODUCT_SUB.MATERIAL_CAT, PRODUCT.barcode, PRODUCT.price
                                       FROM PRODUCT_SUB INNER JOIN PRODUCT 
									   ON PRODUCT_SUB.COMPONENT = PRODUCT.oldmaterial
                                       WHERE PRODUCT_SUB.ARTICLE='$row[COMPONENT]'
                                       ORDER BY PRODUCT_SUB.ARTICLE, PRODUCT_SUB.COMPONENT";
						              $execsub2 = odbc_exec($connect,$sqlsub2) or die ("cannot execute querygv ");
                             while($row2 = odbc_fetch_array($execsub2)) 
			                      {   $price=number_format($row2[price], 2, '.',',$row2[price]' );
$idd = $row2[COMPONENT_DESC];
$vowels = array("'"); 
$idd2=str_replace($vowels, " ", "$idd "); 
								   $add2 ="insert into $temptable 
										  values ('$row2[barcode]','$row2[COMPONENT]','$idd2',
										  '$row2[QUANTITY]','$price')";
                                          $dbqueryb_temp2=odbc_exec($connect,$add2)or die ("$sql_btemp");
								  }// end while $sqlsub2
								  } //====  end  if กรณีที่ รหัสสินค้าตัวลูก มี  material cat เป็นแบบ sale set
											 
								  //===กรณีที่ รหัสสินค้าตัวลูก มี  material cat เป็นแบบ single
									 else if(($row[MATERIAL_CAT] =='00')  ||  $row[MATERIAL_CAT] =='')
									 {   $price=number_format($row[price], 2, '.',',$row[price]' );
$iddd = $row[COMPONENT_DESC];
$vowels = array("'"); 
$iddd2=str_replace($vowels, " ", "$iddd "); 
										  $add ="insert into $temptable 
										  values ('$row[barcode]','$row[COMPONENT]','$iddd2',
										               '$row[QUANTITY]','$price')";
                                          $dbqueryb_temp1=odbc_exec($connect,$add)or die ("$sql_btemp");
										 
										} //====  end  if กรณีที่ รหัสสินค้าตัวลูก มี  material cat เป็นแบบ single
//ARTICLE, COMPONENT, COMPONENT_DESC, QUANTITY, MATERIAL_CAT
                                 
						  } //==== end while กรณีมีรหัสสินค้าตัวลูก
        ?>
  <?
		  $sql_show="SELECT  * FROM  $temptable  ";
	     $execshow = odbc_exec($connect,$sql_show) or die ("cannot execute sql_show ");
		?>
  <span class="style23"></span>
<table width="300" border="1" cellpadding="0" cellspacing="0">
  <tr class="style6">
    <td width="41" bgcolor="#7489A6" class="style35 style4"><div align="center"><strong>Article</strong></div></td>
      <td width="174" bgcolor="#7489A6" class="style35 style4"><div align="center"><strong>DESC.</strong></div></td>
      <td width="26" bgcolor="#7489A6" class="style35 style4"><div align="center"><strong>Qut.</strong></div></td>
      <td width="40" bgcolor="#7489A6" class="style35 style4"><div align="center"><strong>Price</strong></div></td>
    </tr>
  <? while($rower = odbc_fetch_array($execshow)) 
	   {   ?>	
  <tr class="style9">
    <td bgcolor="#FFFFFF" class="style39" ><? echo "$rower[article]";?></td>
      <td bgcolor="#FFFFFF" class="style5 style35" ><? echo "$rower[description]";?>&nbsp; </td>
      <td bgcolor="#FFFFFF" class="style39" ><? echo "$rower[quantity]";?></td>
      <td bgcolor="#FFFFFF" class="style39" ><? echo "$rower[price]";?></td>
    </tr>
  <? 
	   } //============= end while แสดงข้อมูล กรณีมีตัวลูก
?>
</table>
<span class="style23 style35">
<?
		  $sql_show22="SELECT  * FROM  $temptable  ";
	     $execshow22 = odbc_exec($connect,$sql_show22) or die ("cannot execute sql_show ");
 while($rower2 = odbc_fetch_array($execshow22)) 
	   {   ?>
<input name="articlearr[]" type="hidden" value="<?="$rower2[article]";?>"/>		
<input name='descriptionarr[]' type="hidden" value='<? echo"$rower2[description]";?>' />
<input name="quantityarr[]" type="hidden" value="<?="$rower2[quantity]";?>" />
<input name="pricearr[]" type="hidden" value="<?="$rower2[price]";?>" />
<input name="barcodearr[]" type="hidden" value="<?="$rower2[barcode]";?>" />
 <? 
	   } //============= end while แสดงข้อมูล กรณีมีตัวลูก
?>

 <?
	 }else { //echo "ไม่มีรหัสสินค้าตัวลูก";
		   $a='N';
                                 ?>    
&nbsp;  </span>
<table width="250" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
    <tr>
      <td width="53" bgcolor="#7C90AB" class="style6"><strong>Barcode</strong></td>
      <td width="191" bgcolor="#FFFFFF" class="style9"><? echo "$FirstOfbarcode";?></td>
    </tr>
    <tr>
      <td bgcolor="#7C90AB" class="style6"><strong>Article</strong></td>
      <td bgcolor="#FFFFFF" class="style9"><? echo "$article";?></td>
    </tr>
    <tr>
      <td bgcolor="#7C90AB" class="style6"><strong>Desc.</strong></td>
      <td bgcolor="#FFFFFF" class="style9" ><? echo "$FirstOfdescription";?>&nbsp;&nbsp; </td>
    </tr>
	    <tr>
      <td bgcolor="#7C90AB" class="style6"><strong>Unit.</strong></td>
      <td bgcolor="#FFFFFF" class="style9" ><? echo "$FirstOfunit";?>&nbsp;&nbsp; </td>
    </tr>
    <tr>
      <td bgcolor="#7C90AB" class="style6"><strong>Price</strong></td>
      <td bgcolor="#FFFFFF" class="style9"><? echo "$FirstOfprice";?></td>
    </tr>
  </table>
<span class="style23">
   <?
							}	//end else if //===========กรณีที่ไม่มีรหัสสินค้าตัวลูก
	   
	
  }// ==== end if  $barcode <>''
?>
                                <input name="a" type="hidden" value="<?=$a;?>" />
  &nbsp;</span>
</form>
<?
}//========end  if(!isset($_POST['SaveRequestForm'])) {
?>
      </td>
    </tr>
    <tr>
      <td colspan="3">
     </td>
    </tr>
    <tr>
      <td align="center"><a href="Create_Precount.php"><img src="../style/menu4.gif" alt="" width="120" height="26" border="0" /></a></td>
      <td colspan="2" align="center"><a href="Insert_Codeprecount.php?location=<?=$location;?>"><img src="../style/menu3.gif" alt="" width="120" height="26" border="0" /></a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>

<map name="Map" id="Map">
  <area shape="rect" coords="262,8,301,29" href="MIndex.php" />
</map>
</div>
</body>
</html>