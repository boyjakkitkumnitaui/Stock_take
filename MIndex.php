<? session_start();
// header ('Content-Type: text/html; charset=windows-874');
include("chksess_b.php");
?>
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
  <title>Stock Tack</title>
  <style type="text/css">
    body {
      margin-left: 0px;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
      background-image: url(img/BG.jpg);
    }

    .pstylehead {
      font-size: 23px;
      font-weight: bold;
      text-align: center;
    }

    .pstd {
      font-size: 16px;
      font-weight: bold;
      text-align: center;
    }

  </style>
</head>

<body>
    <h1>&nbsp;</h1>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th>
            <p class="pstylehead">STOCK TAKE <? echo "สาขา (" . "$SESS_BRANCH" . ")"; ?></p>
            <!-- <p class="patd"></p> -->
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><a href="MCreate_Precount.php" class="btn btn-warning  btn-lg btn-block pstd" role="button" aria-pressed="true">
          A สร้างเอกสาร Stock Take
            </a></td>
        </tr>
        <tr>
          <td><a href="Create_Precount.php" class="btn btn-warning  btn-lg btn-block pstd" role="button" aria-pressed="true">
          B ตรวจนับ + บันทึกยอด (Sale Arae)
            </a></td>
        </tr>
        <tr>
          <td><a href="FCreate_Precount.php" class="btn btn-warning  btn-lg btn-block pstd" role="button" aria-pressed="true">
          C บันทึกยอด Stock Take
            </a></td>
        </tr>
        <tr>
          <td><a href="create_precount_byone.php" class="btn btn-warning  btn-lg btn-block pstd" role="button" aria-pressed="true">
          D บันทึกยอด+1 Default By One
            </a></td>
        </tr>
        <tr>
          <td><a href="MShowPrecount.php" class="btn btn-warning  btn-lg btn-block pstd" role="button" aria-pressed="true">
          E แสดงรายการ Stock Take
            </a></td>
        </tr>
        <tr>
          <td><a href="Logout.php" class="btn btn-warning  btn-lg btn-block pstd" role="button" aria-pressed="true">
          ออกจากระบบ(Logout) <p class="glyphicon glyphicon-log-out"></p>
            </a></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>