<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
<p>
  <? include ("../connect/connect.php");
$sql="SELECT [ARTICLE]
FROM [CountStock_ILM].[dbo].[PRECOUNT]
WHERE  LOCATION ='204120112001'
ORDER BY LEFT(ARTICLE,2),PRECOUNT_RUN";
 $exec = odbc_exec($connect,$sql) or die ("cannot execute querygv ");
                         $array_art=array();
						         while($row = odbc_fetch_array($exec)) 
							      {
									  
								    array_push($array_art,trim($row[ARTICLE]));
							
								  }
							print_r($array_art);
							echo "</br>";echo "</br>";echo "</br>";echo "</br>";
							?>
</p>
<p>//STEP1----�֧��� Article ���˹��á</p>
<p>&nbsp;
  <?	
          $Article = array_shift($array_art);
		//   var_dump($Article);
		   echo "�����Թ���"."$Article";
	       echo "</br>";?>
</p>
<p>
//STEP 2 USER ��Ǩ�ͺ��� Article ����繤ҷ���ͧ����������</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 //-------�ó� YES  		- ����¡�� �ѹ�֡�ʹ�Ѻ 
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	//		- �к� POP Array ����á�͡�ҡ  array[]
</p>
<p>&nbsp;
  &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;		
  <?	
			print_r($array_art);//�ʴ� member � array ��� Shiff ����
			echo "</br>";
		  
											?>
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 --- Go To STEP 3
</p>
<p>&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 //-------�ó� NO  		  &nbsp; -  User �ӡ���к������Թ����ͧ&nbsp;�к��ӡ�ä׹��� Array[] ��� POP �͡�ҡ�Ѻ��� Array[]</p>
<p>&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	
<? 

array_unshift($array_art, $Article);
			print_r($array_art);//�ʴ� member � array ��� �׹��� ����
			echo "</br>";
?>
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
// - �к���Ǩ�ͺ��� Article �������� Precount �����������&nbsp;  [30] =&gt; 120012540 </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; //-------�ó� YES	
  //- ����¡�� �ѹ�֡�ʹ�Ѻ 
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	//- �к� POP Array ��Ƿ���к��͡�ҡ   array[] ** Array ���ŧ</p>
<p>&nbsp;
  &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;
  	<?													   //$difArt=array($array_art[0]);//��ҡ��ź���������ա�����§���� Member ŧ�
															$difArt=array("120012540");
																$difArt=array("120012540");
															$array_art = array_diff($array_art, $difArt); //�������ѡ���� array_diff ������ФѺ
															
															print_r($array_art);//�ʴ� member � array ��� Diff ����
															echo "</br>";
															
															
$array1 = array(1,2,3,4,5);
$array2 = array(2,4);
$result = array_diff($array1, $array2);
 
print_r($result);
												?>			
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	//-------�ó� NO
  // �к� �ӡ�úѹ�֡ ������ Article ���� �������駺ѹ�֡�ʹ�Ѻ</p>
<p>&nbsp;</p>
<p> //STEP3-----�֧��� Article ���˹觷�� 1	�ա����
  //��Ǩ�ͺ��� Array ��ҧ ? </p>
        &nbsp;	&nbsp;		<?	
															
															print_r($array_art);//�ʴ� member � array ��� Diff ����
															echo "</br>";
		print_r($array_art[0]);  ///-----------------> ��Ѻ价� STEP 1
?>
</body>
</html>