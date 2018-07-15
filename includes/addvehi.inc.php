<?php
session_start();	
	if(isset($_POST['submit'])){
		include_once 'dbh.inc.php';    //connecting to database
	if(isset($_POST['condition'])) {	 
	  	foreach ($_POST['condition'] as $key ) {	   
	   	$conList .= $key .',' ;      //get conditon checklist into a string name $conList
    	} 
	}
	     
		$vehitype = mysqli_real_escape_string($conn, $_POST['vehitype']);
		$brand = mysqli_real_escape_string($conn, $_POST['brand']);
		$model = mysqli_real_escape_string($conn, $_POST['model']);
		$regno = mysqli_real_escape_string($conn, $_POST['regNo']);
		$seats = mysqli_real_escape_string($conn, $_POST['seats']);
		//$condition = mysqli_real_escape_string($conn, $_POST['condition']);
		$fueltype = mysqli_real_escape_string($conn, $_POST['fueltype']);
		
		$sql = "INSERT INTO  vehicledetails (vehitype,brand,model,regNo,seats,aircondition,fueltype) 
						VALUES ('$vehitype','$brand','$model','$regno','$seats','$conList','$fueltype')";
		$result = mysqli_query($conn, $sql);
		header("Location: ../vehicledetails.php?submit=success");
		exit();

	}
?>