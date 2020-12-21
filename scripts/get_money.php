<?php 

	ob_end_clean();
	$money = $_POST['money'];// номинал
	$sum = $_POST['sum'];// нужная сумма
	$response = array("status" => 1);

	function get_money($sum,$money,&$response)
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
    		$firs = $sum;
    		$second = $sum;

			for (; $first % 5 != 0; $first++){}
			$res_err[0] = $first;

			for (; $second % 5 != 0; $second--){}
			$res_err[1] = $second;

			$response["status"] = 0;
			return $res_err;
			
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

	/*
		из-за особенности алгоритма, перебор купюр должен начинаться
		с максимальной купюры, поэтому сначала сортируем по убыванию, а потом ищем количетсво
	*/
	$sorted_arr = arr_sort($money);
	$result = get_money($sum,$sorted_arr,$response);

	echo json_encode($response);
	echo json_encode($result);	

?>