<?php

function run_fizz(){

for ($i = 1; $i <= 20; $i++) 
	print ( !($i % 3)? ( !($i % 5)? "FizzBuzz " : "Fizz ") : ( !($i % 5)? "Buzz " : $i." "));

}


?>
