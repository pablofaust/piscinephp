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
?>
