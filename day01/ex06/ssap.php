#!/usr/bin/php
<?php
if ($argc > 1)
{
	$array = array();
	$i = count($argv);
	$x = 1;
	while ($x < $i)
	{
		$several = explode(" ", "$argv[$x]");
		$array = array_merge($array, $several);
		$x++;
	}
	sort($array);
	$i = count($array);
	for ($x = 0; $x < $i; $x++)
		echo "$array[$x]\n";
}
?>