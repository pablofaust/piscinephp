<?php

	class Color {

		public			$red;
		public			$green;
		public 			$blue;
		static public	$verbose	= false;

		function				rgb_explode($rgb) {
			$this->red		= $rgb >> 16;
			$this->green	= ($rgb >> 8) & 0xff;
			$this->blue		= $rgb & 0xff;
		}

		static public function	doc() {
			if (!($doc = file_get_contents('Color.doc.txt')))
				"Error trying to read the doc.\n";
			else
				return ($doc);
		}

		function				add( Color$kwargs ) {
			return (new Color( array('red' => $this->red + $kwargs->red, 'green' => $this->green + $kwargs->green, 'blue' => $this->blue + $kwargs->blue) ) );
		}

		function				sub( Color$kwargs ) {
			return (new Color( array('red' => $this->red - $kwargs->red, 'green' => $this->green - $kwargs->green, 'blue' => $this->blue - $kwargs->blue) ) );
		}

		function				mult( $f ) {
			return (new Color( array('red' => $this->red * $f, 'green' => $this->green * $f, 'blue' => $this->blue * $f) ) );
		}

		function				__tostring() {
			return "Color( red: ".str_pad($this->red, 3, " ", STR_PAD_LEFT).", green: ".str_pad($this->green, 3, " ", STR_PAD_LEFT).", blue: ".str_pad($this->blue, 3, " ", STR_PAD_LEFT)." )";
		}

		function				__construct( array $kwargs ){
			if ( array_key_exists('rgb', $kwargs) )
			{
				$this->rgb_explode(($kwargs['rgb']));
				if (self::$verbose == true)
					print "Color( red: ".str_pad($this->red, 3, " ", STR_PAD_LEFT).", green: ".str_pad($this->green, 3, " ", STR_PAD_LEFT).", blue: ".str_pad($this->blue, 3, " ", STR_PAD_LEFT)." ) constructed.\n";
			}
			else if ( array_key_exists('red', $kwargs) && array_key_exists('green', $kwargs) && array_key_exists('blue', $kwargs) )
			{
				$this->red		= intval($kwargs['red']);
				$this->green	= intval($kwargs['green']);
				$this->blue		= intval($kwargs['blue']);
				if (self::$verbose == true)
					print "Color( red: ".str_pad($this->red, 3, " ", STR_PAD_LEFT).", green: ".str_pad($this->green, 3, " ", STR_PAD_LEFT).", blue: ".str_pad($this->blue, 3, " ", STR_PAD_LEFT)." ) constructed.\n";
			}
			else
				echo "ERROR";
		}

		function				__destruct(){
			if (self::$verbose == true)
				print "Color( red: ".str_pad($this->red, 3, " ", STR_PAD_LEFT).", green: ".str_pad($this->green, 3, " ", STR_PAD_LEFT).", blue: ".str_pad($this->blue, 3, " ", STR_PAD_LEFT)." ) destructed.\n";
		}
	}

?>

