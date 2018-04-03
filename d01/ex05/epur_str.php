#!/usr/bin/php
<?PHP
if ($argc <= 1 || $argc > 2)
	return (NULL);
else
{
	$string = preg_replace('/\s+/', ' ', $argv[1]);
	$string = trim($string);
		echo $string."\n";
}
?>
