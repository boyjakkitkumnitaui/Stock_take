<? 
session_start();
ob_start();
// header ('Content-Type: text/html; charset=windows-874');
 include ("chksess_b.php");
   include("../connect/connect.php");
   $sess_devicename = $_SESSION[sess_devicename]; 
?>
<script type="text/javascript">
function onKeyDown() {   
	var keycode;  
	if (window.event) 
 		keycode = window.event.keyCode;  
  if (keycode == 13) {// if Enter
		window.event.keyCode = 9;  
	}  
  
	if (keycode == 9) {// if Tab
//  window.event.keyCode = 13; 
		document.formA.submit();
	}  
  
  return true;
}

document.onkeydown = onKeyDown;
/*function setNextFocus(objId){
if (event.keyCode == 13){
var obj=document.getElementById(objId);
if (obj){
obj.focus();
}
}
}*/

/*function handleEnter(event){
var e=window.event?window.event:event;
var keyCode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;

 if (keycode == 9) {      
  window.event.keyCode = 13; 
  this.form.submit();
    }  
  return true;}


window.onload=function(){
var a=document.formA;
for(var i=0;i<a.elements.length;i++){
var e=a.elements[i];
e.onkeypress=handleEnter;
}
}*/

function check_re() {
	var num = document.formA.num.value
//	alert('num: '+num);
	for(i=0;i<num;i++){
		var qty = document.getElementsByName("qty"+i)[0]
		//alert(qty);
		if(qty.value=='')
		{
			alert('Please enter at least one major (°√ÿ≥“„ Ë¢ÈÕ¡Ÿ≈Õ¬Ë“ßπÈÕ¬ 1 À≈—°)');
			qty.focus();
			return false;
		}
	}
	// Alter by sompong.so	2.Oct.2018

	// if(document.formA.qty0.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty0.focus();
	// 	return false;
	// }	
	// 		if(document.formA.qty1.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty1.focus();
	// 	return false;
	// }	
	// if(document.formA.qty2.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty2.focus();
	// 	return false;
	// }	

	// 	if(document.formA.qty3.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty3.focus();
	// 	return false;
	// }	
	// 	if(document.formA.qty4.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty4.focus();
	// 	return false;
	// }	
	// 	if(document.formA.qty5.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty5.focus();
	// 	return false;
	// }	
	// 	if(document.formA.qty6.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty6.focus();
	// 	return false;
	// }	
	// 	if(document.formA.qty7.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty7.focus();
	// 	return false;
	// }
	// if(document.formA.qty8.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty8.focus();
	// 	return false;
	// }
	// if(document.formA.qty9.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty9.focus();
	// 	return false;
	// }
	// if(document.formA.qty10.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty10.focus();
	// 	return false;
	// }
	// if(document.formA.qty11.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty11.focus();
	// 	return false;
	// }
	// if(document.formA.qty12.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty12.focus();
	// 	return false;
	// }
	// if(document.formA.qty13.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty13.focus();
	// 	return false;
	// }
	// if(document.formA.qty14.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty14.focus();
	// 	return false;
	// }
	// if(document.formA.qty15.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty15.focus();
	// 	return false;
	// }
	// if(document.formA.qty16.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty16.focus();
	// 	return false;
	// }
	// if(document.formA.qty17.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty17.focus();
	// 	return false;
	// }
	// if(document.formA.qty18.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty18.focus();
	// 	return false;
	// }
	// if(document.formA.qty19.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty19.focus();
	// 	return false;
	// }
	// if(document.formA.qty20.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty20.focus();
	// 	return false;
	// }
	// if(document.formA.qty21.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty21.focus();
	// 	return false;
	// }
	// if(document.formA.qty22.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty22.focus();
	// 	return false;
	// }
	// if(document.formA.qty23.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty23.focus();
	// 	return false;
	// }

	// if(document.formA.qty24.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty24.focus();
	// 	return false;
	// }
	// if(document.formA.qty25.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty25.focus();
	// 	return false;
	// }
	// if(document.formA.qty26.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty26.focus();
	// 	return false;
	// }
	// if(document.formA.qty27.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty27.focus();
	// 	return false;
	// }
	// if(document.formA.qty28.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty28.focus();
	// 	return false;
	// }
	// if(document.formA.qty29.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty29.focus();
	// 	return false;
	// }
	// if(document.formA.qty30.value.length<1)
	// {
	// 	alert('Please enter at least one major (Ô£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇÔ£ˇ?Ô£ˇÔ£ˇÔ£ˇÔ£ˇ 1 Ô£ˇÔ£ˇ?)');
	// 	document.formA.qty30.focus();
	// 	return false;
	// }	
	//document.formA.submit();
}

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<title> √È“ß„∫ Pre-Count & ∫—π∑÷°¬Õ¥π—∫</title>
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
      font-size: 16px;
      text-align: center;
    }

    .pstylebutton {
      text-align: center;
    }
	.pstyle7{
		font-size: 16px;
		word-wrap: break-word;
		width: 75px;
		/* text-align: center; */
	}
