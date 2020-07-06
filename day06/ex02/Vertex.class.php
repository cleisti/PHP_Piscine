<?php
require_once 'Color.class.php';

class Vertex {
	private $_x;
	private $_y;
	private $_z;
	private $_w = 1.0;
	private $_color;
	public static $verbose = FALSE;

	public function __construct($array)
	{
		if (isset($array['x']) && isset($array['y']) && isset($array['z']))
		{
			$this->_x = $array['x'];
			$this->_y = $array['y'];
			$this->_z = $array['z'];
			$this->_w = (isset($array['w'])) ? $array['w'] : 1.0;
			if (isset($array['color']))
				$this->_color = $array['color'];
			else
			{
				$this->_color = new Color (array(
					'red' => 255,
					'green' => 255,
					'blue' => 255));
			}
		}
		if (self::$verbose)
			print($this . ' constructed' . PHP_EOL);
	}

	public function __destruct()
	{
		if (self::$verbose)
			print($this . ' destructed' . PHP_EOL);
	}

	public function __tostring() {
		if (self::$verbose) {
			return ($ret = sprintf(
				"Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, $this->_color )",
				$this->_x, $this->_y, $this->_z, $this->_w) );
		} else {
			return ($ret = sprintf(
				"Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )",
				$this->_x, $this->_y, $this->_z, $this->_w) );
		}
	}

	public function getX()
	{
		return ($this->_x);
	}

	public function getY()
	{
		return ($this->_y);
	}

	public function getZ()
	{
		return ($this->_z);
	}

	public function getW()
	{
		return ($this->_w);
	}

	public function setX($x)
	{
		$this->_x = $x;
	}

	public function setY($y)
	{
		$this->_y = $y;
	}
	
	public function setZ($z)
	{
		$this->_z = $z;
	}

	public function setW($w)
	{
		$this->_w = $w;
	}

	public static function doc()
    {
		if ($str = file_get_contents('Vertex.doc.txt'))
			return ($str);
	}
}
?>