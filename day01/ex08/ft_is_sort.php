<?php
function ft_is_sort($tab)
{
	$original = $tab;
	sort($tab);
	return ($tab == $original);
}
?>