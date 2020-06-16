#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$trimmed = trim(preg_replace('/\s+/', '', $argv[1]));
		$operator = strpbrk($trimmed, "+-*/%");
		$numbers = preg_split('/[%*+\/\-\\\\]/', $trimmed);

		if (!preg_match('/^[%*+\-\/\ 0-9]/', $trimmed) || count($numbers) != 2)
			exit ("Syntax Error\n");
		
		if ($operator[0] == '+')
			print($numbers[0] + $numbers[1]);
		else if ($operator[0] == '-')
			print($numbers[0] - $numbers[1]);
		else if ($operator[0] == '*')
			print($numbers[0] * $numbers[1]);
		else if ($operator[0] == '/')
			print($numbers[0] / $numbers[1]);
		else if ($operator[0] == '%')
			print($numbers[0] % $numbers[1]);
		echo "\n";
	}
	else
		echo "Incorrect Parameters\n";
?>