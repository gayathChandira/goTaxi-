<?php
session_start();

if(isset($_POST['login'])){
	include 'dbh.inc.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['psw']);

	//check if inputs are empty

	if (empty($username) || empty($password)) {
		header("Location: ../login.php?login=empty");
		exit();
	}else{

		if($username == "admin" && $password == "admin123"){ //check if admin logged in
			$_SESSION['adminlogged'] = "Admin";
			header("Location: ../?login=successadmin");
			exit();
		}else{
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			if($resultCheck < 1){               //check the username is available in database
				echo '<script language="javascript">
					alert("Please Check the Username & Password");
					window.location.replace("../?login=error1");
					</script>';    //give alert and redirect to main page.
				//header("Location: ../?login=error1");
				exit();
			}else{
				if ($row = mysqli_fetch_assoc($result)) {
					//verify password 
					$hashedpwdCheck = password_verify(  $_POST['psw'] , $row['password']);
					if ($hashedpwdCheck == false) {          //if password is not match with the database
						echo '<script language="javascript">
						alert("Please Check the Password");
						window.location.replace("../?login=error2");
						</script>';
						//header("Location: ../index.php?login=error2");
						exit();
					}elseif ($hashedpwdCheck == true){
						// log in user here
							$_SESSION['username'] = $row['username'];
							$_SESSION['email'] = $row['email'];
							header("Location: ../?login=success");
							exit();
						}
					
				}
			}
		}
	}

}	

?>


