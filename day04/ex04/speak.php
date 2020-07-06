<?php
session_start();
if (!$_SESSION['logged_on_user'])
	exit("ERROR\n");
else
{
	$login = $_SESSION['logged_on_user'];
	$msg = $_POST['msg'];
	$directory = '../private';
	$filename = '../private/chat';

	if (file_exists($directory) === FALSE)
		mkdir($directory);
	if (file_exists($filename) === FALSE)
		file_put_contents($filename, null);
	
	if ($_POST['msg'])
	{
		$fp = fopen($filename, "r+");
		flock($fp, LOCK_EX);
		$str = file_get_contents($filename);
		$array = unserialize($str);
		$new_message['login'] = $login;
		$new_message['time'] = time();
		$new_message['msg'] = $msg;
		$array[] = $new_message;
		$data = serialize($array);
		file_put_contents($filename, $data);
		fclose($fp);
	}
?>
<html>
	<head>
	<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
<body>
<form action="speak.php" method="post">
	<input type="text" name="msg" value="" />
	<input type="submit" name="submit" value="Send"/>
</form>
</body>
<?php
}