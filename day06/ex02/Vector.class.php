<?php
require_once 'Vertex.class.php';
class Vector {
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0.0;
	public static $verbose = FALSE;

	public function __construct(array $vector)
	{
		if (isset($vector['dest']))
		{
			if (!(isset($vector['orig'])))
			{
				$orig = new Vertex ( array( 'x' => 0,
											'y' => 0,
											'z' => 0,
											'w' => 1.0 ));
			}
			else
			{
				$orig = new Vertex (array( 'x' => $vector['orig']->getX(),
											'y' => $vector['orig']->getY(),
											'z' => $vector['orig']->getZ() ));
			}
			$this->_x = $vector['dest']->getX() - $orig->getX();
			$this->_y = $vector['dest']->getY() - $orig->getY();
			$this->_z = $vector['dest']->getZ() - $orig->getZ();
		}
		if (self::$verbose)
				print($this . ' constructed' . PHP_EOL);
	}

	public function __destruct()
	{
		if (self::$verbose)
			print($this . ' destructed' . PHP_EOL);
	}

	public function doc()
	{
		if ($str = file_get_contents('Vector.doc.txt'))
			return ($str);
	}

	public function __toString()
    {
		return sprintf("Vector( x:%4.2f, y:%4.2f, z:%4.2f, w:%4.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	public function magnitude()
	{
		$magnitude = (float)sqrt((pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
		if ($magnitude === 1)
			return ("norm");
		else
			return ($magnitude);
	}

	public function normalize()
	{
		$magnitude = $this->magnitude();
		if ($magnitude > 0)
		{
			$inv_m = 1 / $magnitude;
			$new = new Vector (array('dest' => new Vertex(array(
				'x' => $this->getX() * $inv_m,
				'y' => $this->getY() * $inv_m,
				'z' => $this->getZ() * $inv_m
			))));
		}
		else
		{
			$new = new Vector (array('dest' => new Vertex(array(
				'x' => $this->getX(),
				'y' => $this->getY(),
				'z' => $this->getZ()
			))));
		}
		return ($new);
	}

	public function add(Vector $rhs)
	{
		$new = new Vector (array('dest' => new Vertex(array(
			'x' => $this->getX() + $rhs->getX(),
			'y' => $this->getY() + $rhs->getY(),
			'z' => $this->getZ() + $rhs->getZ()
		))));
		return ($new);
	}

	public function sub(Vector $rhs)
	{
		$new = new Vector (array('dest' => new Vertex(array(
			'x' => $this->getX() - $rhs->getX(),
			'y' => $this->getY() - $rhs->getY(),
			'z' => $this->getZ() - $rhs->getZ()
		))));
		return ($new);
	}

	public function opposite()
	{
		$new = new Vector (array('dest' => new Vertex(array(
			'x' => $this->getX() * -1,
			'y' => $this->getY() * -1,
			'z' => $this->getZ() * -1
		))));
		return ($new);
	}

	public function scalarProduct($k)
	{
		$new = new Vector (array('dest' => new Vertex(array(
			'x' => $this->getX() * $k,
			'y' => $this->getY() * $k,
			'z' => $this->getZ() * $k
		))));
		return ($new);
	}

	public function dotProduct(Vector $rhs)
	{
		$dot = (float)($this->getX() * $rhs->getX() + $this->getY() * $rhs->getY() + $this->getZ() * $rhs->getZ());
		return ($dot);
	}

	public function cos(Vector $rhs)
	{
		$mag_a = $this->magnitude();
		$mag_b = $rhs->magnitude();
		$dot = $this->dotProduct($rhs);
		$angle = $mag_a * $mag_b;
		$cos = (float)($dot / $angle);
		return ($cos);
	}

	public function crossProduct(Vector $v)
	{
		$x = $this->_y * $v->getZ() - $this->_z * $v->getY();
		$y = -($this->_x * $v->getZ() - $this->_z * $v->getX());
		$z = $this->_x * $v->getY() - $this->_y * $v->getX();
		return new Vector(array('dest' => new Vertex(
			array('x' => $x, 'y' => $y, 'z' => $z))));
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
}
?>