<?php 

	interface IChessmen
	{
		public function move();
		public function getPosition();
	}

	abstract class AbstractChessmen implements IChessmen
	{
		public $x;
		public $y;

		public function getPosition($x, $y)
		{
			$this->x = $x;
			$this->y = $y;
		}
	}

	class King extends AbstractChessmen
	{
		public function move()
		{

		}
	}

	class Queen extends AbstractChessmen
	{
		public function move()
		{
			
		}
	}


	$king = new King(1,1);
	$queen = new Queen(4,3);

