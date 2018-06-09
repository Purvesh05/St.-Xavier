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
<br>

<div class="container">
	<div class="row">
<table class="table table-bordered ">
	<thead class="text-center">
		<th>Subject</th>
		<th>Unit-1</th>
		<th>Sem-1</th>
		<th>Unit-2</th>
		<th>Sem-2</th>
	</thead>
	<tbody class='text-center'>
		
			<?php
		session_start();
if(isset($_SESSION['roll_no'])){
$roll_no = $_SESSION['roll_no'];
$std = $_SESSION['std'];	



$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="school";
 
foreach($db as $key => $value){
	define(strtoupper($key),$value);
	
}

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


include("includes/function.php");
			
			
			
			
		$query = "select * from ".$std."th where roll_no = $roll_no";
		$select_result_query = mysqli_query($conn,$query);
		
		 $count = mysqli_num_rows($select_result_query);
		
	if($count > 0 ){
		if(!$select_result_query){
			die("Error ".mysqli_error($conn));
		}	
		
			$total_unit = 0;
			$total_sem = 0;
		
			$total_unit_1 = 0;
			$total_sem_1 = 0;
			$total_unit_2 = 0;
			$total_sem_2 = 0;
		
			while($row = mysqli_fetch_array($select_result_query)){
				$subject = $row['subject'];
				$unit_1 = $row['Unit 1'];
				$sem_1 = $row['Sem 1'];
				$unit_2 = $row['Unit 2'];
				$sem_2 = $row['Sem 2'];
				
				$total_unit = $total_unit + 20;
				$total_sem = $total_sem + 80;
				
				$total_unit_1 = $total_unit_1 + $unit_1;
				$total_sem_1 = $total_sem_1 + $sem_1;
				$total_unit_2 = $total_unit_2 + $unit_2;
				$total_sem_2 = $total_sem_2 + $sem_2;
				
				
				
				
				
				echo "
						<tr>
						<td >$subject</td>
						<td>$unit_1</td>
						<td>$sem_1 </td>
						<td>$unit_2</td>
						<td>$sem_2</td>
						</tr>
		
				 ";
				
			}
			
		
			
			
			

			?>
		
		
		<tr>
			<td>Total</td>
			<td><?php echo $total_unit_1; ?></td>
			<td><?php echo $total_sem_1; ?></td>
			<td><?php echo $total_unit_2; ?></td>
			<td><?php echo $total_sem_2; ?></td>
		</tr>
		<tr>
			<td>Percentage</td>
			<td><?php echo round(($total_unit_1*100)/$total_unit,2); ?>%</td>
			<td><?php echo round(($total_sem_1*100)/$total_sem,2); ?>%</td>
			<td><?php echo round(($total_unit_2*100)/$total_unit,2); ?>%</td>
			<td><?php echo round(($total_sem_2*100)/$total_sem,2); ?>%</td>
		</tr>
		
	</tbody>
</table>
	
	<?php
	}
	else{
		echo "Ur Marks are Not enterd till now";
	}
}
		else{
		
			die("Not logedin".mysqli_error($conn));
		}
		?>
</div><!--row-->
</div><!--container-->	
   
    <!--
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>-->


	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	
</body>
</html>