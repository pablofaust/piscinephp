#!/usr/bin/php
<?PHP
	if ($argc != 4)
	{
		echo "Incorrect Parameters\n";
		return (NULL);
	}
	for ($i = 1; $i < $argc; $i++)
		$args[] = trim($argv[$i]);
	if ($args[1] == "+")
		echo ($args[0] + $args[2])."\n";
	else if ($args[1] == "-")
		echo ($args[0] - $args[2])."\n";
	else if ($args[1] == "/")
		echo ($args[0] / $args[2])."\n";
	else if ($args[1] == "*")
		echo ($args[0] * $args[2])."\n";
	else if ($args[1] == "%")
		echo ($args[0] % $args[2])."\n";
	else
		return (NULL);
?>
