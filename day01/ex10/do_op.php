#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		if (strstr($argv[2], '+'))
			print($argv[1] + $argv[3]);
		else if (strstr($argv[2], '-'))
			print($argv[1] - $argv[3]);
		else if (strstr($argv[2], '*'))
			print($argv[1] * $argv[3]);
		else if (strstr($argv[2], '/'))
			print($argv[1] / $argv[3]);
		else if (strstr($argv[2], '%'))
			print($argv[1] % $argv[3]);
		print "\n";
	}
	else
		echo "Incorrect Parameters\n";
?>