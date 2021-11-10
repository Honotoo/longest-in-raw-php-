<?php
    function quickSort(&$arr, $low, $high) 
	{
        $i = $low;                
        $j = $high;
        $middle = $arr[ ( $low + $high ) / 2 ];
        do 
		{
            while($arr[$i] < $middle) ++$i;
            while($arr[$j] > $middle) --$j;
            if($i <= $j)
			{           
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
                $i++; $j--;
            }
        }while($i < $j);
        if($low < $j)
		{
          quickSort($arr, $low, $j);
        } 
		
        if($i < $high)
		{
          quickSort($arr, $i, $high);
        } 
    }
	
	$test = explode(",", $_GET['LIST']);
	quickSort($test, 0, count($test) - 1);
	
	$now = array();
	$biggest = array();
	
	for ($a = 0; $a<count($test); $a++)
	{
		switch ($test)
		{
			case count($now)==0:
				array_push($now, $test[$a]);
				continue 2;
			case $now[count($now)-1]+1==$test[$a]:
				array_push($now, $test[$a]);
			case $now[count($now)-1]==$test[$a]:
				continue;
			case $now[count($now)-1]!=$test[$a]:
				$now = array();
		}
		if(count($biggest)<count($now))
		{
			$biggest = $now;
		}
	}
	print_r($biggest);
?>
