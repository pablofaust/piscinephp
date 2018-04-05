<?php

	abstract class Lannister {
	
		function sleepWith($person) {
			if (get_parent_class($person) === "Lannister")
			{
				print "Not even if I'm drunk !\n";
				return ;
			}
			if (get_parent_class($person) !== "Lannister")
			{
				print "Let's do this\n";
				return ;
			}
		}
	}

?>
