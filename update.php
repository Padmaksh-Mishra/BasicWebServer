<?php
//Connect to MySQL 
require 'config.php';
session_start();

function endsWith($string, $smol)
{
  $len = strlen($smol);
  if ($len == 0) {
    return true;
  }
  return substr($string, -$len) === $smol;
}

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
    header("location: index.php");
}
$email = $_SESSION['sess_user'];
$result = mysqli_query($conn, "select * from users where email = '$email'");
$row = mysqli_fetch_array($result);

$Fname = $row["first_name"];
$Lname = $row["last_name"];
$pass = $row["password"];

if (isset($_POST['Submit'])){
    $new_fname = $_POST["fName"];
    $new_lname = $_POST["lName"];
    $new_pass1 = $_POST["pass1"];
    $new_pass2 = $_POST["pass2"];

    $number = preg_match('@[0-9]@', $new_pass1);         //password strength
    $uppercase = preg_match('@[A-Z]@', $new_pass1);
    $lowercase = preg_match('@[a-z]@', $new_pass1);
    $specialChars = preg_match('@[^\w]@', $new_pass1);

    if($new_pass1 != $new_pass2){
        echo '<script type="text/javascript">alert("Passwords Dont Match!")</script>';
    }
    else{
        if(!endsWith($email, '@iitp.ac.in')){
            echo '<script type="text/javascript">alert("Enter IIT Patna email only!")</script>';
        }
        else{
            $query = "update users set first_name = '$new_fname', last_name = '$new_lname', password = '$new_pass1'";
            $result = mysqli_query($conn, $query);

            if($result){
                echo '<script type="text/javascript">alert("Updated Successfully!")</script>';
                echo '<script language="javascript">window.location = "http://localhost:8080/lab/home.php";</script>';
            }
            else{
                echo '<script type="text/javascript">alert("Error!")</script>';
            }
        }
    }

}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
</head>

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

        .button-link {
          display: inline-block;
          padding: 8px 16px;
          background-color: #008CBA;
          color: #fff;
          text-decoration: none;
          border-radius: 4px;
          font-weight: bold;
          transition: background-color 0.3s ease;
        }
        .button-link:hover {
          background-color: #3e8e41;
        }
        
</style>

<body>
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <center>
        <p class = "heading">
            <h1>Update Profile</h1>
    </p>
    </center>
        <p class = "top">
    <form action="" method="post">
        <label for="FirstName">First Name:</label>
        <input type="text" id="FirstName" name="fName" value = "<?php echo $Fname ?>" required>

        <label for="LastName">Last Name:</label>
        <input type="text" id="LastName" name="lName" value = "<?php echo $Lname ?>" required>

        <label for="Password1">Password:</label>
        <input type="password" id="Password1" name="pass1" value = "<?php echo $pass ?>" required>

        <label for="Password2">Confirm Password:</label>
        <input type="password" id="Password2" name="pass2" value = "<?php echo $pass ?>" required>
        <center>
        
            <input type="submit"  value = 'Update Details' name = "Submit">
            </center>
        </form>
        <center>
            <a href="home.php" class="button-link">Go Back</a>
        </center>
            
            

</body>
</html>