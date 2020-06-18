<?php
header('content-type: text/plain');
session_start();

if (isset($_GET['submit']) && $_GET['submit'] === 'OK')
{
	if (isset($_GET['login']) && isset($_GET['passwd']))
	{
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
}
?>

<html><body>
<form action="" method="get">
	Username: <input type="text" name="login" value="<?= $_SESSION['login']; ?>" />
	<br />
	Password: <input type="text" name="passwd" value="<?= $_SESSION['passwd']; ?>" />
	<input type="submit" name="submit" value="OK" />"
</form>
</body></html>
