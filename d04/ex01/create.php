<?PHP

	if ($_POST['submit'] === "OK")
	{
		if (isset($_POST['login']) && isset($_POST['passwd']))
		{
			if (!$_POST['login'] || !$_POST['passwd'])
				echo "ERROR\n";
			if (!(file_exists("../private")))
				mkdir("../private");
			if (file_exists("../private/passwd"))
			{
				$tab = file_get_contents("../private/passwd");
				$users = unserialize($tab);
				foreach ($users as $user)
					if ($user['login'] == $_POST['login'])
					{
						echo "ERROR\n";
						return ;
					}
			}
			$users[] = array('login' => $_POST['login'], 'passwd' => hash("whirlpool", $_POST['passwd']));
			file_put_contents("../private/passwd", serialize($users));
			echo "OK\n";
		}
	}

	else
		echo "ERROR\n";
?>
