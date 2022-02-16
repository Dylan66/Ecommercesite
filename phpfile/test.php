<?php 
	$array1 = array("A", "B", "C");
	$array2 = array("05/20", "20/20", "08/21");
	$array3 = array("Mon", "Tue", "Wed");
	// Array ( [0] => Array ( 
	// 			[0] => A 
	// 			[1] => 05/20 
	// 			[2] => Mon 
	// 		) 
	// 		[1] => Array ( 
	// 			[0] => B 
	// 			[1] => 20/20 
	// 			[2] => Tue 
	// 		) 
	// 		[2] => Array ( 
	// 			[0] => C 
	// 			[1] => 08/21 
	// 			[2] => Wed 
	// 		) 
	// 	)
	foreach ($array1 as $key => $value) {
		$combined[] = [$value, $array2[$key], $array3[$key]];
	}
	print_r($combined);

	// Array ( [0] => Array ( 
	// 			[0] => 4 
	// 			[1] => 
	// 			[2] => 5 
	// 			) 
	// 		[1] => Array ( 
	// 			[0] => 5 
	// 			[1] => 
	// 			[2] => 1 ) 
	// 		[2] => Array ( 
	// 			[0] => 17 
	// 			[1] => 
	// 			[2] => 5 ) 
	// 	) 
?>