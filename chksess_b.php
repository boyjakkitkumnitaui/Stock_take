<? session_start();
header ('Content-Type: text/html; charset=windows-874');
if (($sess_id <> session_id()) or ($SESS_BRANCH == '') or ($SESS_STOCK == '')) {
	$massage = "Login Timeout Please Login Again";
	echo "<meta http-equiv=refresh content=0;MLogin.php?massage=$massage></a></div>";
	exit();
	
}
