<?php
    session_start();
    if(!isset($_SESSION['adminlogged'])){
        header("Location:http://localhost/Trial/");   //if someone try to access this page by address bar
    }                                                 //this will redirect them in main page.

?>
<!DOCTYPE html>
<html>
<head>
	<title>Driver Details</title>
	<link rel="stylesheet" type="text/css" href="driverstyles.css">
	<link rel="shortcut icon" type="image/png" href="img/favicon2.png">
	<script src="script.js"></script>
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
                       
                <h1 style="color: #fff;">Diver Details</h1>

                <a href="#" class="btn btn--white btn--animated" onclick="document.getElementById('id03').style.display='block'">Add Driver Details</a>
                <a href="#" class="btn btn--white btn--animated" onclick="document.getElementById('id04').style.display='block'">Remove Driver Details</a>
                

            </div>
	</header>
	<table align="center">       <!-- driver details table -->
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>NIC</th>
			<th>Age</th>
			<th>Vehicle Type</th>
			<th>Contact</th>
			<th> </th>
		</tr>
		<?php
			include_once('includes/dbh.inc.php');
			$sql = "SELECT id,nic,firstname,lastname,age,contact,vehicletype FROM  driverdetails";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0){
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>".$row['id']."</td><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['nic']."</td><td>".$row['age']."</td><td>".$row['vehicletype']."</td><td>".$row['contact']."</td><td><form method=\"POST\" action=\"edit.php\" ><input name=\"uniID\" type=\"hidden\" value=".$row['id']."><input type='submit' value=\"Edit\" ></form></td></tr>";
				}echo "</table>";
			}else{
				echo "0 results";
			}
		?>
	</table>

                   <!-- add driver details form -->
	<div id="id03" class="modal">
	  <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <form class="modal-content" action="includes/adddriver.inc.php" method="POST">
	    <div class="container">
	      <h1>Add Driver</h1>
	      <p>Please Enter Driver Details.</p>
	      <hr>

	      <label for="username"><b>First Name</b></label>
	      <input type="text" placeholder="Enter First name" name="firstname" required>

	      <label for="username"><b>Last Name</b></label>
	      <input type="text" placeholder="Enter Last name" name="lastname" required>

	      <label for="email"><b>NIC Number</b></label>
	      <input type="text" placeholder="Enter NIC No" name="nic" required>

	      <label for="psw"><b>Age</b></label>
	      <input type="text" placeholder="Enter Age" name="age" required>

	      <label for="psw-repeat"><b>Vehicle Type</b></label>
	      <input type="text" placeholder="vehicletype" name="vehicletype" required>

	      <label for="psw"><b>Contact No</b></label>
	      <input type="text" placeholder="Enter Contact No" name="contact" required>

	     
	    
	      <div class="clearfix">
	        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn"><p class="sig-t">Cancel</p></button>
	        <button type="submit" class="signup" name="submit"><p class="sig-t">Submit</p></button>
	      </div>
	    </div>
	  </form>
	</div>

  <!-- remove driver details form -->

	<div id="id04" class="modal">
	  <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
	  <form class="modal-content" action="includes/deletedriver.inc.php" method="POST">
	    <div class="container">
	      <h1>Remove Driver</h1>
	      <p>Please Select the driver.</p>
	      <hr>
	      	
	      	<select name="driver">
				
				<?php
					include_once('includes/dbh.inc.php');
					$sql = "SELECT id,firstname FROM driverdetails";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_array($result)){
						echo "<option value='". $row['id'] ."'>" .$row['id']."  ".$row['firstname'] ."</option>" ;
								}
				?>
			</select>
	      	
	      	
	     
	    
	      <div class="clearfix">
	        <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn"><p class="sig-t">Cancel</p></button>
	        <button type="submit" class="signup" name="submit"><p class="sig-t">Submit</p></button>
	      </div>
	    </div>
	  </form>
	</div>


</body>
</html>