<?php

	class Jaime extends Lannister {

		function sleepWith($person) {
			if (get_class($person) == "Cersei")
			{
				print "With pleasure, but only in a tower in Winterfell, then.\n";
				return ;
			}
			parent::sleepWith($person);
		}
	}

?>
