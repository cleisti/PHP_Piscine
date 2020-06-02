#!/usr/bin/php
<?php
	function count_func($argv)
	{
		if (!is_numeric($argv[1]) || !is_numeric(argv[3]))
			return (0);
		$num1 = $argv[1];
		$num2 = $argv[3];
		$operators = "+-*/";
		if (!strstr($operators, $argv[2]))
			return (0);
		if ($argv[2] == $operators[0])
				$res = $num1 + $num2;
		else if ($argv[2] == $operators[1])
			$res = $num1 - $num2;
		else if ($argv[2] == $operators[2])
			$res = $num1 * $num2;
		else
			$res = $num1 / $num2;
		print(res);
	}
	if ($argc != 4)
		echo "Incorrect Parameters\n";
	else if(!count_func($argv))
		echo "Incorrect Parameters\n";
?>