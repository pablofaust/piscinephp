#!/usr/bin/php
<?PHP
function ft_is_sort($tab)
{
	if (gettype(&tab) != "array")
		return (0);
	$length = count($tab);
	$i = 0;
	while ($i < $length)
	{
		$j = $i + 1;
		while ($j < $length)
		{
			if ($tab[$i] > $tab[$j])
				return (0);
			$j++;
		}
		$i++;
	}
	return (1);
}
?>
