#!/usr/bin/php
<?PHP
function ft_split($str)
{
	if (gettype($str) != "string")
		exit;
	$cut = trim($str);
	$my_tab = preg_split("/\s/", $cut);
	asort($my_tab);
	return ($my_tab);
}
if ($argc <= 1)
	return (NULL);
$array = [];
for ($i = 1; $i < $argc; $i++)
	$array[] = ft_split($argv[$i]);
foreach ($array as $arg)
	foreach ($arg as $split)
		$new_tab[] = $split;
asort($new_tab);
foreach ($new_tab as $word)
	echo $word."\n";
?>
