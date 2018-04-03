<?PHP

	if ($_GET[action] == "set")
		setcookie($_GET[name], $_GET[value]);

	else if ($_GET[action] == "get")
	{
		if (isset($_COOKIE[$_GET[name]]))
		{
	   		echo $_COOKIE[$_GET[name]];
			return true;
		}
		else
			return false;
	}

	else if ($_GET[action] == "del")
	{
		if (isset($_COOKIE[$_GET[name]]))
		{
			unset($_COOKIE[$_GET[name]]);
			setcookie($_GET[name], null, -1);
			return true;
		}
		else
			return false;
	}
?>
