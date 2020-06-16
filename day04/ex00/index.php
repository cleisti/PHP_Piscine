<?php
header('content-type: text/plain');
session_start();

if ($_GET['submit'] === 'OK')
{
	if ($_GET['login'] && $_GET['passwd'])
	{
		$_SESSION['user'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
}
?>

<html>
<body>
<form action="" method="get">
Username: <input type="text" name="login" value="<?php = $_SESSION['user'] ?>"/><br />
Password: <input type="text" name="passwd" value="<?php = $_SESSION['passwd'] ?>"/><br />
	<input type="submit" name="submit" value="OK"/>"
</form>
</body>
</html>
