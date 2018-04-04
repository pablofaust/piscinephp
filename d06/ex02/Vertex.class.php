<?php
	
	require_once "Color.class.php";
	class Vertex {
		
		private			$_x;
		private			$_y;
		private			$_z;
		private			$_w;
		private			$_color;
		static public	$verbose = false;

		public function		set_x($x) {
			$this->_x = $x;
		}

		public function		set_y($y) {
			$this->_y = $y;
		}

		public function		set_z($z) {
			$this->_z = $z;
		}

		public function		set_w($w) {
			$this->_w = $w;
		}

		public function		set_color($color) {
			$this->_color = $color;
		}

		static public function	doc() {
			if (!($doc = file_get_contents('Vertex.doc.txt')))
				"Error trying to read the doc.\n";
			else
				return ($doc);
		}

		public function			get_x() { return ($this->_x); }
		public function			get_y() { return ($this->_y); }
		public function			get_z() { return ($this->_z); }
		public function			get_w() { return ($this->_w); }

		function			__tostring() {
			$string = "Vertex( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z:".number_format($this->_z, 2).", w:".number_format($this->_w, 2);
			if (self::$verbose == true)
				$string = $string.", ".$this->_color;
			$string = $string." )";
			return ($string);
		}

		function			__construct( array $kwargs ) {
			if (array_key_exists('x', $kwargs) && array_key_exists('y', $kwargs) && array_key_exists('z', $kwargs))
			{
				//echo "x = ".$kwargs['x']."y = ".$kwargs['y']."z = ".$kwargs['z']."\n";
				$this->set_x($kwargs['x']);
				$this->set_y($kwargs['y']);
				$this->set_z($kwargs['z']);
			}
			else
				print ("Error: coordinates missing.\n");
			if (array_key_exists('w', $kwargs))
				$this->set_w($kwargs['w']);
			else
				$this->set_w(1.0);
			if (array_key_exists('color', $kwargs))
				$this->set_color($kwargs['color']);
			else
				$this->set_color(new Color( array('red' => 255, 'green' => 255, 'blue' => 255) ));
			if (self::$verbose == true)
				print ("Vertex( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z:".number_format($this->_z, 2).", w:".number_format($this->_w, 2).", ".$this->_color." ) constructed\n");
		}

		function			__destruct() {
				print ("Vertex( x: ".number_format($this->_x, 2).", y: ".number_format($this->_y, 2).", z:".number_format($this->_z, 2).", w:".number_format($this->_w, 2).", ".$this->_color." ) destructed\n");
		}
	}
?>
