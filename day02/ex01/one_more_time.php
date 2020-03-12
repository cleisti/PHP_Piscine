#!/usr/bin/php
<?php
function more_time($str)
{
	$array = explode(' ', $str);
	$final = array();

	if (substr_count($str, ' ') !== 4)
		return (0);

	if (count($array) != 5)
		return (0);
	$weekdays = array("lundi", "mardi", "mercerdi", "jeudi", "vendredi", "samedi", "dimanche");
	$weekdays2 = array("Lundi", "Mardi", "Mercerdi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
	$day = array_shift($array);
	if (array_search($day, $weekdays) !== FALSE)
		$d = array_search($day, $weekdays) + 1;
	else if (array_search($day, $weekdays2) !== FALSE)
		$d = array_search($day, $weekdays2) + 1;
	else
		return (0);

	$date = array_shift($array);
	if (strlen($date) !== 2)
		return (0);
	for ($x = 0; $x < 2; $x++)
	{
		if (!preg_match("/[0-9]/", $date[$x]))
			return (0);
	}
	if ($date > 31)
		return (0);
	array_push($final, $date);

	$months = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "décembre");
	$months2 = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
	$month = array_shift($array);
	if (array_search($month, $months) !== FALSE)
		$m = array_search($month, $months);
	else if (array_search($month, $months2) !== FALSE)
		$m = array_search($month, $months2);
	else
		return (0);
	$english = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$month = $english[$m];
	array_push($final, $month);

	$year = array_shift($array);
	if (strlen($year) !== 4)
		return (0);
	for ($x = 0; $x < 4; $x++)
	{
		if (!preg_match("/[0-9]/", $year[$x]))
			return (0);
	}
	if ($year < 1970)
		return (0);
	array_push($final, $year);

	$time = explode(':', array_shift($array));
	if (count($time) !== 3)
		return (0);
	for ($x = 0; $x < 3; $x++)
	{
		if (strlen($time[$x]) > 2)
			return (0);
	}
	if ($time[0] > 23 || $time[1] > 59 || $time[2] > 59)
		return (0);
	array_push($final, implode(':', $time));
	
	return $final;
}
	if (!$arr = more_time($argv[1]))
	{
		echo "Wrong Format\n";
		exit ;
	}
	$timestr = implode(' ', $arr);
	$time = strtotime($timestr) - 3600;
	echo $time;
?>