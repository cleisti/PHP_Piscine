<?php
session_start();
// date_default_timezone_set('Europe/Helsinki');

if ($_SESSION('logged_on_user'))
{
	$login = $_SESSION['logged_on_user'];
	$filename = '../private/chat';

	if ($_POST['msg'])
	{
		$fp = fopen($filename, "w+");
		flock($fp, LOCK_EX);
		echo $fp;
		fclose($fp);
	}
}
?>

<html>
	<head>
	<!-- <script langage="javascript">top.frames['chat'].location = 'chat.php';</script> -->
	</head>
<body>
<form action="speak.php" method="post">
	<input type="text" name="msg" value="" />
	<input type="submit" name="submit" value="Send"/>
</form>
</body>
</html>