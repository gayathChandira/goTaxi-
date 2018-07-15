<?php
	session_start();

	if(isset($_POST['signup'])){
		include_once 'dbh.inc.php';    //connecting to database

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['psw']);
		$passwordrepeat = mysqli_real_escape_string($conn, $_POST['psw-repeat']);

		//check for empty fields
		if (empty($username) || empty($email) || empty($password) || empty($passwordrepeat)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	 	}else{
	 		// check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo '<script language="javascript">
					alert("Please Check the Email and try agein!");window.location.replace("../?signup=email");
					</script>'; 
				//header("Location: ../signup.php?signup=email");
				exit();
			}else{
				// check if the username existed 
				$sql =  "SELECT * FROM users WHERE username ='$username' ";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=userTaken");
					exit();
				}else{
					//check if both passwords are same
					if($password != $passwordrepeat){
						header("Location: ../signup.php?signup=userTaken");
						exit();
					}else{
						//create user
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT); //hashed password
						$sql = "INSERT INTO users (username,email,password) 
						VALUES ('$username','$email','$hashedPwd')";
						$result = mysqli_query($conn, $sql);

						$_SESSION['usersigned'] = $username;    //create a session for signing up 
						header("Location: ../?signup=success");
						exit();
					}	
					
					
				}

	 		}
		}
	}
?>
