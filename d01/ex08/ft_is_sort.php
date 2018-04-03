#!/usr/bin/php
<?PHP
	function ft_is_sort($tab)
	{
		print_r($tab);
		$tmp1 = $tab;
		$tmp2 = $tab;
		sort($tmp1);
		rsort($tmp2);
		print_r($tmp1);
		print_r($tmp2);
		if ($tab === $tmp1)
			return (true);
		else if ($tab === $tmp2)
			return (true);
		else
			return (false);
	}
?>
