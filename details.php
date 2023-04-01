<!DOCTYPE html>
<html>
<head>
	<title>Show Details</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		table {
			margin: 0 auto;
			border-collapse: collapse;
			border: 2px solid #ddd;
			width: 50%;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);

		}
		td, th {
			padding: 10px;
			border: 1px solid #ddd;
			text-align: left;
			font-size: 16px;
		}
		th {
			background-color: #f2f2f2;
			font-weight: bold;
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
	</style>
</head>
<body>
	<h1>User Details</h1>
	<center>
	<table>
		<tr>
			<th>First Name</th>
			<td><?php echo $_POST['first_name']; ?></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><?php echo $_POST['last_name']; ?></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><?php echo $_POST['email']; ?></td>
		</tr>
	</table>
	<a href="home.php" class="button btn">Back to Home</a>
	</center>
</body>
</html>
