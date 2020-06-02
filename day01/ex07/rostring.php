#!/usr/bin/php
<?php
	$stripped = trim(preg_replace('/\s+/', ' ', $argv[1]));
	$arr = explode(' ', $stripped);
	$fixed = array_shift($arr);
	array_push($arr, $fixed);
	$string = implode(' ', $arr);
	printf("$string\n");
?>