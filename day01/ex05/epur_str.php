#!/usr/bin/php
<?php
	$stripped = trim(preg_replace('/\s+/', ' ', $argv[1]));
	echo "$stripped\n";
?>