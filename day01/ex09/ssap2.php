#!/usr/bin/php
<?php
	$array = array();
	$i = count($argv);
	$x = 1;
	while ($x < $i)
	{
		$several = explode(" ", "$argv[$x]");
		$array = array_merge($array, $several);
		$x++;
	}
	// sort($array);
	// $i = count($array);
	// for ($x = 0; $x < $i; $x++)
	// 	echo "$array[$x]\n";


	$alpha = array();
	$number = array();
	$other = array();

	$i = count($array);
	for ($x = 0; $x < $i; $x++)
	{
		if (($array[$x][0] >= A && $array[$x][0] <= Z) || ($array[$x][0] >= a && $array[$x][0] <= z))
			array_push($alpha, $array[$x]);
		else if ($array[$x][0] >= '0' && $array[$x][0] <= '9')
			array_push($number, $array[$x]);
		else
			array_push($other, $array[$x]);
	}
	// natcasesort($alpha);
	sort($alpha, SORT_NATURAL);
	sort($number, SORT_STRING);
	sort($other);
	$final = array();
	$final = array_merge($alpha, $number, $other);
	$i = count($final);
	for ($x = 0; $x < $i; $x++)
		echo "$final[$x]\n";
?>