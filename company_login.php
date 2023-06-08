<?php 

session_start();

	include("connection.php");
	include("company_functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{

			//read from database
			$query = "SELECT * FROM company WHERE email = '$email' LIMIT 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						$_SESSION['email'] = $user_data['email'];
						header("Location: http://localhost/CS260_project/company_portal.php");
						die;
					}
				}
			}			
			echo "wrong email or password!";
		}else
		{
			echo "wrong email or password!";
		}
	}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <style>
        /* Styling for the page */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        form {
            margin: 0 auto;
            width: 400px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .signup-link {
            text-align: center;
        }

        .signup-link a {
            color: #4caf50;
        }
    </style>
</head>

<body>
<h1 >TPC Portal </h1>
    <h1 style="color:lightgreen">Company Login</h1>
    <form action="#" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">

        <div class="signup-link">
            <a href="http://localhost/CS260_project/company_register.php">Register</a>
        </div>
    </form>
</body>

</html>