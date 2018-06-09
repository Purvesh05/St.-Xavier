<?php


$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="school";
 
foreach($db as $key => $value){
	define(strtoupper($key),$value);
	
}


$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);



include("includes/function.php");

if(isset($_POST['login'])){

$roll_no = $_POST['roll_no'];
$password = $_POST['password'];

$roll_no = string_check($roll_no);
$password = string_check($password);



$query = "SELECT * FROM users where roll_no= '$roll_no'";
	
$select_rollno_query = mysqli_query($conn,$query);


if(!$select_rollno_query ){
	die("Error ocurred ".mysqli_error($conn));
}
else{
	
$count = mysqli_num_rows($select_rollno_query);	
if($count == 1){
	$row = mysqli_fetch_array($select_rollno_query);
	$db_password = $row['user_password'];
	 $std = $row['Std'];
	$password = crypt($password,$db_password);
	$password = substr($password,0,50);
	
	
		if($password == $db_password){
			
			echo"<br> password";
			header("Location:index.php");
			session_start();
			$_SESSION['roll_no'] = $roll_no;
			$_SESSION['std'] = $std;
		
			
		}
		else{
			echo"<br>invalid password";
		}
	
}
else{
	echo "roll not found";
}

	

}	
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- title of the site -->
  <title>St. Xavier's</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	

	<!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	
	<style>
	
		#login .card-form{
			opacity: 0.95;
			
		}
	</style>
	
</head>
<body>


 <div class="container">
    	<div class="row">          
	<section id="login" class="mt-5">
		
		<div class="card bg-info text-center card-form">
			<div class="card-body text-white">
				<form action="" autocomplete="off" method="post" role="form" >
					<h2>Login</h2>
					<div class="form-group">
						<label for="Roll_no">Enter your Roll NO</label>
						<input type="text" name="roll_no" class="form-control roll_no" id="roll_no">
					</div>

					<div class="form-group">
						<label for="password">Enter your Password</label>
						<input type="password" class="form-control" name="password" id="password">
					</div>

					<div class="form-group">
						<button type="submit"  name="login"  class="btn btn-danger btn-block">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</section>
    </div>
</div>
    
    
    <!--
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>-->


	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	
	
	<script>
$(document).ready(function(){

	
		//validate the length
	$('#password').keyup(function() {
		var pswd = $('#password').val();
		if ( pswd.length < 7 ) {
			$('#password').addClass('is-invalid');
			$('#password').after('<span class="is-invalid">Password must be at least 8 characters long</span>');
			$('button').addClass('disabled');
			$('#password').next().next().remove();
		} 
		if(pswd.length > 7){
			$('#password').removeClass('is-invalid').addClass('is-valid');
			/*$('.hide').addClass('invisible');*/
			$('#password').next().remove();
			$('button').removeClass('disabled');
		}
		
		});
		

});
	
	/*$(document).ready(function(){
	
	$("#roll_no").keyup(funtion(){
		var roll_no = $("#roll_no").val();
		
		if((roll_no >0 && roll_no <100)){
			$('#roll_no').addClass("is-valid");
			$('button').removeClass('disabled');
		}
		else{
			$('.roll_no').addClass("is-invalid");
			$('button').addClass('disabled');
		}
				
		});				 
	});
	*/
	
	</script>

</body>
</html>

