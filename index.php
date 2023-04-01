<?php
require 'config.php';

if(isset($_POST["Submit"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "select * from users where email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) != 0){

        session_start();
        $_SESSION['sess_user'] = $email;
        header ('Location: home.php');
    }
    else{
        echo '<script type="text/javascript">alert("Invalid Email or Password!")</script>';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
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

		.register {
			text-align: center;
			margin-top: 20px;
		}

		.register a {
			color: #4CAF50;
			text-decoration: none;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<h1>Login Page</h1>
	<form method="post" action="">
		<label>Email:</label>
		<input type="email" name="email" required>
		<label>Password:</label>
		<input type="password" name="password" required>
		<center>
		<input type="submit" value="Login" name="Submit">
		</center>
	</form>
	<div class="register">
		New user? <a href="register.php">Register here</a>
	</div>
</body>
</html>
