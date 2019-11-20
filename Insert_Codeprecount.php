<?
session_start();
// header ('Content-Type: text/html; charset=windows-874');
include("chksess_b.php");
include("../connect/connect.php");
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
			var i;
			for (i = 0; i < this.form.elements.length; i++)
				if (this == this.form.elements[i])
					break;
			if (this.type == 'textarea' && e.shiftKey)
				return true;
			else if (this.type == 'radio')
				this.form.elements[i + this.form.elements[this.name].length].focus();
			else
				this.form.elements[i + 1].focus();
			return false;
		} else
			return true;
	}

	window.onload = function() {
		var a = document.formA;
		for (var i = 0; i < a.elements.length; i++) {
			var e = a.elements[i];
			e.onkeypress = handleEnter;
		}
	}
</script>
<script language="JavaScript">
	function check_re() {
		if ((document.formA.barcode.value.length != 9) && (document.formA.barcode.value.length != 13) && (document.formA.barcode.value.length != 14)) {
			alert("กรุณากรอก Barcode ให้ถูกต้อง");
			formA.barcode.focus();
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

		.pstyle {
			font-size: 20px;
			font-weight: bold;
			text-align: center;
		}

		.pstylelo {
			font-size: 20px;
			font-weight: bold;
		}

		.pstylebutton {
			text-align: center;
		}
	</style>
</head>

<body onLoad="document.formA.barcode.focus()" ;>
	<p>&nbsp;</p>
	<div class="container">

		<!--<form name="formB" onSubmit="return check_formB();">
		<tr>
      <td colspan="4" align="left">
			<input type="submit" name="SaveRequestForm" value="ส่งยอดการนับสต๊อค" class="btcount">
			<input type="hidden" name="uplocation" value="<?= $location ?>" />
			</td>
		</tr>		
	</form>	-->

		<form name="formA" onSubmit="return check_re();">
			<div class="form-group">
				<p class="pstylehead"></p>
			</div>
			<div class="form-group">
				<p class="pstyle"> &nbsp; Location No :
					<?
					$location = strtoupper($location);
					echo "$location"; ?>
				</p>
			</div>
			<div class="form-group">
				<p class="pstyle"><? echo "STOCK TAKE สาขา (" . "$SESS_BRANCH" . ")"; ?></p>
			</div>
			<div class="form-group">
				<p class="pstylelo">Barcode/Article:</p>
				<input class="form-control" name="barcode" type="text" class='last' id="barcode" style="font-size:18px" value="<?= $barcode; ?>" size="18" maxlength="13" />
				<input type="hidden" name="location" value="<?= $location ?>" />
			</div>


			<?php
			$barcode = $_GET["barcode"];
			$length = strlen($barcode);
			if ($barcode <> '') {
				//include ("../connect/connect.php");
				//=====ตรวจสอบว่ามี รหัสสินค้าอยู่ในตาราง Product หรือไม่
				$sql_chk1 = "SELECT Count(*) AS total1 
                      FROM PRODUCT
                      WHERE ((material <>'' ) 
					  OR (oldmaterial <>'')) ";
				if ($length > '9') {
					$sql_chk1 .= "AND ((barcode = '$barcode')) ";
				} else {
					$sql_chk1 .= "AND ((material = '$barcode')  OR (oldmaterial = '$barcode') 
	                    OR (oldmatuse = '$barcode'))";
				}
				//	$sql_chk1 = iconv("UTF-8","TIS-620",$sql_chk1); 
				$exec_chk1  = odbc_exec($connect, $sql_chk1) or die("cannot execute query ");

				$total1 = odbc_result($exec_chk1, "total1");
				//====
				if ($total1 >= 1) //=====กรณีพบข้อมูลรหัสสินค้าในตาราง Product ตรวจสอบว่ามีอยู่ใน Precount แล้วหรือไม่
				{   //echo '<script language="javascript">';
					// 	 echo 'alert("พบข้อมูล")';
					// 	 echo '</script>';
					$sql_pre = "select Count(*) AS totalpre FROM precount 
				                       where  location = '$location' and branch_id = '$SESS_BRANCH' ";
					if ($length > '9') {
						$sql_pre .= "and  barcode = '$barcode' ";
					} else {
						$sql_pre .= "and article ='$barcode' ";
					}
					//			$sql_pre = iconv("UTF-8","TIS-620",$sql_pre); 
					$exec_pre  = odbc_exec($connect, $sql_pre) or die("cannot execute query ");

					$totalpre = odbc_result($exec_pre, "totalpre");
					if ($totalpre >= 1) //==กรณีที่มีการบันทึกรหัสสินค้าลงใน Location นี้แล้ว
					{   //echo '<script language="javascript">';
						//echo 'alert("มีการบันทึกข้อมูลรหัสสินค้านี้แล้ว")';
						//echo '</script>';
						echo "<meta http-equiv=\"refresh\"  content=\"0;url=Insert_Codeprecount_AddQty.php?location=$location&barcode=$barcode\">";
					} else //====กรณีทียังไม่มีการบันทึกรหัสสินค้าลงใน Location นี้

					{
						echo "<meta http-equiv=\"refresh\"  content=\"0;url=Insert_CodeprecountArticle.php?location=$location&barcode=$barcode\">";
					}	//===end  กรณีทียังไม่มีการบันทึกรหัสสินค้าลงใน Location นี้
				} else {
					echo '<script language="javascript">';
					echo 'alert("ไม่พบข้อมูล")';
					echo '</script>';
				}
			}
			?>


			<!-- <tr>
      <td colspan="4">

      </td>
    </tr> -->
			<!-- <tr>
      <td colspan="4"><input type="image" name="Submit" id="Submit" src="img/Search.jpg"  value="submit"/></td>
    </tr>
    <tr>
      <td colspan="4" align="center"> -->
			<!--<a href="Create_Precount.php"><img src="../style/menu4.gif" alt="" width="120" height="26" border="0" /></a>-->
			<!-- <a href="?uplocation=<?= $location; ?>"><img src="../style/btn_sent_stock.gif" alt="" width="120" height="26" border="0" /></a>
        <a href="Insert_Codeprecount.php?location=<?= $location; ?>"><img src="../style/menu3.gif" alt="" width="120" height="26" border="0" /></a></td>
    </tr> -->
			<!-- <tr>
      <td colspan="4" align="center"><img src="../style/menu7.jpg" alt="" width="120" height="26" border="0" /></td>
	</tr> -->
			<p class="pstylebutton"><button class="btn btn-primary btn-lg btn-block style6" type="submit" name="Submit" id="Submit">Enter <p class="glyphicon glyphicon-ok"></p></button></p>
			<a href="Insert_Codeprecount.php?location=<?= $location; ?>" class="btn btn-info  btn-lg btn-block style6" role="button" aria-pressed="true">อ่านรหัสใหม่ <p class="glyphicon glyphicon-repeat"></p></a>
			<a href="?uplocation=<?= $location; ?>" class="btn btn-success btn-lg btn-block style6" role="button" aria-pressed="true">บันทึกการนับสต๊อก <p class="glyphicon glyphicon-floppy-save"></p></a>
			<a href="MIndex.php" class="btn btn-warning  btn-lg btn-block style6" role="button" aria-pressed="true">Home <p class="glyphicon glyphicon-home"></p></a>
		</form>
	</div>
</body>

</html>
<?
if ($uplocation != "") {

	$query_edit = "UPDATE [LOCATION] SET FLAG_COMPLETE = 1
			WHERE LOCATION ='$uplocation' and BRANCH_ID ='$SESS_BRANCH' ";
	$odbc_exc = odbc_exec($connect, $query_edit); // or die("Query failed in update data");		
	//echo  $odbc_exc;	

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
			echo "<meta http-equiv=\"refresh\"  content=\"0;url=Create_Precount.php\">";
		} else {
			?>
		<script>
			alert("บันทึกล้มเหลว !!!")
		</script>
<?

	}
}
?>