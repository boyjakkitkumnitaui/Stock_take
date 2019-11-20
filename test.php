<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<script language="javascript">
function fncSubmit()
{
    if(confirm('Confirm to submit')==true)
    {
        return true;
    }
    else
    {
        return false;
    }
} 
</script>
<form action="page.cgi" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
<input name="txtName" type="text" id="txtName" size="1" maxlength="0" OnFocus="JavaScript:fncAlert();">
<input name="btnSubmit" type="submit" value="Button">
</form>
</body>
</html> 

