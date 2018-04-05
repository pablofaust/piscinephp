<?php

require_once "Color.class.php";
require_once "Vertex.class.php";
require_once "Vector.class.php";

class Matrix {

	const 		IDENTITY = 'IDENTITY';
	const 		SCALE = 'SCALE';
	const 		RX = 'RX';
	const 		RY = 'RY';
	const 		RZ =  'RZ';
	const 		TRANSLATION = 'TRANSLATION';
	const 		PROJECTION = 'PROJECTION';
	private		$_preset;
	private		$_scale;
	private		$_angle;
	private		$_vtc;
	private		$_fov;
	private		$_ratio;
	private		$_near;
	private		$_far;
	private		$_matrix;
	static		$verbose = false;

	static public function	doc() {
		if (!($doc = file_get_contents('Matrix.doc.txt')))
			"Error trying to read the doc.\n";
		else
			return ($doc);
	}

	public function				get_preset() { return ($this->_preset); }
	public function				get_scale() { return ($this->_scale); }
	public function				get_angle() { return ($this->_angle); }
	public function				get_vtc() { return ($this->_vtc); }
	public function				get_fov() { return ($this->_fov); }
	public function				get_ratio() { return ($this->_ratio); }
	public function				get_near() { return ($this->_near); }
	public function				get_far() { return ($this->_far); }


	private function			set_matrix($preset) {
		if ($preset == self::IDENTITY)
			$this->_matrix	= array( array( 1, 0, 0, 0 ), array( 0, 1, 0, 0 ), array( 0, 0, 1, 0 ), array( 0, 0, 0, 1 ) );
		else if ($preset == self::SCALE)
			$this->_matrix	= array( array( $this->get_scale(), 0, 0, 0 ), array( 0, $this->get_scale(), 0, 0 ), array( 0, 0, $this->get_scale(), 0 ), array( 0, 0, 0, 1 ) );
		else if ($preset == self::RX || $preset == self::RY || $preset == self::RZ)
		{
			$angle = $this->get_angle();
			$s 	= sin($angle);
			$m_s = -sin($angle);
			if ($preset == self::RX)
			{
				$this->_matrix	= 
					[ 
						[ 1, 0, 0, 0 ], 
						[ 0, cos($angle), $m_s, 0 ], 
						[ 0, $s, cos($angle), 0 ], 
						[ 0, 0, 0, 1 ] 
					];
			}
			else if ($preset == self::RY)
			{
				$this->_matrix = 
				[
					[cos($angle),0,sin($angle),0],
					[0,1,0,0],
					[-sin($angle),0,cos($angle),0],
					[0,0,0,1]
				];
			}
			else
				$this->_matrix	= [
					[	cos($angle), 	$m_s, 0, 0 ], 
					[	$s, cos($angle)	, 0, 0 ], 
					[	0, 		0, 1, 0 ],
					[	0, 		0, 0, 1 ]
				];
		}
		else if ($preset == self::TRANSLATION)
		{
			echo ("TEST :".$this->get_vtc()->get_x()."\n");
			$this->_matrix	= array( array( 1, 0, 0, $this->get_vtc()->get_x() ), array( 0, 1, 0, $this->get_vtc()->get_y() ), array( 0, 0, 1, $this->get_vtc()->get_z() ), array( 0, 0, 0, 1 ) );
		}
		else
			$this->_matrix	= array( array( (1 / ($this->get_ratio() * (tan(deg2rad($this->get_fov() * 2))))), 0, 0, 0 ), array( 0, (1 / tan(deg2rad($this->get_fov() / 2))), 0, 0 ), array( 0, 0, 0 - (($this->get_far() + $this->get_near()) / ($this->get_far() - $this->get_near())), 0 - ((2 * $this->get_far() * $this->get_near()) / ($this->get_far() - $this->get_near())) ), array( 0, 0, 0, 1 ) );
	}

	public function					get_matrix() { return ($this->_matrix); }

	public function					mult( Matrix $rhs ) {
		$new = clone $this;
		for ($row = 0; $row < 4; $row++)
			for ($col = 0; $col < 4; $col++)
				$new->_matrix[$row][$col] = $this->_matrix[$row][$col] + $rhs->_matrix[$row][$col];
		return ($new);
	}

