<?php


function string_check($string){
	global $conn;
	$string = mysqli_real_escape_string($conn,$string);
	return $string;
}


?>