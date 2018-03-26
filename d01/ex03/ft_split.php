#!/usr/bin/php
<?PHP
function ft_split($str)
{
	$my_tab = preg_split("/\s+/", $str);
	return ($my_tab);
}
print_r(ft_split("Hello    World AAA"));
?>
