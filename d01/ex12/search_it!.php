#!/usr/bin/php
<?PHP
	function map_values($argv, $argc)
	{
		for ($i = 2; $i < $argc; $i++)
		{
			$splits = explode(':', $argv[$i]);
			$values[$splits[0]] = $splits[1];
		}
		return ($values);
	}

	if ($argc < 2)
		return (NULL);
	$key = $argv[1];
	$values = map_values($argv, $argc);
	if ($values[$key])
		echo ($values[$key])."\n";
	else
		return (NULL);
?>
