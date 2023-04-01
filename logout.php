<?php
require 'config.php';
session_start();

session_destroy();
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
            background-color: #008CBA;
        }
</style>


<body>
    <p class = "heading">
    <center><h1 class = "top"> You have been logged out</h1>
    <form method="post" action="index.php">
        <button type="submit" class="button btn">Login Page</button>
    </form>
</center>
</body>
</html>