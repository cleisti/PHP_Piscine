<?php
function ft_split($input)
{
	$array = explode(" ", "$input");
	$refined = array_filter($array);
	sort($refined);
	return ($refined);
}
?>