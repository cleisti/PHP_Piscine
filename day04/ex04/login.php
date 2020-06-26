<?php
require_once 'auth.php';
// require_once 'chat.php';
require_once 'speak.php';
session_start();

if (auth($_POST['login'], $_POST['passwd']) === TRUE)
{
    $_SESSION['logged_on_user'] = $_POST['login'];
    ?>
    <form>
        <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
        <iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
        <input name="logout" formaction="logout.php" type="submit" value="Log out" />
    </form>
    <?php
}
else
{
    $_SESSION['logged_on_user'] = "";
    echo "ERROR\n";
}
?>