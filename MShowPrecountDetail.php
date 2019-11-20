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
      alert("กรุณากรอกรหัส Location ให้ถูกต้อง");
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
  <title>แสดงข้อมูลใบ Pre-Count</title>
  <style type="text/css">
    body {
      margin-left: 0px;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
      background-image: url(img/BG.jpg);
    }

    .pstylehead {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
    }

    .pstyle {
      font-size: 16px;
      font-weight: bold;
      text-align: center;
    }

    .pstylelo {
      font-size: 14px;
      font-weight: bold;
    }

    .pstylebutton {
      font-size: 16px;
      font-weight: bold;
      text-align: center;
    }

    .pstyle6 {
      font-size: 14px;
      /* font-weight: bold; */
    }

    .pstyle7 {
      font-size: 14px;
      /* font-weight: bold; */
      word-wrap: break-word;
      width: 75px;
    }
  </style>
</head>

<body onLoad="document.formA.location.focus()" ;>
  <p></p>
  <div class="container">
    <p class="pstylehead"><? echo "STOCK TAKE สาขา  (" . "$SESS_BRANCH" . ")"; ?></p>
    <form name="formA" onSubmit="return check_re();">
      <table class="table">
        <?
        include("../connect/connect.php");
        /*	     $sql_chk10="select  total10  from V_PRECOUNT_ART  where location = '$location' and BRANCH_ID='$SESS_BRANCH'";
	   $exec_chk10  = odbc_exec($connect,$sql_chk10) or die ("cannot execute query ");
	   $total10 = odbc_result($exec_chk10,"total10");*/

        $sql_show = "SELECT PRECOUNT.BARCODE, PRECOUNT.ARTICLE, PRECOUNT.DESCRIPTION,  PRECOUNT.AR_MOTHER, PRECOUNT.DESC_MOTHER 
 ,PRECOUNT.QUANTITY, PRECOUNT.LOCATION, PRECOUNT.COUNT,LOCATION.DOC_NUM,PRECOUNT.QUANTITY
,LOCATION.DOC_IDM,PRECOUNT.PRECOUNT_RUN
,UPSTOCK.QTY
,B.total10
 FROM LOCATION INNER JOIN PRECOUNT 
ON (LOCATION.BRANCH_ID = PRECOUNT.BRANCH_ID) 
AND (LOCATION.LOCATION = PRECOUNT.LOCATION)

LEFT  JOIN UPSTOCK
ON  UPSTOCK.LOCATION = LOCATION.LOCATION
AND UPSTOCK.BRANCH_ID = PRECOUNT.BRANCH_ID
AND UPSTOCK.ARTICLE = PRECOUNT.ARTICLE


INNER JOIN  V_PRECOUNT_ART B
ON (PRECOUNT.BRANCH_ID = B.BRANCH_ID) 
				  AND (PRECOUNT.LOCATION = B.LOCATION)
                  WHERE PRECOUNT.LOCATION='$location'
                  AND PRECOUNT.BRANCH_ID='$SESS_BRANCH'

                 ORDER BY  LEFT(PRECOUNT.ARTICLE,2),PRECOUNT.PRECOUNT_RUN";
        $exec_show = odbc_exec($connect, $sql_show) or die("cannot execute queryshow ");
        //$total10 = odbc_result($exec_show,"total10");

        $p = 0;
        while ($rower = odbc_fetch_array($exec_show)) {
          $p++;

          if ($p == '1') {
            ?>
            <tr class="table-light">
              <td colspan="2" class="pstyle6">จำนวน Article : <? echo "$rower[total10]"; ?></td>
              <td class="pstyle6">Location :</td>
              <td class="pstyle6"> <?
                                        $location2 = strtoupper($location);
                                        echo "$location2"; ?></td>
            </tr>
            <tr>
              <td bgcolor="#7489A6" class="pstylelo">No.</td>
              <td bgcolor="#7489A6" class="pstylelo">Article</td>
              <td bgcolor="#7489A6" class="pstylelo">Description</td>
              <td bgcolor="#7489A6" class="pstylelo">จำนวน</td>
            </tr>
          <? } ?>
          <!--#######-->
          <?
            if (($rower[ARTICLE] != $rower[AR_MOTHER]) and ($chk_ar != $rower[AR_MOTHER])) {
              ?>
            <!-- <tr class="table-light">
          <td class="pstyle6">+</td>
          <td class="pstyle6"><? echo "$rower[AR_MOTHER]"; ?></td>
          <td colspan="2" class="pstyle6"><? echo substr($rower[DESC_MOTHER], 1, 15); ?></td>
          </tr> -->
          <? } ?>
          <tr class="table-light">
            <td class="pstyle6"><? echo "$p"; ?></td>
            <td class="pstyle6"><? echo "$rower[ARTICLE]" . "  "; ?></td>
            <td>
              <p class="pstyle7">
                <?
                  //echo wordwrap($text2,5,"<br />");
                  echo $rower[DESCRIPTION];
                  // echo  iconv("TIS-620","UTF-8",$rower[DESCRIPTION]);
                  ?></p>
            </td>
            <td class="pstyle6"><? echo "$rower[QTY]"; ?> (<? echo "$rower[QUANTITY]"; ?>)</td>
          </tr>
        <?
          $chk_ar = $rower[AR_MOTHER];
        } //===end while show data
        ?>
      </table>
      <a href="MShowPrecount.php" class="btn btn-info btn-lg btn-block pstylebutton" role="button" aria-pressed="true">เปลี่ยนตำแหน่ง <p class="glyphicon glyphicon-search"></p></a>
    </form>
  </div>
</body>

</html>