<?php  
	session_start(); 

	$_SESSION['roll_no'] = null;
	$_SESSION['std'] = null;
		
	header("Location: ../index.php");
?> 