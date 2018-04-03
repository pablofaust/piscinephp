<?PHP

	if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys")
	{
		$img = file_get_contents("../img/42.png");
		$encoded = base64_encode($img);
		echo "<html>";
		echo "<body>\n";
		echo "Bonjour Zaz<br />\n";
		echo "<img src='data:image/png;base64,".$encoded."'>";
		echo "</body>";
		echo "</html>";
	}

	else
	{
		header("HTTP 1.0, assume close after body");
		header("HTTP/1.0 401 Unauthorized");
		header("WWW-Authenticate: Basic realm='Espace membres'");
		echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>";
	}

?>
