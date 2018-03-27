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
$i = 1;
for ($i = 1; $i < $argc; $i++)
	$array[] = ft_split($argv[$i]);
foreach ($array as $arg)
{
	foreach ($arg as $split)
	{
		if (ctype_digit($split))
			$numbers[] = $split;
		else if (ctype_alpha($split))
			$letters[] = $split;
		else
			$symbols[] = $split;
	}
}
sort($letters, SORT_NATURAL | SORT_FLAG_CASE);
sort($numbers, SORT_NATURAL | SORT_FLAG_CASE);
sort($symbols, SORT_NATURAL | SORT_FLAG_CASE);
foreach ($letters as $letter)
	echo "lettre = $letter\n";
foreach ($numbers as $number)
	echo "nombre = $number\n";
foreach ($symbols as $symbol)
	echo "symbole = $symbol\n";

?>
