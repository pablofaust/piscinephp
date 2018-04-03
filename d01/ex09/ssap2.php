#!/usr/bin/php
<?PHP

	function ft_split($str)
	{
		if (gettype($str) != "string")
			exit;
		$str = trim($str);
		$str = preg_replace('/\s+/', ' ', $str);
		$my_tab = (explode(' ', $str));
		sort($my_tab);
		return ($my_tab);
	}

	function cmp($a, $b)
	{
		$a = strtolower($a);
		$b = strtolower($b);
		$monasci = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
		$i = 0;
		while (isset($a[$i]) && isset($b[$i]))
		{
			while (isset($a[$i]) && isset($b[$i]) && (strpos($monasci, $a[$i]) - strpos($monasci, $b[$i])) == 0)
				$i++;
			if (isset($a[$i]) && isset($b[$i]) && (strpos($monasci, $a[$i]) - strpos($monasci, $b[$i])) != 0)
				return(strpos($monasci, $a[$i]) - strpos($monasci, $b[$i]));
			$i++;	
		}
		return (1);
	}

	if ($argc <= 1)
		return (NULL);
	for ($i = 1; $i < $argc; $i++)
		$array[] = ft_split($argv[$i]);
	foreach ($array as $arg)
		foreach ($arg as $split)
			$list[] = $split;
	usort($list, "cmp");
	foreach ($list as $elem)
		echo $elem."\n";
?>
