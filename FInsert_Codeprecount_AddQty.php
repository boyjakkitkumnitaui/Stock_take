<? session_start();
// header ('Content-Type: text/html; charset=windows-874');
include("chksess_b.php");
include("../connect/connect.php");
$sess_devicename = $_SESSION[sess_devicename];
?>
<script type="text/javascript">
	function onKeyDown() {
		var keycode;
		if (window.event) keycode = window.event.keyCode;
		if (keycode == 13) {
			window.event.keyCode = 9;
		}

		if (keycode == 9) {
			//  window.event.keyCode = 13; 
			document.formA.submit();
		}

		return true;
	}
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

<script>
	/*function handleEnter(event){
var e=window.event?window.event:event;
var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;

 if (keycode == 9) {      
  window.event.keyCode = 13; 
  this.form.submit();
    }  
  return true;}


window.onload=function(){
var a=document.formA;
for(var i=0;i<a.elements.length;i++){
var e=a.elements[i];
e.onkeypress=handleEnter;
}
}*/
</script>
<script language="JavaScript">
	function check_re() {
		if (document.formA.qty0.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty0.focus();
			return false;
		}
		if (document.formA.qty1.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty1.focus();
			return false;
		}
		if (document.formA.qty2.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty2.focus();
			return false;
		}



		if (document.formA.qty3.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty3.focus();
			return false;
		}
		if (document.formA.qty4.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty4.focus();
			return false;
		}
		if (document.formA.qty5.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty5.focus();
			return false;
		}
		if (document.formA.qty6.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty6.focus();
			return false;
		}
		if (document.formA.qty7.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty7.focus();
			return false;
		}
		if (document.formA.qty8.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty8.focus();
			return false;
		}
		if (document.formA.qty9.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty9.focus();
			return false;
		}
		if (document.formA.qty10.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty10.focus();
			return false;
		}
		if (document.formA.qty11.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty11.focus();
			return false;
		}
		if (document.formA.qty12.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty12.focus();
			return false;
		}
		if (document.formA.qty13.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty13.focus();
			return false;
		}
		if (document.formA.qty14.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty14.focus();
			return false;
		}
		if (document.formA.qty15.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty15.focus();
			return false;
		}
		if (document.formA.qty16.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty16.focus();
			return false;
		}
		if (document.formA.qty17.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty17.focus();
			return false;
		}
		if (document.formA.qty18.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty18.focus();
			return false;
		}
		if (document.formA.qty19.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty19.focus();
			return false;
		}
		if (document.formA.qty20.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty20.focus();
			return false;
		}
		if (document.formA.qty21.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty21.focus();
			return false;
		}
		if (document.formA.qty22.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty22.focus();
			return false;
		}
		if (document.formA.qty23.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty23.focus();
			return false;
		}
		if (document.formA.qty24.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty24.focus();
			return false;
		}
		if (document.formA.qty25.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty25.focus();
			return false;
		}
		if (document.formA.qty26.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty26.focus();
			return false;
		}
		if (document.formA.qty27.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty27.focus();
			return false;
		}
		if (document.formA.qty28.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty28.focus();
			return false;
		}
		if (document.formA.qty29.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty29.focus();
			return false;
		}
		if (document.formA.qty30.value.length < 1) {
			alert('Please enter at least one major (กรุณาใส่ข้อมูลอย่างน้อย 1 หลัก)');
			document.formA.qty30.focus();
			return false;
		}

		document.formA.submit();
	}

	function check_formB() {
		if (document.formB.SaveRequestForm.value == '') {
			return false;
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

		.style6 {
			font-size: 18px;
			font-weight: bold;
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

		.pstyles {
			font-size: 16px;
			font-weight: bold;
		}

		.pstylelo {
			font-size: 16px;
			/* font-weight: bold; */
		}

		.pstylebutton {
			text-align: center;
		}

		.pstyle7 {
			font-size: 16px;
			word-wrap: break-word;
			width: 65px;
		}
	</style>
</head>

<body onLoad="document.formA.qty0.focus();">
	<p></p>
	<div class="container">
		<?
		if ($SaveRequestForm2 != '') {
			$SaveRequestFormRa = "";
		}
		?>
		<div class="from-group">
			<p class="pstyle">Location No :
				<?
				$location = strtoupper($location);
				echo "$location"; ?></p>
		</div>
		<div class="form-group>">
			<p class="pstyle"><? echo "STOCK TAKE สาขา  (" . "$SESS_BRANCH" . ")"; ?></p>
		</div>
		<form name="formA" method="post" action="FInsert_Codeprecount_AddQty.php">
			<table class="table">
				<!--<form name="formB" onSubmit="return check_formB();">
		<tr>
      <td colspan="4" align="left">
			<input type="submit" name="SaveRequestForm" value="เธชเนÿเธÿเธขเธญเธ”เธÿเธฒเธฃเธÿเธฑเธÿเธชเธ•เนÿเธญเธÿ" class="btcount">
			<input type="hidden" name="uplocation" value="<?= $location ?>" />
			</td>
		</tr>		
	</form>	-->


				<?
				//=================กรณีมีการบันทึกข้อมูล
				if (isset($SaveRequestFormii)) {

					include("../connect/connect.php");

					//ตรวจสอบว่าเคยมีการบันทึกข้อมูลในตาราง Upstock แล้วหรือไม่		
					$sql_ck = "SELECT  totalck FROM UPSTOCK_TOTALCHK 
             WHERE   LOCATION ='$location'
			 AND  BRANCH_ID ='$SESS_BRANCH'  ";
					$exec_ck  = odbc_exec($connect, $sql_ck) or die("cannot execute query ");
					$totalck = odbc_result($exec_ck, "totalck");

					if ($totalck > 0) {
						$chk_lo = 'U'; //เคยมีการบันทึกแล้ว
					} else {
						$chk_lo = '';
					}
					//	echo "$location";

					if ($location != '') {
						$date_now = date("m/d/Y H:i:s");

						$b = '-1';
						//echo "$num";
						$num = $num + 1;

						for ($i = 1; $i <= $num; $i++) {
							$chk_ar = "SELECT count(*) as totalar FROM UPSTOCK 
             WHERE  ARTICLE = '$ARTICLE[$i]'
			 AND  LOCATION ='$location'
			 AND  BRANCH_ID ='$SESS_BRANCH'  ";
							$exec_chkar  = odbc_exec($connect, $chk_ar) or die("cannot execute query ");
							$totalar = odbc_result($exec_chkar, "totalar");


							$b++;
							$qty = "qty" . "$b";

							if ($totalar == 0) {
								$add = "insert into UPSTOCK values ('$BARCODE[$i]','$ARTICLE[$i]','$QUANTITY[$i]','${$qty}','$location','$date_now','$SESS_BRANCH','$sess_devicename')";
								//echo $add;
								odbc_exec($connect, $add) or die("<br>Query failed in insert data");

								$addck = "INSERT INTO UPSTOCK_LOG
 VALUES ('$BARCODE[$i]' ,'$ARTICLE[$i]' ,'$QUANTITY[$i]','${$qty}' ,'999.99' ,'$chk_lo','$location'
,'$date_now','','$date_now' ,'$SESS_BRANCH','$sess_devicename')";
								odbc_exec($connect, $addck) or die("<br>Query failed in insert data02");
							} else {
								//	$QTY_UP=0;
								//	$QTY_UP = $qty[$i] + $qtyB[$i];

								$query_edit = "UPDATE UPSTOCK SET QTY= QTY+${$qty}  ,DATEUP ='$date_now',DEVICE_NAME='$sess_devicename'
                WHERE ARTICLE = '$ARTICLE[$i]'
			    AND  LOCATION ='$location'
			    AND  BRANCH_ID ='$SESS_BRANCH' ";
								odbc_exec($connect, $query_edit) or die("Query failed in update data");

								$query_editck = "	UPDATE  UPSTOCK_LOG
SET QTY2 = QTY2+${$qty} ,DATEUP02 = '$date_now',DEVICE_NAME='$sess_devicename'
WHERE BARCODE ='$BARCODE[$i]'
AND ARTICLE = '$ARTICLE[$i]'
AND  LOCATION ='$location'
AND  BRANCH_ID ='$SESS_BRANCH' ";
								odbc_exec($connect, $query_editck) or die("Query failed in update data02");
							}
							if ($i == $num) {
								echo "OK";
								//   echo "<meta http-equiv=\"refresh\"  content=\"1;url=Insert_Codeprecount.php?location=$location\">";
							}
						}
					}
				} //====end if location
				//==================================================================
				//==================================================================
				//==================================================================
				//======================จบ กรณีมีการบันทึกข้อมูล
				?>

				<?
				/// AAAA#############กรณีทำรายการครั้งแรกเท่านั้น  แสดงผล DISPLAY
				if ((!isset($SaveRequestForm)) and (!isset($SaveRequestForm2)) and ($SaveRequestForm3 == '')  and ($SaveRequestFormRa == '') and ($SKC == '')) {



					if (!empty($SESS_ART)) {
						$arr_art = $SESS_ART;
						unset($SESS_ART);
					}
					// echo "AAA";
					//print_r('<br>>>>'.$arr_art);

					//STEP1----ดึงค่า Article ตำแหน่งแรก
					$barcode = array_shift($arr_art);
					$SESS_ART2 = $arr_art;
					session_register("SESS_ART2");
				} //END   /// AAAA#############กรณีทำรายการครั้งแรกเท่านั้น


				/// BBBB#############กรณีคลิกบันทึกข้อมูลแบบปกติ  SAVE
				if (((isset($SaveRequestForm))   or ($SaveRequestFormRa != ''))  and (!isset($SaveRequestForm3))) {


					include("../connect/connect.php");

					//ตรวจสอบว่าเคยมีการบันทึกข้อมูลในตาราง Upstock แล้วหรือไม่		
					$sql_ck = "SELECT  totalck FROM UPSTOCK_TOTALCHK 
             WHERE   LOCATION ='$location'
			 AND  BRANCH_ID ='$SESS_BRANCH'  ";
					$exec_ck  = odbc_exec($connect, $sql_ck) or die("cannot execute query ");
					$totalck = odbc_result($exec_ck, "totalck");

					if ($totalck > 0) {
						$chk_lo = 'U'; //เคยมีการบันทึกแล้ว
					} else {
						$chk_lo = '';
					}
					//	echo "$location";

					if ($location != '') {
						$date_now = date("m/d/Y H:i:s");


						$b = '-1';
						$num = $num + 1;

						for ($i = 1; $i <= $num; $i++) {
							$chk_ar = "SELECT count(*) as totalar FROM UPSTOCK 
             WHERE  ARTICLE = '$ARTICLE[$i]'
			 AND  LOCATION ='$location'
			 AND  BRANCH_ID ='$SESS_BRANCH'  ";
							$exec_chkar  = odbc_exec($connect, $chk_ar) or die("cannot execute query ");
							$totalar = odbc_result($exec_chkar, "totalar");

							$b++;
							$qty = "qty" . "$b";

							if ($totalar == 0) {
								$add = "insert into UPSTOCK values ('$BARCODE[$i]','$ARTICLE[$i]','$QUANTITY[$i]','${$qty}','$location','$date_now','$SESS_BRANCH','$sess_devicename')";
								//echo $add;
								if (trim(${$qty}) != '') {
									odbc_exec($connect, $add) or die("<br>Query failed in insert data");
								}
								$addck = "INSERT INTO UPSTOCK_LOG
 VALUES ('$BARCODE[$i]' ,'$ARTICLE[$i]' ,'$QUANTITY[$i]','${$qty}' ,'999.99' ,'$chk_lo','$location'
,'$date_now','','$date_now' ,'$SESS_BRANCH','$sess_devicename')";
								if (trim(${$qty}) != '') {
									odbc_exec($connect, $addck) or die("<br>Query failed in insert data02");
								}
							} else {
								//$QTY_UP=0;
								//$QTY_UP = $qty[$i] + $qtyB[$i];

								$query_edit = "UPDATE UPSTOCK SET QTY=QTY+${$qty}  ,DATEUP ='$date_now',DEVICE_NAME='$sess_devicename'
                WHERE ARTICLE = '$ARTICLE[$i]'
			    AND  LOCATION ='$location'
			    AND  BRANCH_ID ='$SESS_BRANCH' ";
								if (trim(${$qty}) != '') {
									odbc_exec($connect, $query_edit) or die("Query failed in update data");
								}

								$query_editck = "	UPDATE  UPSTOCK_LOG
SET QTY2 = QTY2+${$qty} ,DATEUP02 = '$date_now',DEVICE_NAME='$sess_devicename'
WHERE BARCODE ='$BARCODE[$i]'
AND ARTICLE = '$ARTICLE[$i]'
AND  LOCATION ='$location'
AND  BRANCH_ID ='$SESS_BRANCH' ";
								if (trim(${$qty}) != '') {
									odbc_exec($connect, $query_editck) or die("Query failed in update data02");
								}
							}
							//  if ($i==$num) {
							//echo "OK";
							//   echo "<meta http-equiv=\"refresh\"  content=\"1;url=Insert_Codeprecount.php?location=$location\">";
							//  }
						}
					}




					unset($barcode);
					//STEP1----ดึงค่า Article ตำแหน่งแรก

					$barcode = array_shift($SESS_ART2);
					$arr_art = $SESS_ART2;


					//		echo "BBBB";   
					//print_r($arr_art);
					$SESS_ART2 = $arr_art;
					session_register("SESS_ART2");
				} //END   /// BBBB#############กรณีคลิกบันทึกข้อมูลแบบปกติ 
				?>

				<?
				/// CCCC#############กรณีที่ REDIRECT มาจากหน้า FInsert_CodeprecountArticle ก่อน กด บันทึกข้อมูลเพื่อแสดง ผล  แสดงผล DISPLAY
				// if((!isset($SaveRequestForm)) and (isset($SaveRequestForm3))) {
				if ((((!isset($SaveRequestForm))  and ($SaveRequestFormRa == ''))  and (isset($SaveRequestForm3)))  or ($SKC != '')) {
					?>
					<input name="SaveRequestForm3" type="hidden" value="<?= $SaveRequestForm3; ?>" />
					<input name="barcode" type="hidden" value="<?= $barcode; ?>" />
				<?
					//echo "CCCC";

					$SESS_ART2 = $SESS_ART2;
					session_register("SESS_ART2");
					//echo "CCCC";   print_r($SESS_ART2);
					//================แสดงข้อมูลใบ Precount
				} // END  /// CCCC#############กรณีที่ REDIRECT มาจากหน้า FInsert_CodeprecountArticle ก่อน กด บันทึกข้อมูลเพื่อแสดง ผล
				?>

				<?
				// DDDD#############กรณีที่ REDIRECT มาจากหน้า FInsert_CodeprecountArticle และ กด บันทึกข้อมูล
				// if((isset($SaveRequestForm)) and (isset($SaveRequestForm3))) {	 
				if (((isset($SaveRequestForm))   or ($SaveRequestFormRa != ''))  and (isset($SaveRequestForm3))) {

					//include("../connect/connect.php");

					//ตรวจสอบว่าเคยมีการบันทึกข้อมูลในตาราง Upstock แล้วหรือไม่		
					$sql_ck = "SELECT  totalck FROM UPSTOCK_TOTALCHK 
             WHERE   LOCATION ='$location'
			 AND  BRANCH_ID ='$SESS_BRANCH'  ";
					$exec_ck  = odbc_exec($connect, $sql_ck) or die("cannot execute query ");
					$totalck = odbc_result($exec_ck, "totalck");

					if ($totalck > 0) {
						$chk_lo = 'U'; //เคยมีการบันทึกแล้ว
					} else {
						$chk_lo = '';
					}
					//	echo "$location";

					if ($location != '') {
						$date_now = date("m/d/Y H:i:s");

						$b = '-1';
						$num = $num + 1;

						for ($i = 1; $i <= $num; $i++) {
							$chk_ar = "SELECT count(*) as totalar FROM UPSTOCK 
             WHERE  ARTICLE = '$ARTICLE[$i]'
			 AND  LOCATION ='$location'
			 AND  BRANCH_ID ='$SESS_BRANCH'  ";
							$exec_chkar  = odbc_exec($connect, $chk_ar) or die("cannot execute query ");
							$totalar = odbc_result($exec_chkar, "totalar");


							$b++;
							$qty = "qty" . "$b";

							if ($totalar == 0) {
								$add = "insert into UPSTOCK values ('$BARCODE[$i]','$ARTICLE[$i]','$QUANTITY[$i]','${$qty}','$location','$date_now','$SESS_BRANCH','$sess_devicename')";
								//echo $add;
								if (trim(${$qty}) != '') {
									odbc_exec($connect, $add) or die("<br>Query failed in insert data");
								}

								$addck = "INSERT INTO UPSTOCK_LOG
 VALUES ('$BARCODE[$i]' ,'$ARTICLE[$i]' ,'$QUANTITY[$i]','${$qty}' ,'999.99' ,'$chk_lo','$location'
,'$date_now','','$date_now' ,'$SESS_BRANCH','$sess_devicename')";
								if (trim(${$qty}) != '') {
									odbc_exec($connect, $addck) or die("<br>Query failed in insert data02");
								}
							} else {
								//$QTY_UP=0;
								//$QTY_UP = $qty[$i] + $qtyB[$i];

								$query_edit = "UPDATE UPSTOCK SET QTY= QTY+${$qty} ,DATEUP ='$date_now',DEVICE_NAME='$sess_devicename'
                WHERE ARTICLE = '$ARTICLE[$i]'
			    AND  LOCATION ='$location'
			    AND  BRANCH_ID ='$SESS_BRANCH' ";
								if (trim(${$qty}) != '') {
									odbc_exec($connect, $query_edit) or die("Query failed in update data");
								}

								$query_editck = "	UPDATE  UPSTOCK_LOG
SET QTY2 =QTY2+${$qty} ,DATEUP02 = '$date_now',DEVICE_NAME='$sess_devicename'
WHERE BARCODE ='$BARCODE[$i]'
AND ARTICLE = '$ARTICLE[$i]'
AND  LOCATION ='$location'
AND  BRANCH_ID ='$SESS_BRANCH' ";
								if (trim(${$qty}) != '') {
									odbc_exec($connect, $query_editck) or die("Query failed in update data02");
								}
							}
							// if ($i==$num) {
							//echo "OK";
							//  echo "<meta http-equiv=\"refresh\"  content=\"1;url=Insert_Codeprecount.php?location=$location\">";
							// }
						}
					}

					// echo "$barcode";

					$difArt = array($barcode);
					//$difArt=array("120012540");
					$SESS_ART2 = array_diff($SESS_ART2, $difArt); //คำสั่งหลักๆก็คือ array_diff นี่แหละคับ

					$SESS_ART2 = $SESS_ART2;
					session_register("SESS_ART2");

					$barcode = array_shift($SESS_ART2);
					$SESS_ART2 = $SESS_ART2;

					//		echo "DDDD"; 		print_r($SESS_ART2);//แสดง member ใน array ที่ Diff แล้ว
					//echo "</br>";
				} //// END  DDDD#############กรณีที่ REDIRECT มาจากหน้า FInsert_CodeprecountArticle และ กด บันทึกข้อมูล
				?>
				<!--<input type ="hidden" name="arr_art2"  value="<? print_r($arr_art); ?>">-->

				<? $resultArt = count($SESS_ART2);
				//echo "$resultArt";
				//	if($resultArt!=0){
				?>

				<?

				//     echo "</br>"."CCCC";   print_r($arr_art);

				$sql_show = "SELECT PRECOUNT.BARCODE, PRECOUNT.ARTICLE
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

				$exec_show = odbc_exec($connect, $sql_show) or die("cannot execute queryshow ");
				?>

				<input name="barcode" type="hidden" value="<? echo "$barcode"; ?>" />
				<input name="location" type="hidden" value="<? echo "$location"; ?>" />
				<tr>
					<td bgcolor="#7489A6" class="pstyles">Article</td>
					<td bgcolor="#7489A6" class="pstyles">DESC.</strong></td>
					<td bgcolor="#7489A6" class="pstyles">Qty.</strong></td>
					<td bgcolor="#7489A6" class="pstyles">+/-Qty .</td>
				</tr>
				<?
				$i = 0;
				$p = 1;
				$u = '-1';
				while ($rower = odbc_fetch_array($exec_show)) {
					$p++;
					?>
					<input type="hidden" name="num" value="<? echo $i; ?>" />
					<?
						if (($rower[ARTICLE] != $rower[AR_MOTHER]) and ($chk_ar != $rower[AR_MOTHER])) {
							?>
						<!-- <tr>
    <td><p class="pstylelo">+<? echo "$rower[AR_MOTHER]"; ?></p></td>
    <td><p class="pstylelo"><? echo $rower[DESC_MOTHER]; ?></p></td>
  </tr> -->
					<? } ?>
					<tr class="table-light">
						<td>
							<p class="pstylelo"><?
													$i++;
													echo "$rower[ARTICLE]"; ?>
								<input type="hidden" name="<? echo "ARTICLE[$i]"; ?>" value="<? echo $rower[ARTICLE]; ?>" />
								<input type="hidden" name="<? echo "BARCODE[$i]"; ?>" value="<? echo "$rower[BARCODE]"; ?>" />
							</p>
						</td>
						<td>
							<p class="pstyle7">
								<?
									echo $rower[DESCRIPTION]; ?>
								<input type="hidden" name="<? echo "DESCRIPTION[$i]"; ?>" value="<? echo $rower[DESCRIPTION]; ?>" />
								<input type="hidden" name="<? echo "QUANTITY[$i]"; ?>" value="<? echo "$rower[QUANTITY]"; ?>" />
							</p>
						</td>

						<div class="form-group">
							<td>
								<p class="pstylelo">
									<?
										//echo "$rower[QTY]";


										if ($rower[QTY] != '') {
											$qqty = number_format($rower[QTY], 0, '.', ',$rower[QTY]');
										}

										?>
									<? echo "$rower[QTY]"; ?>+
									<!--  <input name="<? // echo "qty[$i]";
															?>" type="text"  id="<? // echo "qty[$i]";
																									?>" style="font-size:12px" onKeyDown="onKeyDown();" value="<? // echo "$rower[QTY]";
																																													?>" size="1" maxlength="2"  readonly="readonly" />-->
								</p>
							</td>
						</div>
						<td>
							<p class="pstylelo">
								<SCRIPT language="JavaScript">
									function ver(input, key) { // keyCode คือจับค่าของรหัส keyboard

										if ((key.keyCode == 13) && (input.value.length < 1)) {
											if (confirm('do you watn to set input field =0')) {
												input.value = 0;
												return false;
											} else {
												input.focus();

											}
										}
									}
								</SCRIPT>


								<?
									//echo "$rower[QTY]";

									$u++;
									if ($rower[QTY] != '') {
										$qqty = number_format($rower[QTY], 0, '.', ',$rower[QTY]');
									}
									?>
								<? $bar = "qty" . "$u"; ?>

								<input name="<? echo "$bar"; ?>" type="text" size="1" maxlength="5" onKeyDown=" ver(this,event);" autocomplete="off">
							</p>
						</td>
					</tr>
				<?
					$chk_ar = $rower[AR_MOTHER];
				} //============= end while แสดงข้อมูล กรณีมีตัวลูก
				?>

				<!-- <tr>
      <td><span class="pstylelo">
      <input name="SaveRequestFormZ" type="radio" value="radiobutton"  checked="checked" onFocus="return check_re();"  style="width:2;background:url(img/BG.jpg) "/>
      <input type="hidden" name="hiddenField" id="hiddenField" />
       <input name="SaveRequestFormRa" type="radio" value="radiobutton"  checked="checked" onFocus="document.formA.submit()"  style="width:2;background:url(img/BG.jpg) "/>
      </span></td>
      <td ><span class="pstylelo">
        
      </span></td>
    </tr> -->
				<?
				if (isset($SaveRequestForm2)) {

					$SESS_ART2 = $SESS_ART2;
					session_register("SESS_ART2");

					array_unshift($SESS_ART2, $barcode);
					// print_r($SESS_ART2); //แสดง member ใน array ที่ คืนค่า แล้ว
					// echo "</br>";
					echo "<meta http-equiv=\"refresh\"  content=\"0;url=FInsert_Codeprecount.php?location=$location\">";
				}
				?>
			</table>
			<p class="pstylebutton"><button class="btn btn-primary btn-lg btn-block style6" type="submit" name="SaveRequestForm" id="Submit">บันทึกข้อมูล <p class="glyphicon glyphicon-floppy-save"></p></button></p>
			<p class="pstylebutton"><button class="btn btn-info btn-lg btn-block style6" type="submit" name="SaveRequestForm2" id="Submit">ระบุรหัส Article <p class="glyphicon glyphicon-pencil"></p></button></p>


		</form>


		<?

		if ($resultArt != 0) { } //	if($resultArt!=0){
		else {
			?>
			<a href="FCreate_Precount.php" class="btn btn-info btn-lg btn-block style6" role="button" aria-pressed="true">เปลี่ยนตำแหน่ง <p class="glyphicon glyphicon-search"></p></a>
			<a href="?uplocation=<?= $location; ?>" class="btn btn-success btn-lg btn-block style6" role="button" aria-pressed="true">บันทึกการนับสต๊อก <p class="glyphicon glyphicon-saved"></p></a>
		<?
		}
		?>
		<a href="MIndex.php" class="btn btn-warning  btn-lg btn-block style6" role="button" aria-pressed="true">Home <p class="glyphicon glyphicon-home"></p></a>
	</div>
	<p></p><? //เพิ่มระยะห่างขอบด้านล่าง
			?>
</body>

</html>
<?
if ($uplocation != '') {
	$query_edit = "UPDATE [LOCATION] SET FLAG_COMPLETE = 1
	WHERE LOCATION ='$uplocation' and BRANCH_ID ='$SESS_BRANCH' ";

	$odbc_exc = odbc_exec($connect, $query_edit); // or die("Query failed in update data");		
	//echo  $query_edit;die();	

	$query_zero = "select a.ARTICLE,a.BARCODE,a.QUANTITY
		from PRECOUNT a left join UPSTOCK b on a.LOCATION=b.LOCATION and a.ARTICLE=b.ARTICLE and a.BRANCH_ID=b.BRANCH_ID
		where a.BRANCH_ID='$SESS_BRANCH' and a.LOCATION='$uplocation' and b.ARTICLE is null";
	$exec_zero = odbc_exec($connect, $query_zero);

	while ($rs_zero = odbc_fetch_array($exec_zero)) {
		$query_add_stock .= "Insert into UPSTOCK values ('" . $rs_zero[BARCODE] . "','" . $rs_zero[ARTICLE] . "','" . $rs_zero[QUANTITY] . "','0','$uplocation',getdate(),'$SESS_BRANCH','$sess_devicename');";
	}

	if ($query_add_stock != '') {
		$exec_add_stock = odbc_exec($connect, $query_add_stock);
	} else {
		$exec_add_stock = true;
	}

	if ($odbc_exc && $exec_add_stock) {
		?>
		<script>
			alert("บันทึกการนับสต๊อกสำเร็จ")
		</script>
	<?
			echo "<meta http-equiv=\"refresh\"  content=\"0;url=FCreate_Precount.php\">";
		} else {
			?>
		<script>
			alert("บันทึกล้มเหลว !!!")
		</script>
<?

	}
}
?>