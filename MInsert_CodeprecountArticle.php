<? session_start();
// header ('Content-Type: text/html; charset=windows-874');
include("chksess_b.php");
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=windows-874" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <title>���ҧ� Pre-Count</title>
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

    .pstylelo {
        font-size: 18px;
        font-weight: bold;
        color: #ffffff;
    }

    .pstylelos {
        font-size: 18px;
    }

    .pstylebutton {
        text-align: center;
    }
    </style>
</head>
<script>
function handleEnter(event) {
    var e = window.event ? window.event : event;
    var keyCode = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
    if (keyCode == 13) {
        if (this.className && this.className == 'last') {
            this.form.submit();
            return true;
        }
    } else
        return true;
}
</script>


<body onLoad="document.formA.SaveRequestForm2.focus()" ;>
    <h1>&nbsp;</h1>
    <div class="container">
        <div class="form-group">
            <p class="pstylehead">Location No :
                <? $location = strtoupper($location);
				echo "$location";
				?>
            </p>
		</div>
		<div class="form-group"><p class="pstylehead"><?echo "STOCK TAKE �Ң� (" . "$SESS_BRANCH" . ")";?></p></div>
        <form name="formA" id="formA" action="MInsert_CodeprecountArticle.php" method="post">
            <table class="table">
                <?  //echo "$SaveRequestForm2";
				?>
                <!--      -->
                <!-- <input type="submit" name="SaveRequestForm" value="�ѹ�֡������">  -->
                <?
				//=================�ó��ա�úѹ�֡������
				include("../connect/connect.php");
				if ((isset($_POST['SaveRequestForm']))  or ($SaveRequestForm2 != '')) {
					//  echo "$SaveRequestForm";
					if (($SESS_BRANCH <> '') and ($location <> '')) { ///=====��Ǩ�ͺ��� �����Ңҷ��кѹ�֡�繤����ҧ�������

						$date_now = date("m/d/Y H:i:s");

						if ($a == 'Y') { //========�ó��������Թ��ҵ���١

							$countarr = count($articlearr);
							//   echo  $countarr;
							for ($i = 0; $i < $countarr; $i++) {
								//  echo "$i" ;
								$sql_pre = "select Count(*) AS totalpre FROM precount 
								where (barcode = '$barcodearr[$i]' or article ='$articlearr[$i]')
								and location = '$location' and branch_id = '$SESS_BRANCH' ";
								$exec_pre  = odbc_exec($connect, $sql_pre) or die("cannot execute query ");
								$totalpre = odbc_result($exec_pre, "totalpre");
								if ($totalpre >= 1) //==�óշ���ա�úѹ�֡�����Թ���ŧ� Location �������
								{
									//  echo "</br>";echo "</br>"; echo " -  �ա�úѹ�֡�����Ź������º��������";echo "</br>";echo "</br>";
									echo "<meta http-equiv=\"refresh\"  content=\"0;url=MInsert_Codeprecount.php?location=$location\">";

									// exit();
								} else { //====�óշ��ѧ����ա�úѹ�֡�����Թ���ŧ� Location ���

									//===���Ҩӹǹ����ش �������¡ ������§�� Precount
									$max_count = "SELECT MAX(PRECOUNT_RUN) AS NUM FROM PRECOUNT 
						WHERE BRANCH_ID= '$SESS_BRANCH' 
						AND LOCATION = '$location' ";

									$max_com = odbc_exec($connect, $max_count) or die("cannot execute count ");

									$count_num = odbc_result($max_com, "NUM");

									$item_id = $count_num + 1;
									echo "<br>";
									//echo "$articlearr[$i]";
									$id = "$articlearr[$i]";
									$vowels = array("'");


									$id2 = str_replace($vowels, " ", "$id ");
									$desc_mother2 = str_replace($vowels, " ", "$desc_mother");
									$sql_insert1 = "insert into PRECOUNT  values ('$barcodearr[$i]','$id2','$location'
												,'$descriptionarr[$i]','$item_id)','$SESS_BRANCH)'
												,'$date_now)','$quantityarr[$i]','','$article_mother)','$desc_mother2','')";
									$dbqueryb1 = odbc_exec($connect, $sql_insert1);
									if ($dbqueryb1) {
										echo '<script language="javascript">';
										echo 'alert("�ѹ�֡���������º��������")';
										echo '</script>';
										echo "<meta http-equiv=\"refresh\"  content=\"0;url=MInsert_Codeprecount.php?location=$location\">";
									} else {
										echo '<script language="javascript">';
										echo 'alert("�������ö�ѹ�֡��������")';
										echo '</script>';
										echo "<meta http-equiv=\"refresh\"  content=\"5;url=MInsert_Codeprecount.php?location=$location\">";
									}
								} //====end  if �óշ��ѧ����ա�úѹ�֡�����Թ���ŧ� Location ���
							} //===== end for㹡�����¡�������ҨҴ���ҧ Temp �����红�����ŧ���ҧPrecount
						} else if ($a == 'N') { //=========== end if �ó��������Թ��ҵ���١

							//========�ó�����������Թ��ҵ���١
							$length = strlen($barcode);
							$sql_pre = "select Count(*) AS totalpre FROM precount 
								where location = '$location' and branch_id = '$SESS_BRANCH' ";
							if ($length > '9') {
								$sql_pre .= "and barcode like  '$barcode%'  ";
							} else {
								$sql_pre .= "and article like '$barcode%'";
							}
							$exec_pre  = odbc_exec($connect, $sql_pre) or die("cannot execute query ");
							$totalpre = odbc_result($exec_pre, "totalpre");
							if ($totalpre >= 1) //==�óշ���ա�úѹ�֡�����Թ���ŧ� Location �������
							{
								echo '<script language="javascript">';
								echo 'alert("�ա�úѹ�֡�����Ź������º��������  EA")';
								echo '</script>';
								echo "<meta http-equiv=\"refresh\"  content=\"0;url=MInsert_Codeprecount.php?location=$location\">";
							} else //====�óշ��ѧ����ա�úѹ�֡�����Թ���ŧ� Location ���
							{
								//===���Ҩӹǹ����ش �������¡ ������§�� Precount
								$max_count = "SELECT MAX(PRECOUNT_RUN) AS NUM FROM PRECOUNT 
										WHERE BRANCH_ID= '$SESS_BRANCH' 
										AND LOCATION = '$location' ";

								$max_com = odbc_exec($connect, $max_count) or die("cannot execute count ");

								$count_num = odbc_result($max_com, "NUM");

								$item_id = $count_num + 1;

								$id = $FirstOfdescription;
								$vowels = array("'");
								$id2 = str_replace($vowels, " ", "$id");
								//$idff = eregi_replace(chr(34),'', $id);   
								//$idff=eregi_replace(chr(39),'',$id);
								//$id2 = eregi_replace(chr(34),'', $idff);  
								echo $FirstOfdescription;
								$sql_insert2 = "insert into PRECOUNT values ('$FirstOfbarcode','$article','$location','$id2'
											,'$item_id','$SESS_BRANCH','$date_now','$FirstOfunit','','$article','$id2','')";
								$dbqueryb2 = odbc_exec($connect, $sql_insert2);
								if ($dbqueryb2) {
									echo '<script language="javascript">';
									echo 'alert("�ѹ�֡���������º�������� EA")';
									echo '</script>';
									echo "<meta http-equiv=\"refresh\"  content=\"0;url=MInsert_Codeprecount.php?location=$location\">";
								} else {
									echo '<script language="javascript">';
									echo 'alert("�������ö�ѹ�֡��������")';
									echo '</script>';
									echo "<meta http-equiv=\"refresh\"  content=\"4;url=MInsert_Codeprecount.php?location=$location\">";
								}
							} //==end if �óշ��ѧ����ա�úѹ�֡�����Թ���ŧ� Location ���
						} //=========== end if �ó�����������Թ��ҵ���١
					} else if (($SESS_BRANCH == '') or ($location == '')) {
						echo '<script language="javascript">';
						echo 'alert("��س� LOGIN �����ա����")';
						echo '</acript>';
						echo "<meta http-equiv=\"refresh\"  content=\"1;url=MLogin.php\">";
					}
				}
				//==================================================================
  //==================================================================
  //==================================================================
  //======================�� �ó��ա�úѹ�֡������
				?>
                <!--      -->


                <?
				if (!isset($_POST['SaveRequestForm'])) {
					?>
                <?php
						if ($barcode <> '') {
							$length = strlen($barcode);
							include("../connect/connect.php");
							//=====������֧���� Article ���������Ѻ�����������

							$sql_chk = "SELECT  description , 
                      oldmaterial , barcode ,price,unit
                      FROM PRODUCT
                      WHERE PACK != 'FG' ";
							if ($length > '9') {
								$sql_chk .= "AND barcode Like '$barcode%' ";
							} else {
								$sql_chk .= "AND ((material Like '$barcode%') OR (oldmaterial Like '$barcode%') 
	OR (oldmatuse Like '$barcode%'))  ";
							}
							$exec_chk = odbc_exec($connect, $sql_chk) or die("cannot execute query ");
							$FirstOfdescription = odbc_result($exec_chk, "description");
							$article = odbc_result($exec_chk, "oldmaterial"); //���� Article ������
							$FirstOfbarcode = odbc_result($exec_chk, "barcode");
							$FirstOfprice = odbc_result($exec_chk, "price");
							$FirstOfunit = odbc_result($exec_chk, "unit");
							//  echo "$article"." :";   echo "$FirstOfdescription";
							//echo "EA";

							?>
                <span>
                    <input name="article_mother" type="hidden" value="<? echo " $article"; ?>" />
                    <input name="desc_mother" type="hidden" value="<? echo $FirstOfdescription; ?>" />
                    <?
									$vowels = array("'");
									$FirstOfdescription = str_replace($vowels, " ", "$FirstOfdescription");
									?>
                    <input name="location" type="hidden" value="<?= $location; ?>" />
                    <input name="barcode" type="hidden" value="<?= $barcode; ?>" />
                    <input name='FirstOfdescription' type='hidden' value='<? echo "$FirstOfdescription"; ?>' />
                    <input name="article" type="hidden" value="<?= $article; ?>" />
                    <input name="FirstOfbarcode" type="hidden" value="<?= $FirstOfbarcode; ?>" />
                    <input name="FirstOfunit" type="hidden" value="<?= $FirstOfunit; ?>" />
                    <input name="FirstOfquantity" type="hidden" value="1" />

                    <?   //================��Ǩ�ͺ����������Թ��ҵ���١�������
									$sql_chksub = "SELECT Count(*) AS totalsub
                      FROM PRODUCT_SUB
                      WHERE ARTICLE ='$article' ";
									$exec_chksub  = odbc_exec($connect, $sql_chksub) or die("cannot execute query ");
									$totalsub = odbc_result($exec_chksub, "totalsub");

									if ($totalsub >= 1) //==========�ó��������Թ��ҵ���١
									{ // echo " (�������Թ��ҵ���١)";   
										$a = 'Y';
										//=====���ҧ���ҧ Temp �����红�����㹡���ʴ� �����Թ��ҷ����� 
										$temptable = "#" . "$SESS_BRANCH" . "$location";
										?>
                    <input name="temptable" type="hidden" value="<?= $temptable; ?>" />
                    <?
											$sql_temp1 = "CREATE TABLE $temptable (
                                           barcode varchar(50) ,
                                           article varchar(50) ,
                                           description nvarchar(300) ,
                                           quantity varchar(50) ,
                                           price varchar(50))";
											$dbquery_temp1 = odbc_exec($connect, $sql_temp1) or die("error sql_temp");

											$sqlsub = "SELECT PRODUCT_SUB.ARTICLE, PRODUCT_SUB.COMPONENT, 
					                   PRODUCT_SUB.COMPONENT_DESC, PRODUCT_SUB.QUANTITY, 
									   PRODUCT_SUB.MATERIAL_CAT, PRODUCT.barcode, PRODUCT.price
                                       FROM PRODUCT_SUB INNER JOIN PRODUCT 
									   ON PRODUCT_SUB.COMPONENT = PRODUCT.oldmaterial
                                       WHERE PRODUCT_SUB.ARTICLE='$article'
                                       ORDER BY PRODUCT_SUB.ARTICLE, PRODUCT_SUB.COMPONENT";
											$execsub = odbc_exec($connect, $sqlsub) or die("cannot execute querygv ");
											while ($row = odbc_fetch_array($execsub)) {
												//===�óշ�� �����Թ��ҵ���١ ��  material cat ��Ẻ sale set  �յ���١�ա
												if ($row[MATERIAL_CAT] == '10') {
													$sqlsub2 = "SELECT PRODUCT_SUB.ARTICLE, PRODUCT_SUB.COMPONENT, 
					                   PRODUCT_SUB.COMPONENT_DESC, PRODUCT_SUB.QUANTITY, 
									   PRODUCT_SUB.MATERIAL_CAT, PRODUCT.barcode, PRODUCT.price
                                       FROM PRODUCT_SUB INNER JOIN PRODUCT 
									   ON PRODUCT_SUB.COMPONENT = PRODUCT.oldmaterial
                                       WHERE PRODUCT_SUB.ARTICLE='$row[COMPONENT]'
                                       ORDER BY PRODUCT_SUB.ARTICLE, PRODUCT_SUB.COMPONENT";
													$execsub2 = odbc_exec($connect, $sqlsub2) or die("cannot execute querygv ");
													while ($row2 = odbc_fetch_array($execsub2)) {
														$price = number_format($row2[price], 2, '.', ',$row2[price]');
														$idd = $row2[COMPONENT_DESC];
														$vowels = array("'");
														$idd2 = str_replace($vowels, " ", "$idd ");
														$add2 = "insert into $temptable 
										  values ('$row2[barcode]','$row2[COMPONENT]','$idd2',
										  '$row2[QUANTITY]','$price')";
														$dbqueryb_temp2 = odbc_exec($connect, $add2) or die("$sql_btemp");
													} // end while $sqlsub2
												} //====  end  if �óշ�� �����Թ��ҵ���١ ��  material cat ��Ẻ sale set

												//===�óշ�� �����Թ��ҵ���١ ��  material cat ��Ẻ single
												else if (($row[MATERIAL_CAT] == '00')  ||  $row[MATERIAL_CAT] == '') {
													$price = number_format($row[price], 2, '.', ',$row[price]');
													$iddd = $row[COMPONENT_DESC];
													$vowels = array("'");
													$iddd2 = str_replace($vowels, " ", "$iddd ");
													$add = "insert into $temptable 
										  values ('$row[barcode]','$row[COMPONENT]','$iddd2',
										               '$row[QUANTITY]','$price')";
													$dbqueryb_temp1 = odbc_exec($connect, $add) or die("$sql_btemp");
												} //====  end  if �óշ�� �����Թ��ҵ���١ ��  material cat ��Ẻ single
												//ARTICLE, COMPONENT, COMPONENT_DESC, QUANTITY, MATERIAL_CAT

											} //==== end while �ó��������Թ��ҵ���١
											?>
                    <?
											$sql_show = "SELECT  * FROM  $temptable  ";
											$execshow = odbc_exec($connect, $sql_show) or die("cannot execute sql_show ");
											?>

                    <table class="table">
                        <tr>
                            <td bgcolor="#FFFFFF" class="pstylelos">Article</td>
                            <td bgcolor="#FFFFFF" class="pstylelos">DESC.</td>
                            <!--      <td bgcolor="#FFFFFF" class="pstylelos"><div align="center"><strong>Qut.</strong></div></td>
      <td width="40" bgcolor="#7489A6" class="style35 style4"><div align="center"><strong>Price</strong></div></td>-->
                        </tr>
                        <? while ($rower = odbc_fetch_array($execshow)) {   ?>
                        <tr>
                            <td bgcolor="#FFFFFF" class="pstylelos">
                                <? echo "$rower[article]"; ?>
                            </td>
                            <td bgcolor="#FFFFFF" class="pstylelos">
                                <? echo iconv("TIS-620","UTF-8",$rower[description]); ?>&nbsp; </td>
                            <td bgcolor="#FFFFFF" class="pstylelos">
                                <? echo "$rower[quantity]"; ?>
                            </td>
                            <td bgcolor="#FFFFFF" class="pstylelos">
                                <? echo "$rower[price]"; ?>
                            </td>
                        </tr>
                        <?
												} //============= end while �ʴ������� �ó��յ���١
												?>
                    </table>
                    <?
											$sql_show22 = "SELECT  * FROM  $temptable  ";
											$execshow22 = odbc_exec($connect, $sql_show22) or die("cannot execute sql_show ");
											while ($rower2 = odbc_fetch_array($execshow22)) {   ?>
                    <input name="articlearr[]" type="hidden" value="<?= "$rower2[article]"; ?>" />
                    <input name='descriptionarr[]' type="hidden" value='<? echo iconv("TIS-620","UTF-8",$rower2[description]); ?>' />
                    <input name="quantityarr[]" type="hidden" value="<?= "$rower2[quantity]"; ?>" />
                    <input name="pricearr[]" type="hidden" value="<?= "$rower2[price]"; ?>" />
                    <input name="barcodearr[]" type="hidden" value="<?= "$rower2[barcode]"; ?>" />
                    <?
											} //============= end while �ʴ������� �ó��յ���١

										} else { //echo "����������Թ��ҵ���١";
											$a = 'N';
											?>
                    <table class="table">
                        <tr>
                            <td bgcolor="#0000ff" class="pstylelo">Barcode</td>
                            <td bgcolor="#FFFFFF" class="pstylelos">
                                <? echo "$FirstOfbarcode"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#0000ff" class="pstylelo">Article</td>
                            <td bgcolor="#FFFFFF" class="pstylelos">
                                <? echo "$article"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#0000ff" class="pstylelo"><strong>Desc.</strong></td>
                            <td bgcolor="#FFFFFF" class="pstylelos">
                                <? echo $FirstOfdescription; ?>&nbsp;&nbsp; </td>
                        </tr>
                        <tr>
                            <td bgcolor="#0000ff" class="pstylelo"><strong>Unit.</strong></td>
                            <td bgcolor="#FFFFFF" class="pstylelos">
                                <? echo "$FirstOfunit"; ?>&nbsp;&nbsp; </td>
                        </tr>
                        <tr>
                            <td bgcolor="#0000ff" class="pstylelo"><strong>Price</strong></td>
                            <td bgcolor="#FFFFFF" class="pstylelos">
                                <? echo "$FirstOfprice"; ?>
                            </td>
                        </tr>
                    </table>
                    <span>
                        <?
									}	//end else if //===========�óշ������������Թ��ҵ���١


								} // ==== end if  $barcode <>''
								?>
                        <input name="a" type="hidden" value="<?= $a; ?>" />
                    </span>
                    <?
							} //========end  if(!isset($_POST['SaveRequestForm'])) {
							?>
                    <!-- <tr>
      <td>
          <input name="Submit" type="radio" value="radiobutton"  checked="checked" >
       <label for="radio"></label>
     </td>
    </tr> -->
            </table>
            <p class="pstylebutton"><button class="btn btn-primary btn-lg btn-block style6" type="submit"
                    name="SaveRequestForm">�ѹ�֡������ <p class="glyphicon glyphicon-floppy-saved"></p></button></p>
            <a href="MCreate_Precount.php" class="btn btn-info btn-lg btn-block style6" role="button"
                aria-pressed="true">����¹���˹� <p class="glyphicon glyphicon-search"></p></a>
            <a href="MInsert_Codeprecount.php?location=<?= $location; ?>" class="btn btn-info  btn-lg btn-block style6"
                role="button" aria-pressed="true">��ҹ�������� <p class="glyphicon glyphicon-repeat"></p></a>
            <a href="MIndex.php" class="btn btn-warning  btn-lg btn-block style6" role="button" aria-pressed="true">Home
                <p class="glyphicon glyphicon-home"></p></a>
        </form>
    </div>
</body>

</html>