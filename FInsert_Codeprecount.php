<? session_start();
// header ('Content-Type: text/html; charset=windows-874');
include("chksess_b.php");
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
      alert("��سҡ�͡ Barcode ���١��ͧ");
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
	<title>�ѹ�֡�ʹ�Ѻ ���§���� Pre-Count</title>
	<style type="text/css">
		body {
			margin-left: 0px;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
			background-image: url(img/BG.jpg);
		}

		.pstylehead {
			font-size: 20px;
			font-weight: bold;
			text-align: center;
		}

		.pstyle {
			font-size: 18px;
			font-weight: bold;
			text-align: center;
		}

		.pstylelo {
			font-size: 18px;
			font-weight: bold;
		}

		.pstylebutton {
			text-align: center;
		}

		.style6 {
			font-size: 18px;
			font-weight: bold;
		}
	</style>
</head>

<body onLoad="document.formA.barcode.focus()" ;>
	<p></p>
	<div class="container">
		<form name="formA" onSubmit="return check_re();">
			<div class="form-group">
				<p class="pstylehead">Location No : <?
												$location = strtoupper($location);
												echo "$location"; ?>
					 </p>
			</div>
			<dib class=""><p class="pstylehead"><? echo "STOCK TAKE �Ң� (" . "$SESS_BRANCH" . ")"; ?></p></dib>
			<div class="form-group">
				<p class="pstylelo">Barcode/Article:</p>
				<input class="form-control" name="barcode" type="text" class='last' id="barcode" style="font-size:16px" value="<?= $barcode; ?>" size="15" maxlength="13" />
				<input type="hidden" name="location" value="<?= $location ?>" />
			</div>

			<? //echo "$SESS_ART2";
			$arr_art = $SESS_ART2;
			// print_r($arr_art);		
			?>
			<?php
			$barcode = $_GET["barcode"];
			$length = strlen($barcode);
			if ($barcode <> '') {
				include("../connect/connect.php");
				//=====��Ǩ�ͺ����� �����Թ�������㹵��ҧ Product �������
				$sql_chk1 = "SELECT Count(*) AS total1 
                      FROM PRODUCT
                      WHERE ((material <>'' ) 
					  OR (oldmaterial <>'')) ";
				if ($length > '9') {
					$sql_chk1 .= "AND ((barcode Like '$barcode%')) ";
				} else {
					$sql_chk1 .= "AND ((material Like '$barcode%')  OR (oldmaterial Like '$barcode%') 
	                    OR (oldmatuse Like '$barcode%'))";
				}
				//	$sql_chk1 = iconv("UTF-8","TIS-620",$sql_chk1); 
				$exec_chk1  = odbc_exec($connect, $sql_chk1) or die("cannot execute query ");

				$total1 = odbc_result($exec_chk1, "total1");
				//====
				if ($total1 >= 1)  //=====�óվ������������Թ���㹵��ҧ Product ��Ǩ�ͺ���������� Precount �����������
				{
					echo '<script language="javasrcipt">';
					echo 'alert("��������")';
					echo '</script>';
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
					if ($totalpre >= 1) //==�óշ���ա�úѹ�֡�����Թ���ŧ� Location �������
					{
						// echo '<script language="javascript">';
						// echo 'alert("��úѹ�֡�����������Թ��ҹ������")';
						// echo '</script>';
						$SESS_ART = $SESS_ART2;
						session_register("SESS_ART");
						echo "<meta http-equiv=\"refresh\"  content=\"0;url=FInsert_Codeprecount_AddQty.php?location=$location&barcode=$barcode&SKC=skipt\">";
					} else ///====�óշ��ѧ����ա�úѹ�֡�����Թ���ŧ� Location ���

					{
						echo "<meta http-equiv=\"refresh\"  content=\"0;url=FInsert_CodeprecountArticle.php?location=$location&barcode=$barcode\">";
					}	//===end  �óշ��ѧ����ա�úѹ�֡�����Թ���ŧ� Location ���
				} else {
					echo '<script language="javascript">';
					echo 'alert("��辺������")';
					echo '</script>';
				}
			}
			?>
			<p class="pstylebutton"><button class="btn btn-primary btn-lg btn-block style6" type="submit" name="Submit" id="Submit">Enter <p class="glyphicon glyphicon-ok"></p></button></p>
			<a href="MIndex.php" class="btn btn-warning  btn-lg btn-block style6" role="button" aria-pressed="true">Home <p class="glyphicon glyphicon-home"></p></a>
		</form>
	</div>
</body>
</html>