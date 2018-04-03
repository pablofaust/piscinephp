<?PHP

	if ($_POST['submit'] === "OK")
	{
		if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'])
			echo "ERROR\n";
		else
		{
			$tab = file_get_contents("../private/passwd");
			$users = unserialize($tab);
			$i = -1;
			foreach ($users as $key => $user)
			{
				if ($user['login'] === $_POST['login'])
				{
					$i = $key;
				}
			}
			if ($i === -1)
			{
				echo "ERROR\n";
				return ;
			}
			else
			{
				if (hash("whirlpool", $_POST['oldpw']) !== $users[$i]['passwd'])
						echo "ERROR\n";
				else
				{
					$users[$i]['passwd'] = hash("whirlpool", $_POST['newpw']);
					file_put_contents("../private/passwd", serialize($users));				
					echo "OK\n";
				}
			}
		}
	}

	else
		echo "ERROR\n";

?>
