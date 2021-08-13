<?php

function run_fizz(){

for ($i = 1; $i <= 20; $i++) 
	echo ( !($i % 3)? ( !($i % 5)? "FizzBuzz <br>" : "Fizz <br>") : ( !($i % 5)? "Buzz <br>" : $i."<br>"));

}


function run_fib($val, $aux = [0, 1]){
	$res = $aux[0] + $aux[1];	

	if (!$val) return 0;
	else if($val == 1) return 1;
	else if($val == $res) return $res;
	else if($val < $res) return "thats not a fibonacci number";	

	return  run_fib($val, [$aux[1], $res]);

}

?>
