<?php
    session_start();
    if(!isset($_SESSION['adminlogged'])){
        header("Location:http://localhost/Trial/");   //if someone try to access this page by address bar
    }                                                 //this will redirect them in main page.

?>


<!DOCTYPE html>
<html>
<head>
	<title>GOTAXI | Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="panelstyles.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon2.png">
	
</head>
<body>
	<header class="header">
		<div class="header__text-box">
                <h1 class="heading-primary">
                <span class="heading-primary--main"><span class="go">GO</span>TAXI</span>
                <span class="heading-primary--sub">Your traveling companion</span>
                </h1>
                       
                    <a href="driverdetails.php" class="btn btn--white btn--animated">Driver Details</a>
                    <a href="vehicledetails.php" class="btn btn--white btn--animated">Vehicle Details</a>                         
            </div>
	</header>
</body>
</html>