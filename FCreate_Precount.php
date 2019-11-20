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
    if ((document.formA.location.value.length != 7) && (document.formA.location.value.length != 12) && (document.formA.location.value.length != 13)) {
      alert("กรุณากรอก Location ให้ถูกต้อง");
      formA.location.focus();
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
  <title>บันทึกยอดนับ เรียงตามใบ Pre-Count</title>
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

    .pstylelo {
      font-size: 18px;
      font-weight: bold;
    }

    .pstylebutton {
      text-align: center;
    }
  </style>
</head>

<body onLoad="document.formA.location.focus()" ;>
  <h1>&nbsp;</h1>
  <div class="container">
    <form name="formA" onSubmit="return check_re();">
      <div class="form-group">
        <p class="pstylehead">บันทึกยอด</p>
      </div>
      <div class="form-group">
        <p class="pstyle"><? echo "STOCK TAKE สาขา  (" . "$SESS_BRANCH" . ")"; ?></p>
      </div>
      <div class="form-group">
        <p class="pstylelo">Location:</p>
        <input class="form-control" name="location" type="text" style="font-size:18px" size="7" maxlength="13" class='last' value="<?= $location; ?>" onChange="javascript:this.value=this.value.toUpperCase();" />
      </div>
      &nbsp;<?php

            //substr($_GET["location"], 0, 12);  


            $location_chk = substr($_GET["location"], 0, 12);
            $location = substr($_GET["location"], 0, 12);
            if ($location_chk <> '') {
              include("../connect/connect.php");

              //#Kittisak.pa 2018_11_15
              /* $sql_chk1="select count(*) as total1  from location where location = '$location_chk' and BRANCH_ID='$SESS_BRANCH'";
  $sql_chk1  = utf8_decode($sql_chk1);
  $exec_chk1  = odbc_exec($connect,$sql_chk1) or die ("cannot execute query ");
  $total1 = odbc_result($exec_chk1,"total1"); */

              $sql_chk1 = "select FLAG_COMPLETE  from location where location = '$location_chk' and BRANCH_ID='$SESS_BRANCH'";
              $exec_chk1  = odbc_exec($connect, $sql_chk1) or die("cannot execute query ");

              $numrow = odbc_num_rows($exec_chk1);
              $FLAG_COMPLETE = odbc_result($exec_chk1, "FLAG_COMPLETE");


              //====check location
              //if($total1>0){ echo "พบข้อมูล"; //#Kittisak.pa 2018_11_15
              if ($numrow > 0) {
                if ($FLAG_COMPLETE == 1) {
                  echo '<script language="javascript">';
                  echo 'alert("Location นี้ นับสต๊อกเสร็จแล้ว")';
                  echo '</script>';
                } else {
                  //====CREATE  ARRAY DATA==========================
                  $sql = "SELECT [LOCATION]
          ,[AR_MOTHER] AS ARTICLE
          ,min([PRECOUNT_RUN]) AS PRECOUNT_RUN
      FROM [CountStock_ILM].[dbo].[V_PRECOUNT_DISMOTHER]
      WHERE  LOCATION ='$location_chk'
      AND  BRANCH_ID ='$SESS_BRANCH'
      GROUP BY  [LOCATION]
          ,[AR_MOTHER]
      ORDER BY  LEFT(AR_MOTHER,2),PRECOUNT_RUN";
                  $exec = odbc_exec($connect, $sql) or die("cannot execute querygv ");
                  $array_art = array();
                  while ($row = odbc_fetch_array($exec)) {

                    array_push($array_art, trim($row[ARTICLE]));
                  }
                  $SESS_ART = $array_art;
                  session_register("SESS_ART");

                  if (empty($SESS_ART)) {
                    //echo"5555";
                    echo '<script language="javascript">';
                    echo 'alert("Location นี้ไม่ได้ทำ Precount !!!")';
                    echo '</script>';
                  } else {
                    //echo"88888";
                    echo "<meta http-equiv=\"refresh\"  content=\"0;url=FInsert_Codeprecount_AddQty.php?location=$location\">";
                  }
                  //print_r($SESS_ART);die();
                  //==============================
                  //echo $sql; die();
                  //echo "<meta http-equiv=\"refresh\"  content=\"0;url=FInsert_Codeprecount_AddQty.php?location=$location\">";   //This old ok

                }
              } else {
                echo '<script language="javascript">';
                echo 'alert("ไม่พบ Location")';
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