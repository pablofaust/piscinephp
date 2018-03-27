#!/usr/bin/php
<?PHP

	function get_sep($param)
{
		if (strpos($argv[1], "+"))
			return ("+");
		else if (strpos($argv[1], "-"))
			return ("-");
		else if (strpos($argv[1], "*"))
			return ("*");
		else if (strpos($argv[1], "/"))
			return ("/");
		else if (strpos($argv[1], "%"))
			return ("%");
		else
		{
			echo "Syntax Error\n";
			return (NULL);
		}
}
?>
