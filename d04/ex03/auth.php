<?PHP

	function auth($login, $passwd)

	{
			$tab = file_get_contents("../private/passwd");
			$users = unserialize($tab);
			$i = -1;
			foreach ($users as $key => $user)
			{
				if ($user['login'] === $login && $user['passwd'] === hash("whirlpool", $passwd))
				{
					$i = 2;
					return true;
				}
			}
			if ($i === -1)
				return false;
	}

?>
