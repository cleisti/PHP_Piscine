<?php
session_start();
if (!$_SESSION['logged_on_user'])
    exit("ERROR\n");
else
{
    $directory = '../private';
	$filename = '../private/chat';
    
    if (file_exists($directory) && file_exists($filename))
    {
        $str = file_get_contents('../private/chat');
        $array = unserialize($str);
        foreach ($array as $message) {
            echo "[" . date('h:i', $message['time']) . "] <b>" . $message['login'] . "</b>: " . $message['msg'] . "<br />\n";
        }
    }
}
?>