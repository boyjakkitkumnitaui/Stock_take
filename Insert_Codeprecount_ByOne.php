<? session_start();
// header ('Content-Type: text/html; charset=windows-874');
include("chksess_b.php");
$sess_devicename = $_SESSION[sess_devicename];
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
        if (document.formA.barcode.value == '') {
            formA.barcode.focus();
            return false;
        }
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
            font-size: 20px;
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
            font-weight: bold;
        }

        .pstylebutton {
            text-align: center;
        }
    </style>
</head>

<body onLoad="document.formA.barcode.focus()" ;>
    <div class="container">
        <p></p>
        <form name="formA" onSubmit="return check_re();">
            <div class="form-group">
                <p class="pstylehead">Location No :
                    <?
                    $location = strtoupper($location);
                    echo "$location"; ?></p>
            </div>
            <div class="form-group">
                <p class="pstylehead"><? echo "STOCK TAKE สาขา (" . $SESS_BRANCH . ")"; ?></p>
            </div>
            <div class="form-group">
                <p class="pstylelo">Barcode/Article:</p>
            </div>
            <div class="form-group">
                <input name="barcode" type="text" class='form-control' id="barcode" style="font-size:16px" value="<?= $barcode; ?>" size="14" maxlength="13" />
                <input type="hidden" name="location" value="<?= $location ?>" />
            </div>

            <!--<form name="formB" onSubmit="return check_formB();">
		<tr>
      <td colspan="4" align="left">
			<input type="submit" name="SaveRequestForm" value="ส่งยอดการนับสต๊อค" class="btcount">
			<input type="hidden" name="uplocation" value="<?= $location ?>" />
			</td>
		</tr>		
	</form>	-->
            <?
            $barcode = trim($_GET["barcode"]);
            $length = strlen($barcode);

            if ($barcode == '') {
                ?>

            <?
            } elseif ($location != '') {
                ?>

                <!-- <td>&nbsp;</td> -->

                <?php
                    //include ("../connect/connect.php");

                    // Check BOM
                    $sql_bom = "select a.*,b.description as ar_description from PRODUCT_SUB a inner join PRODUCT b on a.ARTICLE=b.oldmatuse where a.ARTICLE in (select oldmatuse from product where oldmatuse='$barcode' or barcode='$barcode')";
                    $exec_bom  = odbc_exec($connect, $sql_bom) or die("cannot execute query ");
                    // die("num_row: ".odbc_num_rows($exec_bom));
                    if (odbc_num_rows($exec_bom) > 0) { // Is BOM   
                        $ar_mother = $barcode;


                        while ($rs = odbc_fetch_array($exec_bom)) {
                            $barcode = $rs[COMPONENT];
                            // die("component: ".$barcode);
                            if ($str_head == '') {
                                $str_head = "+ " . $ar_mother . " : " . $rs['ar_description'];
                                $str_head .= "<table class=\"table\">
                    <tr>
                        <td bgcolor=\"#7489A6\" class=\"pstylelo\"><p>Article</p></td>
                        <td bgcolor=\"#7489A6\" class=\"pstylelo\"><p>Qty.</p></td>
                    </tr>";

                                echo $str_head;
                            }

                            // กรณี BOM1 ให้เก็บเฉพาะตัวลูก Single เท่านั้น
                            if ($rs[MATERIAL_CAT] == '10') {

                                $sql_bom1 = "select a.*,b.description as ar_description from PRODUCT_SUB a inner join PRODUCT b on a.ARTICLE=b.oldmatuse where a.ARTICLE in (select oldmatuse from product where oldmatuse='$barcode' or barcode='$barcode')";
                                $exec_bom1  = odbc_exec($connect, $sql_bom1) or die("cannot execute query ");

                                while ($rs1 = odbc_fetch_array($exec_bom1)) {

                                    $barcode = $rs1[COMPONENT];

                                    $sql_pre = "select Count(*) AS totalpre FROM precount 
                    where  location = '$location' and branch_id = '$SESS_BRANCH' and 
                        (barcode='$barcode' OR article='$barcode')";

                                    $exec_pre  = odbc_exec($connect, $sql_pre) or die("Cannot execute query.");

                                    $totalpre = odbc_result($exec_pre, "totalpre");

                                    // กรณียังไม่ได้ทำ precount ให้ทำ precout auto
                                    if ($totalpre < 1) {
                                        $sql_ins_pre = "insert into precount (barcode,article,location,description,precount_run,branch_id,date_up,quantity,count,ar_mother,desc_mother,date_tranferidm) 
                        select barcode,oldmatuse,'$location',description, (select count(*)+1 from PRECOUNT where location = '$location' and branch_id = '$SESS_BRANCH'),'$SESS_BRANCH', getdate(),unit,0,'$ar_mother','" . str_replace("'", "''", $rs[ar_description]) . "','' 
                            from product where barcode='$barcode' or oldmatuse='$barcode'
                        ";
                                        odbc_exec($connect, $sql_ins_pre) or die("cannot execute query insert: $sql_ins_pre");
                                    }
                                    // echo $sql_ins_pre;
                                    // die();

                                    $chk_ar = "SELECT * FROM UPSTOCK 
                            WHERE  LOCATION ='$location' AND  BRANCH_ID ='$SESS_BRANCH' 
                                    AND (article='$barcode' or barcode='$barcode')";
                                    // die($chk_ar);
                                    $exec_chkar = odbc_exec($connect, $chk_ar) or die("cannot execute query ");
                                    $totalar = odbc_num_rows($exec_chkar);
                                    $old_qty = odbc_result($exec_chkar, "QTY");
                                    $QTY = $rs1[QUANTITY]; //odbc_result($exec_chkar,"QTY");


                                    if ($totalar > 0) {
                                        $chk_lo = 'U'; //เคยมีการบันทึกแล้ว
                                    } else {
                                        $chk_lo = '';
                                    }

                                    if ($totalar == 0) {

                                        $add = "insert into UPSTOCK
                            select 
                            barcode,oldmatuse,unit,$rs1[QUANTITY],'$location',getdate(),'$SESS_BRANCH','$sess_devicename'
                            FROM PRODUCT 
                            WHERE (barcode = '$barcode') OR (oldmaterial = '$barcode') OR (oldmatuse = '$barcode')";


                                        odbc_exec($connect, $add) or die("<br>Query failed in insert data");

                                        $addck = "INSERT INTO UPSTOCK_LOG
                                select BARCODE, ARTICLE, QUANTITY, $rs1[QUANTITY], '999.99', '$chk_lo', LOCATION, getdate(), '1900-01-01', '1900-01-01', BRANCH_ID ,'$sess_devicename'
                                from PRECOUNT 
                                where BRANCH_ID='$SESS_BRANCH' and LOCATION='$location' and (article='$barcode' or barcode='$barcode') ";

                                        odbc_exec($connect, $addck) or die("<br>Query failed in insert data02");
                                    } else {
                                        $query_edit = "UPDATE UPSTOCK SET QTY=QTY+$QTY, DATEUP=getdate(),DEVICE_NAME='$sess_devicename'
                                        WHERE LOCATION ='$location' AND  BRANCH_ID ='$SESS_BRANCH' and (article='$barcode' or barcode='$barcode')";
                                        $query_edit = $query_edit;
                                        //die();
                                        odbc_exec($connect, $query_edit) or die("Query failed in update data");
                                    }

                                    echo "<tr class=\"table-light\"><td class=\"pstylelo\">$barcode</td><td class=\"pstylelo\">" . ($QTY + $old_qty) . "</td><tr/>";
                                }
                            } else {

                                $sql_pre = "select Count(*) AS totalpre FROM precount 
                where  location = '$location' and branch_id = '$SESS_BRANCH' and 
                    (barcode='$barcode' OR article='$barcode')";

                                $exec_pre  = odbc_exec($connect, $sql_pre) or die("Cannot execute query.");

                                $totalpre = odbc_result($exec_pre, "totalpre");

                                // กรณียังไม่ได้ทำ precount ให้ทำ precout auto
                                if ($totalpre < 1) {
                                    $sql_ins_pre = "insert into precount (barcode,article,location,description,precount_run,branch_id,date_up,quantity,count,ar_mother,desc_mother,date_tranferidm) 
                    select barcode,oldmatuse,'$location',description, (select count(*)+1 from PRECOUNT where location = '$location' and branch_id = '$SESS_BRANCH'),'$SESS_BRANCH', getdate(),unit,0,'$ar_mother','" . str_replace("'", "''", $rs[ar_description]) . "','' 
                        from product where barcode='$barcode' or oldmatuse='$barcode'
                    ";
                                    odbc_exec($connect, $sql_ins_pre) or die("cannot execute query insert: $sql_ins_pre");
                                }
                                // echo $sql_ins_pre;
                                // die();

                                $chk_ar = "SELECT * FROM UPSTOCK 
                        WHERE  LOCATION ='$location' AND  BRANCH_ID ='$SESS_BRANCH' 
                                AND (article='$barcode' or barcode='$barcode')";
                                // die($chk_ar);
                                $exec_chkar = odbc_exec($connect, $chk_ar) or die("cannot execute query ");
                                $totalar = odbc_num_rows($exec_chkar);
                                $old_qty = odbc_result($exec_chkar, "QTY");
                                $QTY = $rs[QUANTITY]; //odbc_result($exec_chkar,"QTY");


                                if ($totalar > 0) {
                                    $chk_lo = 'U'; //เคยมีการบันทึกแล้ว
                                } else {
                                    $chk_lo = '';
                                }

                                if ($totalar == 0) {

                                    $add = "insert into UPSTOCK
                        select 
                        barcode,oldmatuse,unit,$rs[QUANTITY],'$location',getdate(),'$SESS_BRANCH','$sess_devicename'
                        FROM PRODUCT 
                        WHERE (barcode = '$barcode') OR (oldmaterial = '$barcode') OR (oldmatuse = '$barcode')";


                                    odbc_exec($connect, $add) or die("<br>Query failed in insert data");

                                    $addck = "INSERT INTO UPSTOCK_LOG
                            select BARCODE, ARTICLE, QUANTITY, $rs[QUANTITY], '999.99', '$chk_lo', LOCATION, getdate(), '1900-01-01', '1900-01-01', BRANCH_ID ,'$sess_devicename'
                            from PRECOUNT 
                            where BRANCH_ID='$SESS_BRANCH' and LOCATION='$location' and (article='$barcode' or barcode='$barcode') ";

                                    odbc_exec($connect, $addck) or die("<br>Query failed in insert data02");
                                } else {
                                    $query_edit = "UPDATE UPSTOCK SET QTY=QTY+$QTY, DATEUP=getdate(),DEVICE_NAME='$sess_devicename'
                                    WHERE LOCATION ='$location' AND  BRANCH_ID ='$SESS_BRANCH' and (article='$barcode' or barcode='$barcode')";
                                    $query_edit = $query_edit;
                                    //die();
                                    odbc_exec($connect, $query_edit) or die("Query failed in update data");
                                }

                                echo "<tr class=\"table-light\"><td class=\"pstylelo\">$barcode</td><td class=\"pstylelo\">" . ($QTY + $old_qty) . "</td><tr/>";
                            }
                        }
                        echo "</table>";
                        echo '<script language="javascript">';
                        echo 'alert("บันทึกข้อมูลเรียบร้อยแล้ว")';
                        echo '</script>';
                        echo "<meta http-equiv=\"refresh\"  content=\"1;url=Insert_Codeprecount_ByOne.php?location=$location\">";
                    } else { // Isn't BOM
                        // Check precount   
                        $sql_pre = "select Count(*) AS totalpre FROM precount 
        where  location = '$location' and branch_id = '$SESS_BRANCH' and 
            (barcode='$barcode' OR article='$barcode')";
                        // die($sql_pre);
                        $exec_pre  = odbc_exec($connect, $sql_pre) or die("cannot execute query ");

                        $totalpre = odbc_result($exec_pre, "totalpre");

                        // กรณียังไม่ได้ทำ precount ให้ทำ precout auto
                        if ($totalpre < 1) {
                            $sql_ins_pre = "insert into precount (barcode,article,location,description,precount_run,branch_id,date_up,quantity,count,ar_mother,desc_mother,date_tranferidm) 
            select barcode,oldmatuse,'$location',description, (select count(*)+1 from PRECOUNT where location = '$location' and branch_id = '$SESS_BRANCH'),'$SESS_BRANCH', getdate(),unit,0,oldmaterial,description,'' 
                from product where barcode='$barcode' or oldmatuse='$barcode'
            ";
                            // die($sql_ins_pre);
                            odbc_exec($connect, $sql_ins_pre) or die("cannot execute query insert: $sql_ins_pre");
                        }

                        // die($sql_ins_pre);
                        //=====ตรวจสอบว่ามี รหัสสินค้าอยู่ในตาราง Product หรือไม่
                        $sql_chk1 = "SELECT Count(*) AS total1 
                        FROM PRODUCT
                        WHERE ((material <>'' ) 
                        OR (oldmaterial <>'')) ";
                        if ($length > 9) {
                            $sql_chk1 .= "AND ((barcode Like '$barcode')) ";
                        } else {
                            $sql_chk1 .= "AND ((oldmaterial Like '$barcode') OR (oldmatuse Like '$barcode'))";
                        }
                        // die($sql_chk1);
                        $exec_chk1  = odbc_exec($connect, $sql_chk1) or die("cannot execute query ");

                        $total1 = odbc_result($exec_chk1, "total1");
                        //====
                        if ($total1 > 0) {  //=====กรณีพบข้อมูลรหัสสินค้าในตาราง Product ตรวจสอบว่ามีอยู่ใน Precount แล้วหรือไม่

                            $date_now = date("m/d/Y H:i:s");
                            $chk_ar = "SELECT * FROM UPSTOCK 
                    WHERE  LOCATION ='$location'
                    AND  BRANCH_ID ='$SESS_BRANCH' and (article='$barcode' or barcode='$barcode')";
                            // die($chk_ar);
                            $exec_chkar  = odbc_exec($connect, $chk_ar) or die("cannot execute query ");
                            $totalar = odbc_num_rows($exec_chkar);
                            $QTY = odbc_result($exec_chkar, "QTY");

                            if ($totalar > 0) {
                                $chk_lo = 'U'; //เคยมีการบันทึกแล้ว
                            } else {
                                $chk_lo = '';
                            }

                            if ($totalar == 0) {
                                $add = "insert into UPSTOCK
                select 
                barcode,oldmatuse,unit,1,'$location',getdate(),'$SESS_BRANCH','$sess_devicename'
                FROM PRODUCT 
                WHERE (barcode = '$barcode') OR (oldmaterial = '$barcode') OR (oldmatuse = '$barcode')";

                                //echo $add;die();
                                odbc_exec($connect, $add) or die("<br>Query failed in insert data");

                                $addck = "INSERT INTO UPSTOCK_LOG
                        select BARCODE, ARTICLE, QUANTITY, 1, '999.99', '$chk_lo', LOCATION, getdate(), '1900-01-01', '1900-01-01', BRANCH_ID ,'$sess_devicename'
                        from PRECOUNT 
                        where BRANCH_ID='$SESS_BRANCH' and LOCATION='$location' and (article='$barcode' or barcode='$barcode') ";

                                odbc_exec($connect, $addck) or die("<br>Query failed in insert data02");
                            } else {
                                $query_edit = "UPDATE UPSTOCK SET QTY=QTY+1, DATEUP=getdate(),DEVICE_NAME='$sess_devicename'
                                WHERE LOCATION ='$location' AND  BRANCH_ID ='$SESS_BRANCH' and (article='$barcode' or barcode='$barcode')";
                                $query_edit = $query_edit;
                                //die();
                                //echo $query_edit; die();
                                odbc_exec($connect, $query_edit) or die("Query failed in update data");
                            }


                            echo "<table class=\"table\">
                    <tr>
                        <td bgcolor=\"#7489A6\" class=\"pstylelo\"><p>Article</p></td>
                        <td bgcolor=\"#7489A6\" class=\"pstylelo\"><p>Qty.</p></td>
                    </tr>";
                            echo "<tr class=\"table-light\"><td class=\"pstylelo\">$barcode</td><td class=\"pstylelo\">" . ($QTY + 1) . "</td><tr/></table>";


                            echo "<meta http-equiv=\"refresh\"  content=\"1;url=Insert_Codeprecount_ByOne.php?location=$location\">";
                            echo '<script language="javascript">';
                            echo 'alert("บันทึกข้อมูลเรียบร้อยแล้ว")';
                            echo '</script>';
                        } else {
                            echo '<script language="javascript">';
                            echo 'alert("ไม่พบข้อมูล")';
                            echo '</script>';
                        }
                    }

                    ?>

            <?
            } else {
                echo '<script language="javascript">';
                echo 'alert("ไม่พบ Location ..!!!")';
                echo '</script>';
                echo "<meta http-equiv=\"refresh\"  content=\"1;url=create_precount_byone.php\">";
            }
            ?>
            <p class="pstylebutton"><button class="btn btn-primary btn-lg btn-block style6" type="submit" name="Submit" id="Submit">Enter <p class="glyphicon glyphicon-ok"></p></button></p>
            <a href="?uplocation=<?= $location; ?>" class="btn btn-success btn-lg btn-block style6" role="button" aria-pressed="true">บันทึการนับสต๊อก <p class="glyphicon glyphicon-saved"></p></a>
            <a href="MIndex.php" class="btn btn-warning  btn-lg btn-block style6" role="button" aria-pressed="true">Home <p class="glyphicon glyphicon-home"></p></a>
        </form>

    </div>
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
            echo "<meta http-equiv=\"refresh\"  content=\"0;url=create_precount_byone.php\">";
        } else {
            ?>
        <script>
            alert("บันทึกล้มเหลว !!!")
        </script>
<?

    }
}
?>