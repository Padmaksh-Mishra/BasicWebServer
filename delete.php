<?php
require 'config.php';
session_start();

if(!isset($_SESSION['sess_user'])){
    header('Location: index.php');
}

$email = $_SESSION['sess_user'];

if(isset($_POST["Yes"])){

    $query = "delete from users where email = '$email'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo '<script type="text/javascript">alert("Account Deleted Succesfully!")</script>';
        echo '<script language="javascript">window.location = "http://localhost:8080/lab/index.php";</script>';
    }
    else{
        echo '<script type="text/javascript">alert("Error!")</script>';
    }
}


if(isset($_POST["No"])){
    echo '<script language="javascript">window.location = "http://localhost:8080/lab/home.php";</script>';

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
</head>

<style>
    .body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .heading {
            font-size: 36px;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }
        .button:hover {
            background-color: #3e8e41;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 5px;
            cursor: pointer;
            border-radius: 4px;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }
        .btn {
            background-color:  #008CBA;
        }
</style>


<body>
    <center><h1> Are you sure you want to delete your account?</h1>

    <form method="post">
        <input type="submit" name="Yes"
                class="button btn" value="Yes, Delete My Account!" />
        <input type="submit" name="No"
                class="button btn" value="No, Take me Back!" />
        </form>
        </center>
    </body>
</html>