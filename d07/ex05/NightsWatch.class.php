<?php

	class NightsWatch {

		private		$_members = array();

		function recruit ($member) {
			array_push($this->_members, $member);
		}

		function fight() {
			foreach ($this->_members as $member)
				if ($member instanceof IFighter)
					$member->fight();
		}
	}

?>
