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
if ($argc <= 1)
	return (NULL);
$tab = ft_split($argv[1]);
$length = count($tab);
echo $tab[$length - 1];
for ($i = 0; $i < $length - 1; $i++)
	echo " ".$tab[$i];
echo "\n";
?>
