#!/usr/bin/php
<?php
if ($argc > 2)
{
    $key = $argv[1];
    $i = 2;
    while ($i < $argc)
    {
        if (strstr($argv[$i], $key))
        {
            $split = preg_split('/:/', $argv[$i]);
            if (count($split) == 2)
            {
                $value = $split[1];
                echo $value."\n";
            }
        }
        $i++;
    }
    if ($value)
        echo $value."\n";
}
?>