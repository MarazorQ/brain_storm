<?php 
	ob_end_clean();
	$money = $_POST['money'];
	$sum = $_POST['sum'];
    
	function get_money($sum,$money)
	{
	    if (($sum > 0) && ($sum % 5 == 0))
    	{	
    		for ($i = 0; $i < count($money); $i++)
    		{
    			$note = $money[$i];
    			$counter = 0;
    
    			while ($sum - $note >= 0)
    			{
    				$sum -= $note;
    			    $counter++;
    			}
    			$res[$note] = $counter;
    		}
    	}
    	else
    	{
    		echo "oshibka";
    	}
    	
    	return $res;
	}

	function arr_sort($arr)
	{
      for ($i = 0; $i < count($arr); $i++)
      {
    	for ($j = $i + 1; $j < count($arr); $j++)
    	{
    		if ($arr[$i] < $arr[$j]) 
    		{
    			$temp = $arr[$j];
    			$arr[$j] = $arr[$i];
    			$arr[$i] = $temp;
    		}
	    }         
      }
        return $arr;  
	}

	$sorted_arr = arr_sort($money);
	$result = get_money($sum,$sorted_arr);
	var_dump($result);	

?>