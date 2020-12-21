<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Тест струпа</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div>
		<?php 

			const WORD_COUNT = 5;

			function stroop()
			{
				$color_array = ["red", "blue", "green", "yellow", "lime", "magenta", "black", "gold", "gray", "tomato"];
				for ($i = 0; $i < WORD_COUNT; $i++)
				{
					$value_of_color = $color_array[rand(0,9)];
					for ($j = 0; $j < WORD_COUNT; $j++)
					{
						$value_of_word = $color_array[rand(0,9)];
						while ($value_of_word == $value_of_color)
						{
							$value_of_color = $color_array[rand(0,9)];
						}
						 echo "<span style=color:".$value_of_color.">"." ".$value_of_word." "."</span>";
					}
					echo "</br>";
				}
			}

			stroop();

		?>
	</div>
</body>
</html>