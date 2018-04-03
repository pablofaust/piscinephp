#!/usr/bin/php
<?PHP
	function ft_split($str)
	{
		if (gettype($str) != "string")
			exit;
		$str = trim($str);
		$str = preg_replace('/\s+/', ' ', $str);
		$my_tab = (explode(' ', $str));
		return ($my_tab);
	}

	if ($argc <= 1)
		return (NULL);
	$tab = ft_split($argv[1]);
	$length = count($tab);
	for ($i = $length; $i > 0; $i--)
	{
		if (strcmp(" ", $tab[$i]) != 1)
		{
			echo $tab[$i];
			break;
		}
	}
	for ($i = 0; $i < $length - 1; $i++)
		if (strcmp(" ", $tab[$i]) != 1)
			echo " ".$tab[$i];
	echo "\n";
?>
