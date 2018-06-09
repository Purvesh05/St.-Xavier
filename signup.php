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

if(isset($_POST['sign_up'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$std = $_POST['std'];
$roll_no = $_POST['roll_no'];	
$user_role = $_POST['user_role'];
$password = $_POST['password'];
$firstname = string_check($firstname);
$lastname  = string_check($lastname);
$email = string_check($email);
$roll_no = string_check($roll_no);	
$user_role = string_check($user_role);
$password = string_check($password);
$std = string_check($std);

$password = password_hash($password,PASSWORD_BCRYPT,array('cost'=>10));	

$query = "insert into users(user_firstname,user_lastname,user_email,roll_no,user_role,user_password,std) values('$firstname','$lastname','$email','$roll_no','$user_role','$password',$std)";
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
<div class="container" >
	<div class="row ">

<section >
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
		<select name="user_role" id="user_role" class="form-control">
			<option value="default" readonly>Select a option</option>
			<option value="student">Student</option>
			<option value="teacher">teacher</option>
			<option value="user">Others</option>

		</select>
		</div>
		
		<div class="form-group ">
			<label for="std">Std <span class="text-muted">For students only</span></label>
			<input type="text" name="std" id="std" class="form-control roll_no" >
		</div>
		
		<div class="form-group " id="roll_no" >
			<label for="roll_no">Roll No.</label>
			<input type="text" name="roll_no" id="Roll_no" class="form-control roll_no" required>
		</div>

		<div class="form-group">
			<label for="user_password">Password</label>
			<input type="password" id="password" name="password" class="form-control" required>
		</div>
		
		<div class="form-group">
			<label for="user_cnf_password">Conform Password</label>
			<input type="password" id="cnf_password" name="cnf_password" class="form-control" required>
			
		</div>
		
			<!--<div class="hide invisible">
            	 Password length should be greater than 8
			</div>-->
   
   		<div class="form-group">
   			<!-- <button name="sign_up" class="btn btn-primary disabled" type="button">Disabled Button</button>-->
			<button type="submit"  name="sign_up"  class="btn btn-primary">Submit</button>
		</div>
    </form>
    
    
 </section>
    
    </div><!--row-->
</div><!--Container-->
    
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
			/*$('.hide').removeClass('invisible');*/
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
		
	//confirm passord
	$('#cnf_password').keyup(function(){
		var pswd = $('#password').val();
		var cnf_pswd = $('#cnf_password').val();
		
	if(cnf_pswd.length < 8){
		$('#cnf_password').addClass('is-invalid');
			
			$('#cnf_password').after('<span class="is-invalid">Password must be at least 8 characters long</span>');
			$('button').addClass('disabled');
			$('#cnf_password').next().next().remove();
	}
	else{
		
		if(pswd !== cnf_pswd){
			$('#cnf_password').addClass('is-invalid');
			$('#cnf_password').after('<span class="is-invalid">Password entered are not matching   </span>');
			$('button').addClass('disabled');
			$('#cnf_password').next().next().remove();
			
		}
		 if(pswd == cnf_pswd){
			$('#cnf_password').removeClass('is-invalid').addClass('is-valid');
			$('#cnf_password').next().remove();
			$('button').removeClass('disabled');
		}
	
		
	}
		
		
	});		


});
	
	/*$(document).ready(function(){
	$("#Roll_no").keyup(funtion(){
		var roll_no = $("#Roll_no").val();
		
		if((roll_no >0 && roll_no <100)){
			$('#Roll_no').addClass("is-valid");
			$('button').removeClass('disabled');
		}
		else{
			$('#Roll_no').addClass("is-invalid");
			$('button').addClass('disabled');
		}
				
		});				 
	});
	*/
	
	</script>

</body>
</html>
