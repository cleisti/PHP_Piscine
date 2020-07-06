#!/usr/bin/php
<?php
if ($argc > 1)
{
	$trimmed = trim(preg_replace('/\s+/', ' ', $argv[1]));
	echo "$trimmed\n";
}
?>