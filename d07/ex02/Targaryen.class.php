<?php

	class Targaryen {

		function resistsFire() {
			return False;
		}

		public function getBurned() {
			if ($this->resistsFire() == False)
				return "burns alive";
			else
				return "emerges naked but unharmed";
		}

	}

?>
