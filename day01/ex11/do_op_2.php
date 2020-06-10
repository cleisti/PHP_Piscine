#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		if (preg_match('\p{L})')
		preg_match_all('!\d+!', $argv[1], $numbers);
		print_r($numbers);
	}
	else
		echo "Incorrect Parameters\n";
?>