</style>
</head>

<body onLoad="document.formA.qty0.focus();">
	<p></p>
	<div class="container">
<form name="formA"  onSubmit="return check_re();"  method="post" action="Insert_Codeprecount_AddQty.php">
	<div class="form-group"><p class="pstylehead"> &nbsp; Location No :
          <? 
$location = strtoupper($location);
echo "$location";?>
	  </p></div>
	  <div class="form-group"><p class="pstylehead"><? echo "STOCK TAKE  “¢“ ("."$SESS_BRANCH".")";?></p></div>
  <table class="table">
	  <?
//=================°√≥’¡’°“√∫—π∑÷°¢ÈÕ¡Ÿ≈
		if(($SaveRequestForm)  or ($SaveRequestForm2 != '')) {
	  
			include("../connect/connect.php");
	//echo "SESS_BRANCH";
	///µ√«® Õ∫«Ë“‡§¬¡’°“√∫—π∑÷°¢ÈÕ¡Ÿ≈„πµ“√“ß Upstock ·≈È«À√◊Õ‰¡Ë		
			$sql_ck="SELECT  totalck FROM UPSTOCK_TOTALCHK 
            	WHERE   LOCATION ='$location'
							AND  BRANCH_ID ='$SESS_BRANCH'  ";
			$exec_ck  = odbc_exec($connect,$sql_ck) or die ("cannot execute query ");
			$totalck= odbc_result($exec_ck,"totalck");
			
			if($totalck>0){
				$chk_lo='U'; //‡§¬¡’°“√∫—π∑÷°·≈È«
			}else{
				$chk_lo='';
			}
			//echo "$location";
			if($location!=''){
				$date_now=date("m/d/Y H:i:s");
				$b='-1';
				//echo "$num";
				$num=$num+1;
				for($i=1;$i<=$num;$i++){
					$chk_ar="SELECT count(*) as totalar FROM UPSTOCK 
											WHERE  ARTICLE = '$ARTICLE[$i]'
								AND  LOCATION ='$location'
								AND  BRANCH_ID ='$SESS_BRANCH'  ";
					$exec_chkar  = odbc_exec($connect,$chk_ar) or die ("cannot execute query ");
					$totalar= odbc_result($exec_chkar,"totalar");
					$b++;
 					$qty= "qty"."$b";
					if($totalar==0){
						$add ="insert into UPSTOCK values ('$BARCODE[$i]','$ARTICLE[$i]','$QUANTITY[$i]','${$qty}','$location','$date_now','$SESS_BRANCH','$sess_devicename')";
						//echo $add;
						if(trim(${$qty})!=''){
							odbc_exec ($connect,$add) or die("<br>Query failed in insert data");
						}
						$addck ="INSERT INTO UPSTOCK_LOG
						VALUES ('$BARCODE[$i]' ,'$ARTICLE[$i]' ,'$QUANTITY[$i]','${$qty}' ,'999.99' ,'$chk_lo','$location'
						,'$date_now','','$date_now' ,'$SESS_BRANCH','$sess_devicename')";
						if(trim(${$qty})!=''){
							odbc_exec ($connect,$addck) or die("<br>Query failed in insert data02");
						}

					}else{
						$query_edit = "UPDATE UPSTOCK SET QTY= QTY+${$qty}  ,DATEUP ='$date_now',DEVICE_NAME='$sess_devicename'
														WHERE ARTICLE = '$ARTICLE[$i]'
											AND  LOCATION ='$location'
											AND  BRANCH_ID ='$SESS_BRANCH'";
						if(trim(${$qty})!=''){
							odbc_exec($connect,$query_edit) or die("Query failed in update data");
						}
						$query_editck = "	UPDATE  UPSTOCK_LOG
						SET QTY2 = QTY2+${$qty},DATEUP02 = '$date_now',DEVICE_NAME='$sess_devicename'
						WHERE BARCODE ='$BARCODE[$i]'
						AND ARTICLE = '$ARTICLE[$i]'
						AND  LOCATION ='$location'
						AND  BRANCH_ID ='$SESS_BRANCH' ";
						if(trim(${$qty})!=''){
							odbc_exec($connect,$query_editck) or die("Query failed in update data02");
						}

					} 
					if ($i==$num) {
						echo '<script language="javascript">';
						echo 'alert("∫—π∑÷°¢ÈÕ¡Ÿ≈ ”‡√Á®")';
						echo '</script>';
						echo "<meta http-equiv=\"refresh\"  content=\"0;url=Insert_Codeprecount.php?location=$location\">";
						//header("location:Insert_Codeprecount.php?location=$location");
					}
				}
			}
		}//====end if location
 //==================================================================
  //==================================================================
  //==================================================================
  //======================®∫ °√≥’¡’°“√∫—π∑÷°¢ÈÕ¡Ÿ≈
