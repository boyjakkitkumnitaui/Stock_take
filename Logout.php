<? session_start();
	unset( $_SESSION['sess_id']);//���¡��ԡ session ���ź����÷�����
	unset($_SESSION['sess_username']);
	unset($_SESSION['enpass']);
	unset($_SESSION['pass']);
	unset($_SESSION['sess_devicename']);
	
	session_destroy();//��ҧsession
	header ('Content-Type: text/html; charset=UTF-8');
	header('location:MLogin.php');
?>
