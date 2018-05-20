<?php

include("includes/function.php");

$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="school";
 
foreach($db as $key => $value){
	define(strtoupper($key),$value);
}
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(isset($_POST['sign_up'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$roll_no = $_POST['roll_no'];
$email = $_POST['email'];
$user_role = "user";
$password = $_POST['password'];

$firstname = string_check($firstname);
$lastname  = string_check($lastname);
$roll_no = string_check($roll_no);
$email = string_check($email);
$password = string_check($password);

	$sql = "select user_password from users";
$select_user_query = mysqli_query($conn,$sql);
if(!$select_user_query){
	die("There is some problem in server come back later");
	
}
	while($row = mysqli_fetch_array($select_user_query)){
		$db_user_password = $row['user_password'];
		$password = crypt($password,$db_user_password);
		if($password == $db_user_password){
			echo "pass aleready in use";
		}
	}
	
/*$password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));	*/
	

	
$query = "insert into users(user_firstname,user_lastname,roll_no,user_email,user_role,user_password) values('$firstname','$lastname','$roll_no','$email','$user_role','$password')";
$create_user_query = mysqli_query($conn,$query);
if($create_user_query){
	header("Location: signup.php");
	echo ('<div class="alert alert-success alert-dismissible fade show">
            <button class="close" data-dismiss="alert" type="button">
                <span>&times;</span>
            </button>
            <h1>Signed in successfully!!</h1>
			</div>');
}
else{
	die("Error have oucceered submitting the query ".mysqli_error($conn));
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
	
</head>
<body>
<?php
	
	
?>
           
<section class="text-center">
    <h1>Sign Up</h1>
    
    <p>Sign up to stay up-to-date </p>
    
    
    
    
    <form action="" autocomplete="off" method="post" role="form" >
		<div class="form-group ">
			<label for="firstname">Firstname</label>
			<input type="text" name="firstname" class="form-control" required>
		</div>

	   <div class="form-group">
			<label for="lastname">Lastname</label>
			<input type="text" name="lastname" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="user_email">Email</label>
			<input type="email" name="email" class="form-control" required>
		</div>
		
		<div class="form-group">
		<select name="user_role" id="user_role" class="form-control user_role">
			<option value="default" readonly>Select a option</option>
			<option value="student">Student</option>
			<option value="user">Others</option>

		</select>
		</div>
		
		<div class="form-group " id="roll_no" >
			<label for="roll_no">Roll No.</label>
			<input type="text" name="roll_no" class="form-control roll_no" required>
		</div>
		

		<div class="form-group">
			<label for="user_password">Password</label>
			<input type="password" id="password" name="password" class="form-control" required>
		</div>
		
		<div class="form-group">
			<label for="user_cnf_password">Conform Password</label>
			<input type="password" id="cnf_password" name="cnf_password" class="form-control" required>
			
		</div>
		
			
   
   		<div class="form-group">
   		
			<button type="submit"  name="sign_up"  class="btn btn-primary">Submit</button>
		</div>
    </form>
    
    
 </section>
    
    
    
    <!--
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>-->


	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	
	
	
	
	<script>
	
		
	$(document).ready(function(){

	$('#password').keyup(function() {
		var pswd = $('#password').val();
		
		
		
		//validate the length
		if ( pswd.length < 7 ) {
			$('#password').addClass('is-invalid');
			
			$('#password').after('<span class="is-invalid">Password must be at least 8 characters long</span>');7
			$('button').addClass('disabled');
		} 
		if(pswd.length > 7){
			$('#password').removeClass('is-invalid').addClass('is-valid');
			$('button').removeClass('disabled');
		}
		
		
});		
		
	//confirm passord
	$('#cnf_password').keyup(function(){
		
		var cnf_pswd = $('#cnf_password').val();
		
	
		if(pswd !== cnf_pswd){
		$("#cnf_password").addClass("is-invalid");	
		/*$('#cnf_password').after('<span class="is-invalid">Password is not macthing</span>');*/
		$('button').addClass('disabled');
			
		}
		 if(pswd == cnf_pswd){
			$("#cnf_password").removeClass('span.is-invalid').addClass("is-valid");
			$('button').removeClass('disabled');
		}
	});	
		
		
	 $("select.user_role").keyup(function(){
        var user_role = $(".user_role option:selected").val();

     	if(user_role == "student"){
			$('#roll_no').removeClass("sr-only");
		}
    });
		
	$(".roll_no").keyup(funtion(){
		var roll_no = $(".roll_no").val();
		
		if((roll_no >501600 && roll_no <501700)){
			$('.roll_no').addClass("is-valid");
			$('button').removeClass('disabled');
		}
		else{
			$('.roll_no').addClass("is-invalid");
			$('button').addClass('disabled');
		}
						 
						 
	});	
	
	
});	
	
	
	</script>
	


</body>
</html>
