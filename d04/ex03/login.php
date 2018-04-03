<?PHP

	include("auth.php");
	session_start();

	$_SESSION['logged_on_user'] = "";
	if (auth($_GET['login'], $_GET['passwd']) == true)
	{
		$_SESSION['logged_on_user'] = $_GET['login'];
		echo "OK\n";
	}
	else
		echo "ERROR\n";

?>
