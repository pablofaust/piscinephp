<?php

	require_once "Color.class.php";
	require_once "Vertex.class.php";

	class Vector {
		
		private		$_x;
		private		$_y;
		private		$_z;
		private		$_w;
		static		$verbose = false;

		static public function	doc() {
			if (!($doc = file_get_contents('Vector.doc.txt')))
				"Error trying to read the doc.\n";
			else
				return ($doc);
		}

		public function			get_x() { return ($this->_x); }
		public function			get_y() { return ($this->_y); }
		public function			get_z() { return ($this->_z); }
		public function			get_w() { return ($this->_w); }

		public function					magnitude () {
			return (floatval(sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2))));
		}
	
		public function					normalize () {
			$norm_x = $this->get_x() / $this->magnitude();
			$norm_y = $this->get_y() / $this->magnitude();
			$norm_z = $this->get_z() / $this->magnitude();
			return (new Vector( array( 'dest' => new Vertex( array( 'x' => $norm_x, 'y' => $norm_y, 'z' => $norm_z ) ) ) ) );
		}

		public function					add( Vector $rhs ) {
			$new_x = $this->get_x() + $rhs->get_x();
			$new_y = $this->get_y() + $rhs->get_y();
			$new_z = $this->get_z() + $rhs->get_z();
			return (new Vector( array( 'dest' => new Vertex( array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z ) ) ) ) );
		}

		public function					sub( Vector $rhs ) {
			$new_x = $this->get_x() - $rhs->get_x();
			$new_y = $this->get_y() - $rhs->get_y();
			$new_z = $this->get_z() - $rhs->get_z();
			return (new Vector( array( 'dest' => new Vertex( array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z ) ) ) ) );
		}

		public function					opposite() {
			$new_x = 0 -$this->get_x();
			$new_y = 0 -$this->get_y();
			$new_z = 0 - $this->get_z();
			return (new Vector( array( 'dest' => new Vertex( array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z ) ) ) ) );
		}

		public function					scalarProduct( $k ) {
			$new_x = $this->get_x() * $k;
			$new_y = $this->get_y() * $k;
			$new_z = $this->get_z() * $k;
			return (new Vector( array( 'dest' => new Vertex( array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z ) ) ) ) );
		}
	
		public function					dotProduct( Vector $rhs ) {
			return (floatval($this->get_x() * $rhs->get_x() + $this->get_y() * $rhs->get_y() + $this->get_z() + $rhs->get_z()));
		}

		public function					cos( Vector $rhs ) {
			return (floatval($this->dotProduct($rhs) / ($this->magnitude() + $rhs->magnitude())));
		}

		public function					crossProduct( $rhs ) {
			$new_x = $this->get_y() * $rhs->get_z() - $this->get_z() * $rhs->get_y();
			$new_y = $this->get_z() * $rhs->get_x() - $this->get_x() * $rhs->get_z();
			$new_z = $this->get_x() * $rhs->get_y() - $this->get_y() * $rhs->get_x();
			return (new Vector( array( 'dest' => new Vertex( array( 'x' => $new_x, 'y' => $new_y, 'z' => $new_z ) ) ) ) );
		}

		function			__tostring() {
			$string = "Vector( x:".number_format($this->_x, 2).", y:".number_format($this->_y, 2).", z:".number_format($this->_z, 2).", w:".number_format($this->_w, 2)." )";
			return ($string);
		}

		function				__clone () {
			return ;
		}

		function				__construct( array $kwargs ) {
			if (array_key_exists('orig', $kwargs) && array_key_exists('dest', $kwargs))
			{
				$this->_x			= $kwargs['dest']->get_x() - $kwargs['orig']->get_x();
				$this->_y			= $kwargs['dest']->get_y() - $kwargs['orig']->get_y();
				$this->_z			= $kwargs['dest']->get_z() - $kwargs['orig']->get_z();
			}
			else if (array_key_exists('dest', $kwargs))
			{
				new Vertex( array( 'x' => 0, 'y' => 0, 'z' => 0, 'w' => 1) );
				$this->_x			= $kwargs['dest']->get_x();
				$this->_y			= $kwargs['dest']->get_y();
				$this->_z			= $kwargs['dest']->get_z();
			}
			else
				print "Error: destination missing.\n";
			$this->_w			= 0;
			if (self::$verbose)
				print ("Vector( x:".number_format($this->_x, 2).", y:".number_format($this->_y, 2).", z:".number_format($this->_z, 2).", w:".number_format($this->_w, 2)." ) constructed\n");
			return ;
		}

		function				__destruct() {
			if (self::$verbose)
				print ("Vector( x:".number_format($this->_x, 2).", y:".number_format($this->_y, 2).", z:".number_format($this->_z, 2).", w:".number_format($this->_w, 2).", ".$this->_color." ) destructed\n");
			return ;
		}
	}
?>
