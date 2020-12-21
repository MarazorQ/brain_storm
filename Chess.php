<?php 

	interface IChessmen
	{
		public function move($x, $y);
		public function getPosition();
	}

	abstract class AbstractChessmen implements IChessmen
	{
		public $x;
		public $y;

		public function getPosition()
		{	
			$arr = array($this->x,$this->y);
			return $arr;
		}
	}

	class King extends AbstractChessmen
	{
		public function __construct($X, $Y)
		{
			$this->x = $X;
			$this->y = $Y;
		}

		final public function move($X, $Y)
		{
			$posX = abs($X - $this->x);
            $posY = abs($Y - $this->y);
            if (($posX < 2) && ($posY < 2) && ($X > 0) && ($X < 9) && ($Y > 0) && ($Y < 9))
            {
                $this->x = $X;
                $this->y = $Y;
            }
            else
            {
                echo "erroro king </br>";
                //die();
            }
		}
	}


	class Queen extends AbstractChessmen
	{
		public function __construct($X, $Y)
		{
			$this->x = $X;
			$this->y = $Y;
		}

		final public function move($X, $Y)
		{
			$posX = abs($X - $this->x);
            $posY = abs($Y - $this->y);
            if ((($posX == $posY) || ($posY == 0) || ($posX == 0)) && ($X > 0) && ($X < 9) && ($Y > 0) && ($Y < 9))
            {
                $this->x = $X;
                $this->y = $Y;
            }
            else
            {
                echo "erroro queen</br>";
                //die();
            }
		}
	}

	$king = new King(4,3);
	$king->move(3,3);
    $res = $king->getPosition();

    var_dump($res);
    echo "</br>";
	$queen = new Queen(1,1);
	$queen->move(6,6);

	var_dump($queen->getPosition());

