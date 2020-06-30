<?php
class Color {
    public $red;
    public $green;
    public $blue;
    static $verbose = FALSE;

    public function __construct($array)
    {
        if ($array['rgb'])
        {
            $rgb = intval($array['rgb']);
            $this->red = ($rgb >> 16) & 0xFF;
            $this->green = ($rgb >> 8) & 0xFF;
            $this->blue = ($rgb & 0xFF);
        }
        else if ($array['red'] && $array['green'] && $array['blue'])
        {
            $this->red = intval($array['red']);
            $this->green = intval($array['green']);
            $this->blue = intval($array['blue']);
        }
        if (self::$verbose)
            print($this . ' constructed.' . PHP_EOL);
    }

    public function __destruct()
    {
        if (self::verbose)
            print($this . ' destructed.' . PHP_EOL);
    }

    public function __toString()
    {
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
    }

    public static function doc()
    {
		if ($str = file_get_contents('Color.doc.txt'))
			return ($str);
	}
	
	public function add( Color $rhs)
	{

	}

	public function sub( Color $rhs )
	{

	}

	public function mult( $f )
	{

	}
}
?>