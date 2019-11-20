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
  <title>สร้างใบ Pre-Count</title>
  <style type="text/css">
    body {
      margin-left: 0px;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
      background-image: url(img/BG.jpg);
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

    .style6 {
      font-size: 18px;
      font-weight: bold;
    }
  </style>
</head>

<body onLoad="document.formA.barcode.focus()" ;>
  <h1>&nbsp;</h1>
  <div class="container">
    <form name="formA" onSubmit="return check_re();">
      <div class="form-group">
        <p class="pstyle">&nbsp; Location No : <?
                                                $location = strtoupper($location);
                                                echo "$location"; ?>&nbsp;</p>
      </div>
      <div class="form-group">
        <p class="pstyle"><? echo "STOCK TAKE สาขา (" . "$SESS_BRANCH" . ")"; ?></p>
      </div>
      <div class="form-group">
        <p class="pstylelo">Barcode/Article:</p>
        <input name="barcode" type="text" class="form-control" id="barcode" style="font-size:18px" value="<?= $barcode; ?>" size="15" maxlength="13" />
        <input class="form-control" type="hidden" name="location" value="<?= $location ?>" />
      </div>
      <?php
      $barcode = $_GET["barcode"];
      $length = strlen($barcode);
      if ($barcode <> '') {
        include("../connect/connect.php");
        //=====ตรวจสอบว่ามี รหัสสินค้าอยู่ในตาราง Product หรือไม่
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
        if ($total1 >= 1) //=====กรณีพบข้อมูลรหัสสินค้าในตาราง Product ตรวจสอบว่ามีอยู่ใน Precount แล้วหรือไม่
        { //echo "พบข้อมูล";
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
          {
            echo '<script language="javascript">';
            echo 'alert("มีการบันทึกข้อมูลรหัสสินค้านี้แล้ว")';
            echo '</script>';
          } else  //====กรณีทียังไม่มีการบันทึกรหัสสินค้าลงใน Location นี้
          {
            echo "<meta http-equiv=\"refresh\"  content=\"0;url=MInsert_CodeprecountArticle.php?location=$location&barcode=$barcode\">";
          }  
        }else {
          echo '<script language="javascript">';
          echo 'alert("ไม่พบข้อมูล")';
          echo '</script>';
        } 
      }
      ?>
      <p class="pstylebutton"><button class="btn btn-primary btn-lg btn-block style6" type="submit" name="Submit" id="Submit">Enter <p class="glyphicon glyphicon-ok"></p></button></p>
      <a href="MCreate_Precount.php" class="btn btn-info btn-lg btn-block style6" role="button" aria-pressed="true">เปลี่ยนตำแหน่ง <p class="glyphicon glyphicon-search"></p></a>
      <a href="MInsert_Codeprecount.php?location=<?= $location; ?>" class="btn btn-info  btn-lg btn-block style6" role="button" aria-pressed="true">อ่านรหัสใหม่ <p class="glyphicon glyphicon-repeat"></p></a>
      <a href="MIndex.php" class="btn btn-warning  btn-lg btn-block style6" role="button" aria-pressed="true">Home <p class="glyphicon glyphicon-home"></p></a>
    </form>
  </div>
</body>

</html>