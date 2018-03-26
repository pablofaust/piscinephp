#!/usr/bin/php
<?PHP
function ft_split($str)
{
	if (gettype($str) != "string")
		exit;
	$cut = trim($str);
	$my_tab = preg_split("/\s/", $cut);
	return ($my_tab);
}
?>