?>
<?
if(!isset($_POST['SaveRequestForm'])) {

	//================· ¥ß¢ÈÕ¡Ÿ≈„∫ Precount
	/*$sql_show="SELECT PRECOUNT.BARCODE, PRECOUNT.ARTICLE, PRECOUNT.DESCRIPTION, PRECOUNT.QUANTITY, UPSTOCK.QTY, UPSTOCK.DATEUP, UPSTOCK.LOCATION, UPSTOCK.BRANCH_ID, PRECOUNT.PRECOUNT_RUN
	FROM UPSTOCK 
	FULL  JOIN PRECOUNT ON (PRECOUNT.ARTICLE = UPSTOCK.ARTICLE) 
	AND (PRECOUNT.LOCATION = UPSTOCK.LOCATION) 
	WHERE  PRECOUNT.BRANCH_ID='$SESS_BRANCH' 
	AND  PRECOUNT.LOCATION = '$location%'  
	ORDER BY PRECOUNT.PRECOUNT_RUN";*/
	$sql_show="SELECT PRECOUNT.BARCODE, PRECOUNT.ARTICLE
	, PRECOUNT.AR_MOTHER
	, PRECOUNT.DESC_MOTHER
	, PRECOUNT.DESCRIPTION, PRECOUNT.QUANTITY, PRECOUNT.LOCATION, UPSTOCK.QTY
	FROM UPSTOCK 
	RIGHT JOIN PRECOUNT ON (UPSTOCK.LOCATION = PRECOUNT.LOCATION) 
	AND (UPSTOCK.BRANCH_ID= PRECOUNT.BRANCH_ID)
	AND (UPSTOCK.ARTICLE = PRECOUNT.ARTICLE)

	WHERE (PRECOUNT.LOCATION='$location' )
	AND (PRECOUNT.BRANCH_ID='$SESS_BRANCH' )
	AND  (PRECOUNT.BARCODE = '$barcode' or PRECOUNT.ARTICLE ='$barcode'  or PRECOUNT.AR_MOTHER ='$barcode')
	ORDER BY  LEFT(PRECOUNT.ARTICLE,2),PRECOUNT.PRECOUNT_RUN";

	$exec_show = odbc_exec($connect,$sql_show) or die ("cannot execute queryshow ");
?>

  <input name="barcode" type="hidden" value="<? echo "$barcode";?>" />
  <input name="location" type="hidden" value="<? echo "$location";?>" />
  <tr>
    <td bgcolor="#7489A6" class="pstyle">Article</td>
    <td bgcolor="#7489A6" class="pstyle">DESC.</td>
	<td bgcolor="#7489A6" class="pstyle">Qty.</td>
</tr>
	<? 
	$i=0; $p=1;  $u='-1';
	while($rower = odbc_fetch_array($exec_show)) {   
		$p++;
	?>
	
	<? 
	if(($rower[ARTICLE] !=$rower[ AR_MOTHER]) and  ($chk_ar != $rower[ AR_MOTHER] )){
	?>
  <tr>
    <td>+<? echo "$rower[AR_MOTHER]";?></td>
    <td><? echo iconv("TIS-620","UTF-8",$rower[DESC_MOTHER]);?></td>
    </tr>
  <? }?>
  <tr class="table-light">
    <td><p class="pstylelo">
	<? 
	$i++;
	echo "$rower[ARTICLE]";?>
      <input type="hidden" name="<? echo "ARTICLE[$i]";?>" value="<? echo $rower[ARTICLE];?>" />
      <input type="hidden" name="<? echo "BARCODE[$i]";?>" value="<? echo $rower[BARCODE];?>" />
	  </p></td>
    <td><p class="pstyle7">
		<? echo $rower[DESCRIPTION];?>
      <input type="hidden" name="<? echo "DESCRIPTION[$i]";?>" value='<? echo "$rower[DESCRIPTION]";?>'/>
      <input type="hidden" name="<? echo "QUANTITY[$i]";?>"  value="<? echo "$rower[QUANTITY]";?>"/></td>
    </p><td><p class="pstylelo">
    
<SCRIPT language="JavaScript">
function ver(input,key){//  keyCode §◊Õ®—∫§Ë“¢Õß√À—  keyboard

     if((key.keyCode==13)&&(input.value.length<1)){
  			    if(confirm('do you watn to set input field =0')){
    						  input.value=0;
	 							//	 document.formA.SaveRequestFormR.focus();
     				 }else{
 						 //    input.focus();
     						 document.formA.SaveRequestFormR.focus();
      							}
     }
}
</SCRIPT>
	 <?
		//echo "$rower[QTY]";  
		
		$u++;
		if($rower[QTY] !=''){
		 $qqty=number_format($rower[QTY], 0, '.',',$rower[QTY]' );   }
		 ?>
         <? $bar="qty"."$u";?>
		 <? echo "$rower[QTY]";?>+ 
		 <input  name="<? echo "$bar";?>" type="text" size="1" maxlength="5" onKeyDown=" ver(this,event);" autocomplete="off" style="font-size: 16px"></p></td>
		 
	</tr>	 
    <? 
 $chk_ar = $rower[ AR_MOTHER];
	   } //============= end while · ¥ß¢ÈÕ¡Ÿ≈ °√≥’¡’µ—«≈Ÿ°
?>
<input type="hidden" name="num" value="<? echo $i;?>" />
<?
}//========end  if(!isset($_POST['SaveRequestForm'])) {
?>
</table>
  <input type="submit" name="SaveRequestForm" class="btn btn-success btn-lg btn-block style6" value="∫—π∑÷°¢ÈÕ¡Ÿ≈">
  <a href="Create_Precount.php" class="btn btn-info btn-lg btn-block style6" role="button" aria-pressed="true">‡ª≈’Ë¬πµ”·ÀπËß <p class="glyphicon glyphicon-search"></p></a>
  <a href="Insert_Codeprecount.php?location=<?=$location;?>" class="btn btn-info btn-lg btn-block style6" role="button" aria-pressed="true">ÕË“π√À— „À¡Ë <p class="glyphicon glyphicon-repeat"></p></a>
  <a href="MIndex.php" class="btn btn-warning  btn-lg btn-block style6" role="button" aria-pressed="true">Home <p class="glyphicon glyphicon-home"></p></a>
</form>
</div>
</body>
</html>