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
<p>//STEP1----ดึงค่า Article ตำแหน่งแรก</p>
<p>&nbsp;
  <?	
          $Article = array_shift($array_art);
		//   var_dump($Article);
		   echo "รหัสสินค้า"."$Article";
	       echo "</br>";?>
</p>
<p>
//STEP 2 USER ตรวจสอบค่า Article ว่าเป็นคาที่ต้องการหรือไม่</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 //-------กรณี YES  		- ทำรายการ บันทึกยอดนับ 
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	//		- ระบบ POP Array ตัวแรกออกจาก  array[]
</p>
<p>&nbsp;
  &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;		
  <?	
			print_r($array_art);//แสดง member ใน array ที่ Shiff แล้ว
			echo "</br>";
		  
											?>
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 --- Go To STEP 3
</p>
<p>&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 //-------กรณี NO  		  &nbsp; -  User ทำการระบุรหัสสินค้าเอง&nbsp;ระบบทำการคืนค่า Array[] ที่ POP ออกมากลับสู่ Array[]</p>
<p>&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	&nbsp;&nbsp;	
<? 

array_unshift($array_art, $Article);
			print_r($array_art);//แสดง member ใน array ที่ คืนค่า แล้ว
			echo "</br>";
?>
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
// - ระบบตรวจสอบว่า Article มีอยู่ในใบ Precount แล้วหรือไม่&nbsp;  [30] =&gt; 120012540 </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; //-------กรณี YES	
  //- ทำรายการ บันทึกยอดนับ 
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	//- ระบบ POP Array ตัวที่ระบุออกจาก   array[] ** Array สั้นลง</p>
<p>&nbsp;
  &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;
  	<?													   //$difArt=array($array_art[0]);//อยากจะลบอะไรเพิ่มอีกก้อเพียงเพิ่ม Member ลงไป
															$difArt=array("120012540");
																$difArt=array("120012540");
															$array_art = array_diff($array_art, $difArt); //คำสั่งหลักๆก็คือ array_diff นี่แหละคับ
															
															print_r($array_art);//แสดง member ใน array ที่ Diff แล้ว
															echo "</br>";
															
															
$array1 = array(1,2,3,4,5);
$array2 = array(2,4);
$result = array_diff($array1, $array2);
 
print_r($result);
												?>			
</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	//-------กรณี NO
  // ระบบ ทำการบันทึก ข้อมูล Article ใหม่ พร้อมทั้งบันทึกยอดนับ</p>
<p>&nbsp;</p>
<p> //STEP3-----ดึงค่า Article ตำแหน่งที่ 1	อีกครั้ง
  //ตรวจสอบว่า Array ว่าง ? </p>
        &nbsp;	&nbsp;		<?	
															
															print_r($array_art);//แสดง member ใน array ที่ Diff แล้ว
															echo "</br>";
		print_r($array_art[0]);  ///-----------------> กลับไปทำ STEP 1
?>
</body>
</html>