<?php
    if ($_POST['submit'] === 'OK')
    {
        $directory = 'private';
        $filename = 'private/passwd';
        if (file_exists($directory) === FALSE)
            mkdir($directory);
        if ($_POST['login'] && $_POST['passwd'])
        {
            $login = $_POST['login'];
            $passwd = hash('whirlpool', $_POST['passwd']);
            if (file_exists($filename))
            {
                $str = file_get_contents($filename);
                $array = unserialize($str);
                $len = count($array);
                foreach ($array as $key => $value)
                {
                    if ($value['login'] === $login)
                    {
                        echo "ERROR\n";
                        exit;
                    }
                }
            }
            if (!$len)
                $len = 0;
            $array[$len]['login'] = $login;
            $array[$len]['passwd'] = $passwd;
            $data = serialize($array);
            file_put_contents($filename, $data);
            echo "OK\n";
        }
        else
        {
            echo "ERROR\n";
            exit;
        }
    }
    else
    {    
        echo "ERROR\n";
        exit;
    }
    exit;
?>