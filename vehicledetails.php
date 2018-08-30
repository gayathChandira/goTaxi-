<?php
    session_start();
    if(!isset($_SESSION['adminlogged'])){
        header("Location:http://localhost/Trial/");   //if someone try to access this page by address bar
    }                                                 //this will redirect them in main page.

?>
<!DOCTYPE html>
<html>
<head>
	<title>Vehicle Details</title>
	<link rel="stylesheet" type="text/css" href="driverstyles.css">
	<link rel="shortcut icon" type="image/png" href="img/favicon2.png">
	<script src="script.js"></script>
	<style type="text/css">
		td{
    		padding: 0px 0px;
    	}table{font-size: 22px;}th{padding: 0px 22px;}tr{text-align: center;}
	</style>
</head>
<body>
	<header class="header">
		<div class="header__logo-box">
            <a href="/Trial/"><img src="img/favicon2.png" alt="logo" class="header__logo"></a>
        </div>
		<div class="header__text-box">
                <h1 class="heading-primary">
                <span class="heading-primary--main"><span class="go">GO</span>TAXI</span>
                <span class="heading-primary--sub">Your traveling companion</span>
                </h1>
                       
                <h1 style="color: #fff;">Vehicle Details</h1>

                <a href="#" class="btn btn--white btn--animated" onclick="document.getElementById('id05').style.display='block'">Add Vehicle Details</a>
                <a href="#" class="btn btn--white btn--animated" onclick="document.getElementById('id06').style.display='block'">Remove Vehicle Details</a>

        </div>
	</header>
	<table align="center">
		<tr>
			<th>ID</th>
			<th>Vehicle Type</th>
			<th>Brand</th>
			<th>Model</th>
			<th>Reg No</th>
			<th>No of Seats</th>
			<th>Condition</th>
			<th>Fuel Type</th>
		</tr>
		<?php
			include_once('includes/dbh.inc.php');
			$sql = "SELECT id,vehitype,brand,model,regNo,seats,aircondition,fueltype FROM  vehicledetails";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0){
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>".$row['id']."</td><td>".$row['vehitype']."</td><td>".$row['brand']."</td><td>".$row['model']."</td><td>".$row['regNo']."</td><td>".$row['seats']."</td><td>".$row['aircondition']."</td><td>".$row['fueltype']."</td></tr>";
				}echo "</table>";
			}else{
				echo "0 results";
			}
		?>
	</table>

                   <!-- add vehicle details form -->
	<div id="id05" class="modal">
	  <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <form class="modal-content" action="includes/addvehi.inc.php" method="POST">
	    <div class="container">
	      <h1>Add Vehicles</h1>
	      <p>Please Enter Vehicle Details.</p>
	      <hr>

	      <label for="username"><b>Vehicle Type</b></label>
	      <select name="vehitype">
	      	<option value="car">Car</option>
	      	<option value="van">Van</option>
	      	<option value="bus">Bus</option>
	      	<option value="tuk">Tuk Tuk</option>
	      	<option value="bike">Motor bike</option>
	      	<option value="suv">SUV</option>
	      	<option value="jeep">Jeep</option>
	      </select>

	      <label for="username"><b>Brand</b></label>
	      <input type="text" placeholder="Enter Brand name" name="brand" required>

	      <label for="email"><b>Model</b></label>
	      <input type="text" placeholder="Enter Model" name="model" required>

	      <label for="psw"><b>Registered No</b></label>
	      <input type="text" placeholder="Enter Registered No" name="regNo" required>

	      <label for="psw-repeat"><b>No of Seats</b></label>
	      <input type="text" placeholder="Seats" name="seats" required>

	      <label for="psw"><b>Condition</b></label><br>
	      <input type="checkbox" name="condition[]" value="ac"> air conditioned<br>
		  <input type="checkbox" name="condition[]" value="fulloption"> full option<br>
		  <input type="checkbox" name="condition[]" value="offroad"> off road<br><br>

		  <label for="username"><b>Fuel Type</b></label>
	      <select name="fueltype">
	      	<option value="petrol">Petrol</option>
	      	<option value="diesel">Diesel</option>
	      	<option value="hybrid">Hybrid</option>
	      	<option value="electric">Electric</option>	      	
	      </select>
	     
	    
	      <div class="clearfix">
	        <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn"><p class="sig-t">Cancel</p></button>
	        <button type="submit" class="signup" name="submit"><p class="sig-t">Submit</p></button>
	      </div>
	    </div>
	  </form>
	</div>

  <!-- remove vehicle details form -->

	<div id="id06" class="modal">
	  <span onclick="document.getElementById('id06').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <form class="modal-content" action="includes/deletevehi.inc.php" method="POST">
	    <div class="container">
	      <h1>Remove Vehicle</h1>
	      <p>Please Select the vehicle.</p>
	      <hr>
	      	
	      	<select name="vehicle">
				
				<?php
					include_once('includes/dbh.inc.php');
					$sql = "SELECT id,regNo FROM vehicledetails";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($result)){
						echo "<option value='". $row['id'] ."'>" .$row['id']."  ".$row['regNo'] ."</option>" ;
								}
				?>
			</select>
	      	
	      	
	     
	    
	      <div class="clearfix">
	        <button type="button" onclick="document.getElementById('id06').style.display='none'" class="cancelbtn"><p class="sig-t">Cancel</p></button>
	        <button type="submit" class="signup" name="submit"><p class="sig-t">Submit</p></button>
	      </div>
	    </div>
	  </form>
	</div>
</body>
</html>