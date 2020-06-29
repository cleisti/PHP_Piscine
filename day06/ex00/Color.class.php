<?php
class Color {
	public static $verbose = 0;
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	private $_test = 5;

	public function getAtt() {
		return $this->_test;
	}

	public function setAtt($v) {
		$this->_test = $v;
		return;
	}

	public function __construct( array $arr) {
		print( 'Constructor called' . PHP_EOL);
		$this->setAtt( $arr['arg'] );
		self::$verbose++;
		return;
	}

	public function __destruct() {
		print( 'Destructor called' . PHP_EOL );
		self::$verbose--;
		print( 'nb of instances: ' . Color::$verbose . PHP_EOL);
		return;
	}

	public static function doc() {
		if ($str = file_get_contents('Color.doc.txt')) {
			echo "$str";
		}
		else {
			echo "Error: .doc file doesn't exist.\n";
		}
	}

	public function __tostring() {
		return 'Color( $_test = ' . $this->getAtt() . ' )';
	}
}

print( 'nb of instances: ' . Color::$verbose . PHP_EOL);
$c = new Color( array( 'arg' => 42) );
print( $c . PHP_EOL);
print( 'nb of instances: ' . Color::$verbose . PHP_EOL);
$c2 = new Color( array( 'arg' => 42) );
print( 'nb of instances: ' . Color::$verbose . PHP_EOL);
$c3 = new Color( array( 'arg' => 42) );
print( 'nb of instances: ' . Color::$verbose . PHP_EOL);
$c->doc();
?>