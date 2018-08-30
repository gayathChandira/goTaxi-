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

                
                

            </div>

	</header>
    <form class="modal-content" action="includes/edit.ini.php" method="POST">
        <div class="container">
          <h1>Edit Driver</h1>
          <p>Edit Driver Details.</p>
          <hr>
                <?php
                include_once('includes/dbh.inc.php');
                $id = $_POST['uniID'];
                $sql = "SELECT firstname,lastname,nic,age,vehicletype,contact FROM driverdetails WHERE id=$id";
                              
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                    $fn = $row['firstname'];
                    $ln = $row['lastname'];
                    $nic = $row['nic'];
                    $age = $row['age'];
                    $vt = $row['vehicletype'];
                    $cont = $row['contact'];
                }
                    ?>
                  <input type="hidden" name="iddri" value="<?php echo $id; ?> ">
                  <label for="username"><b>First Name</b></label>
                  <input type="text" value="<?php echo $fn;?>" name="firstname" required>
                  
                  <label for="username"><b>Last Name</b></label>
                  <input type="text" value="<?php echo $ln;?>" name="lastname" required>

                  <label for="email"><b>NIC Number</b></label>
                  <input type="text" value="<?php echo $nic;?>" name="nic" required>

                  <label for="psw"><b>Age</b></label>
                  <input type="text" value="<?php echo $age;?>" name="age" required>

                  <label for="psw-repeat"><b>Vehicle Type</b></label>
                  <input type="text" value="<?php echo $vt;?>" name="vehicletype" required>

                  <label for="psw"><b>Contact No</b></label>
                  <input type="text" value="<?php echo $cont;?>" name="contact" required>

         
        
          <div class="clearfix">
            <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn"><p class="sig-t">Cancel</p></button>
            <button type="submit" class="signup" name="submit"><p class="sig-t">Submit</p></button>
          </div>
        </div>
      </form>