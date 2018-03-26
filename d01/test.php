#!/usr/bin/php
<?PHP

function my_add($p1, $p2)
{
	return $p1 + $p2;
}
$my_var = 42;
$my_str = "fefer";
$my_tab = explode(";", "zero;un;deux;trois");
$my_hash = array("key1" => "val1", "key2" => "val2");
foreach ($my_tab as $elem)
	echo $elem;
print_r($my_tab);
?>

