#!/usr/bin/php
<?PHP

function oddeven($param)
{
	if ($param % 2 == 0)
		return (1);
	if ($param % 2 != 0)
		return (0);
}
$eof = 0;
while ($eof == 0)
{
	echo "Entrez un nombre: ";
	$number = trim(fgets(STDIN));
	$last = substr($number, -1);
	if (feof(STDIN) == TRUE)
		$eof = 1;
	else if (!is_numeric($number))
		echo "'$number' n'est pas un chiffre\n";
	else if (oddeven($last) == 1)
		echo "Le chiffre $number est Pair\n";
	else if (oddeven($last) == 0)
		echo "Le chiffre $number est Impair\n";
}
echo "\n";
return (0);
?>
