<? session_start();
// header ('Content-Type: text/html; charset=windows-874');
//include ("../chksess.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </script>
  <title>iis2.indexlivingmall.com/countstockilm/M/MIndex.php</title>
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
    }

    .pstylehead {
      font-size: 35px;
      font-weight: bold;
      text-align: center;
    }

    .pstyle {
      font-size: 18px;
      font-weight: bold;

    }

    .pstylebutton {
      text-align: center;
    }
  </style>
</head>

<body onload="this.form.user.focus();">
  <div class="container">
    <h1>&nbsp;</h1>
    <p class="pstylehead">STOCK TAKE</p>
    <form id="form" name="form" method="post" action="MLogin.php">
      <div class="form-group">
        <p class="pstyle">Username:</p>
        <input class="form-control" name="user" type="text" id="user" value="" size="13" width="100"/ required> <? //echo "$user";
                                                                                                                ?>
        <div class="form-group">
          <p class="pstyle">Password:</p>
          <input class="form-control" name="pass" type="password" id="pass" value="" size="13" required />
        </div>
        <?php
        if ($user != '') {
          //echo"1>>>".gethostbyaddr($_SERVER['REMOTE_ADDR']);die();
          // echo "OK";
          $id = $_POST["user"];
          $pass = $_POST["pass"];
          include("../connect/connect.php");
          $sql = "SELECT *  FROM USER_ID  WHERE USER_NAME='$id'
  AND STATUS='Y'";
          $exec = odbc_exec($connect, $sql) or die("cannot execute query ");

          $SESS_USER_NAME = odbc_result($exec, "USER_NAME");
          $SESS_PASSWORD = odbc_result($exec, "PASSWORD");
          $SESS_BRANCH = odbc_result($exec, "BRANCH_ID");
          $SESS_BRANCH_NAME = odbc_result($exec, "BRANCH_NAME");
          $SESS_TYPE = odbc_result($exec, "TYPE");
          $SESS_STOCK = "STOCK";

          session_register("SESS_STOCK");

          $enpass = base64_decode("$SESS_PASSWORD");
          session_register("enpass");
          session_register("SESS_BRANCH");
          session_register("SESS_TYPE");
          session_register("SESS_BRANCH_NAME");


          if (("$enpass" == "$pass") and ("$SESS_PASSWORD" <> '')) {

            $_SESSION[sess_id] = session_id();
            $_SESSION[sess_username] = $id;
            $_SESSION[sess_devicename] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            // echo '<script language="javascript">';
            // echo 'alert("Indexlivingmall CountStock @ILM ::")';
            // echo '</script>';
            echo "<meta http-equiv=refresh content=0;URL=Mindex.php >";
          }

          if ("$enpass" <> "$pass") {
            echo '<script language="javascript">';
            echo 'alert("Incorrect Username or Password")';
            echo '</script>';
          }
        }
        ?>
        <!-- <? echo "$massage"; ?></div> -->
        <p class="pstylebutton"><button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" id="submit">Login <p class="glyphicon glyphicon-log-in"></p></button></p>
    </form>
  </div>
</body>

</html>