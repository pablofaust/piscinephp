#!/usr/bin/php
<?PHP

	function get_sep($param)
	{
		if (strpos($param, "+"))
			return ("+");
		else if (strpos($param, "-"))
			return ("-");
		else if (strpos($param, "*"))
			return ("*");
		else if (strpos($param, "/"))
			return ("/");
		else if (strpos($param, "%"))
			return ("%");
		else
		{
			echo "Syntax Error\n";
			return (NULL);
		}
	}

	function check_splits($splits)
	{
		foreach($splits as $split)
		{
			if (is_numeric($split))
				continue ;
			else
			{
				echo "Syntax Error\n";
				return (NULL);
			}
		}
		return (1);
	}

	function do_op($splits, $sep)
	{
		if ($sep == '+')
			return ($splits[0] + $splits[1]);
		else if ($sep == '-')
			return ($splits[0] - $splits[1]);
		else if ($sep == '*')
			return ($splits[0] * $splits[1]);
		else if ($sep == '/')
			return ($splits[0] / $splits[1]);
		else if ($sep == '%')
			return ($splits[0] % $splits[1]);
		else
			return (NULL);
	}

	if ($argc != 2)
		return (NULL);
	if (!($sep = get_sep($argv[1])))
		return (NULL);
	$splits = explode($sep, $argv[1]);
	if ((count($splits)) != 2)
	{
		echo "Syntax Error\n";
		return (NULL);
	}
	foreach ($splits as $split)
		$tmp[] = trim($split);
	if (!(check_splits($tmp)))
		return (NULL);
	$res = do_op($tmp, $sep);
	echo $res."\n";
?>
