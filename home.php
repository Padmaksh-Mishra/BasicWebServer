<?php
require 'config.php';
session_start();

if(!isset($_SESSION['sess_user'])){
    header('Location: index.php');
}

// Fetch user's information from database
$email = $_SESSION['sess_user'];
$result = mysqli_query($conn, "select * from users where email = '$email'");
$row = mysqli_fetch_array($result);

$user_id = $row['id'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];

?>


<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
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

        .button:hover {
            background-color: #3e8e41;
        }

        .btn {
            background-color:  #008CBA;
        }
        .button-container {
          text-align: center;
        }

        .button-container form {
          display: inline-block;
          margin: 0 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1 class="heading">Welcome! <?php echo $first_name . ' ' . $last_name; ?></h1>

        <div class="button-container">
        <form method="POST" action="update.php">
            <button type="submit" class="button btn" name="update">Update Details</button>
        </form>

        <form action="details.php" method="post">
            <input type="hidden" name="first_name" value="<?php echo $first_name; ?>">
          <input type="hidden" name="last_name" value="<?php echo $last_name; ?>">
          <input type="hidden" name="email" value="<?php echo $email; ?>">
             <button type="submit" class="button btn" name="show_details">Show Details</button>
        </form>

        <form method="POST" action="delete.php">
            <button type="submit" class="button btn" name="delete">Delete Account</button>
        </form>
        <form method="post" action="logout.php">
            <button type="submit" class="button btn">Logout</button>
        </form>
        </div>
    </div>
</body>
</html>
