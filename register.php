<?php
require 'config.php';
// check if the registration form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
	// get the form data
  	$first_name = $_POST["first_name"];
  	$last_name = $_POST["last_name"];
  	$email = $_POST["email"];
  	$password = $_POST["password"];
  	$confirm_password = $_POST["confirm_password"];
  
  	// validate the form data
  	$errors = array();
  	if (empty($first_name)) {
    	$errors["first_name"] = "First name is required";
  	}
  	if (empty($last_name)) {
    	$errors["last_name"] = "Last name is required";
  	}
  	if (empty($email)) {
    	$errors["email"] = "Email is required";
  	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$errors["email"] = "Invalid email format";
  	}
  	if (empty($password)) {
    	$errors["password"] = "Password is required";
  	} else if ($password != $confirm_password) {
    	$errors["password"] = "Passwords do not match";
  	}
  
  	// if there are no validation errors, insert the user into the database
  	if (empty($errors)) {
    
	    
	    // create the SQL query to insert the user into the database
	    $sql = "INSERT INTO users (first_name, last_name, email, password)
	            VALUES ('$first_name', '$last_name', '$email', '$password')";
	    
	    // execute the SQL query
	    if (mysqli_query($conn, $sql)) {
	      	 echo '<script type="text/javascript">alert("Registered Successfully!")</script>';
	      	echo '<script language="javascript">window.location = "http://localhost:8080/lab/index.php";</script>';
	    } else {
	      	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	    }    
  	} else {
	    // if there are validation errors, display them to the user
	    foreach ($errors as $error) {
	      echo $error . "<br>";
	    }
  	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f1f1f1;
		}

		h1 {
			text-align: center;
		}

		form {
			background-color: #fff;
			padding: 20px;
			max-width: 500px;
			margin: 0 auto;
			box-shadow: 0px 0px 10px #ccc;
		}

		label {
			display: block;
			margin-bottom: 5px;
			font-weight: bold;
		}

		input[type=text],
		input[type=email],
		input[type=password] {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: none;
			border-radius: 3px;
			box-shadow: 0px 0px 5px #ccc;
			box-sizing: border-box;
		}

		input[type=submit] {
			background-color: #008CBA;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #3e8e41;
		}

		.login {
			text-align: center;
			margin-top: 20px;
		}

		.login a {
			color: #4CAF50;
			text-decoration: none;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<h1>Registration Page</h1>
	<form method="post" action="register.php">
		<label>First Name:</label>
		<input type="text" name="first_name" required>
		<label>Last Name:</label>
		<input type="text" name="last_name" required>
		<label>Email:</label>
		<input type="email" name="email" required>
		<label>Password:</label>
		<input type="password" name="password" required>
		<label>Confirm Password:</label>
		<input type="password" name="confirm_password" required>
		<center>
		<input type="submit" value="Register">
		</center>
	</form>
	<div class="login">
		Already have an account? <a href="index.php">Login here</a>
	</div>
</body>
</html>
