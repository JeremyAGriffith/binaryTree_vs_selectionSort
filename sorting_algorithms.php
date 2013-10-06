<?php 
// insertion sort
// given $nums is an array of #s
function insert_sort($nums)
{
	// displ_arr($nums);

	$i = 1;
	while($i < count($nums)){
		if ($nums[$i-1] > $nums[$i]){
			$x = $i - 1;
			do {
				$temp = $nums[$x];
				$nums[$x] = $nums[$x+1];
				$nums[$x+1] = $temp;
				$x--;
			} while ($x >= 0 && ($nums[$x] > $nums[$x+1]));
		}
		$i++;
	}
	displ_arr($nums);
}

$arr = array();
for ($j=100000;$j>0;$j-=11){
	$arr[] = ($j%5)+1;
}
insert_sort($arr);


function displ_arr($a)
{
	// echo "</pre>";
	// var_dump($a);
	// echo "</pre>";
	$str = "";
	foreach ($a as $item) {
		$str .= $item . ", ";
	}
	$str .= "<br />";
	echo $str;
}
?>