	public function					transformVertex( Vertex $vtx ) {
		$new = new Vertex( array( 'x' => 0, 'y' => 0, 'z' => 0, 'w' => 1) );
		$new['x'] = $vtx->_x * $this->_matrix[0][0] + $vtx->_x * $this->_matrix[0][1] + $vtx->_x * $this->_matrix[0][2] + $vtx->_x * $this->_matrix[0][3];  
		$new['y'] = $vtx->_x * $this->_matrix[1][0] + $vtx->_x * $this->_matrix[1][1] + $vtx->_x * $this->_matrix[1][2] + $vtx->_x * $this->_matrix[1][3];  
		$new['z'] = $vtx->_x * $this->_matrix[2][0] + $vtx->_x * $this->_matrix[2][1] + $vtx->_x * $this->_matrix[2][2] + $vtx->_x * $this->_matrix[2][3];  
		$new['w'] = $vtx->_x * $this->_matrix[3][0] + $vtx->_x * $this->_matrix[3][1] + $vtx->_x * $this->_matrix[3][2] + $vtx->_x * $this->_matrix[3][3];  
		return ($new);
	}

	function						__clone() {
		return ;
	}

	function						__toString() {
		$row1 = "M | vtcX | vtcY | vtcZ | vtx0 \n";
		$row2 = "-----------------------------\n";
		$row3 = "x | ".$this->get_matrix()[0][0]." | ".$this->get_matrix()[0][1]." | ".$this->get_matrix()[0][2]." | ".$this->get_matrix()[0][3]."\n";
		$row4 = "y | ".$this->get_matrix()[1][0]." | ".$this->get_matrix()[1][1]." | ".$this->get_matrix()[1][2]." | ".$this->get_matrix()[1][3]."\n";
		$row5 = "z | ".$this->get_matrix()[2][0]." | ".$this->get_matrix()[2][1]." | ".$this->get_matrix()[2][2]." | ".$this->get_matrix()[2][3]."\n";
		$row6 = "w | ".$this->get_matrix()[3][0]." | ".$this->get_matrix()[3][1]." | ".$this->get_matrix()[3][2]." | ".$this->get_matrix()[3][3]."\n";
		$string = $row1.$row2.$row3.$row4.$row5.$row6;
		return ($string);
	}

	function						__construct( array $kwargs ) {
		if (!array_key_exists('preset', $kwargs) || (($kwargs['preset'] != self::IDENTITY && $kwargs['preset'] != self::TRANSLATION && $kwargs['preset'] != self::RX && $kwargs['preset'] != self::RY && $kwargs['preset'] != self::RZ && $kwargs['preset'] != self::PROJECTION && $kwargs['preset'] != self::SCALE)))
		{
			print("Error: preset missing or incorrect.\n");
			return ;
		}
		if ($kwargs['preset'] == self::TRANSLATION && !array_key_exists('vtc', $kwargs))
		{
			print("Error: vtc missing.\n");
			return ;
		}
		if ($kwargs['preset'] == self::PROJECTION && !array_key_exists('fov', $kwargs))
		{
			print("Error: fov missing.\n");
			return ;
		}
		if ($kwargs['preset'] == self::PROJECTION && !array_key_exists('ratio', $kwargs))
		{
			print("Error: ratio missing.\n");
			return ;
		}
		if ($kwargs['preset'] == self::PROJECTION && !array_key_exists('near', $kwargs))
		{
			print("Error: near missing.\n");
			return ;
		}
		if ($kwargs['preset'] == self::PROJECTION && !array_key_exists('far', $kwargs))
		{
			print("Error: far missing.\n");
			return ;
		}
		$this->_fov 	= deg2rad($kwargs['fov']);
		$this->_vtc 	= ($kwargs['vtc']);
		$this->_scale 	= ($kwargs['scale']);
		if (isset($kwargs['angle']))
		{
			$this->_angle 	= $kwargs["angle"];
			print("JE PASSE PAR ICI\n\n\n");
		}
		$this->_ratio 	= $kwargs['ratio'];
		$this->_near 	= $kwargs['near'];
		$this->_far		= $kwargs['far'];
		$this->set_matrix($kwargs['preset']);
		if (self::$verbose == true)
		{
			if ($kwargs['preset'] == self::IDENTITY)
				print ("Matrix IDENTITY preset instance constructed\n");
			else if ($kwargs['preset'] == self::SCALE)
				print ("Matrix SCALE preset instance constructed\n");
			else if ($kwargs['preset'] == self::TRANSLATION)
				print ("Matrix TRANSLATION preset instance constructed\n");
			else if ($kwargs['preset'] == self::RX)
				print ("Matrix 0x ROTATION preset instance constructed\n");
			else if ($kwargs['preset'] == self::RY)
				print ("Matrix 0y ROTATION preset instance constructed\n");
			else if ($kwargs['preset'] == self::RZ)
				print ("Matrix 0z ROTATION preset instance constructed\n");
			else if ($kwargs['preset'] == self::PROJECTION)
				print ("Matrix PROJECTION preset instance constructed\n");
		}
		return ;
	}

	function						__destruct() {
		if (self::$verbose == true)
			print ("OK");
		return ;
	}
}

?>
