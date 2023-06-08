<?php

session_start();

if(isset($_SESSION['email']))
{
	unset($_SESSION['email']);

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>logout</title>
	<style>
		h1 {
			text-align: center;
		}
		.login_link {
		text-align: center;
	  }
	  .login_link a {
		color: #4caf50;
	  }
	</style>
</head>
<body>
    <h1><i>Thank you!</i></h1>
		
	<div class="login_link">
		<a href="http://localhost/CS260_project/index.php"  style="color: #4caf50;" > Go Back to Main Page</a>
	  </div>
	
</body>
</html>