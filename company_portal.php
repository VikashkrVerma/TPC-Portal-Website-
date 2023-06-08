<?php 
session_start();

	include("connection.php");
	include("company_functions.php");

    $user_data = check_login($con);

	$result = NULL;

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$branch = $_POST['branch'];
		$cpi = $_POST['cpi'];

		if(!empty($branch) && !empty($cpi))
		{
			$query = "SELECT name,prog,branch,cpi,email FROM student WHERE cpi > '$cpi' AND branch = '$branch' ORDER BY cpi DESC";

			$result = mysqli_query($con, $query);
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>offer_stats</title>
    <style>
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
            width: 600px;
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

        .button_Login{
            text-align: center;
        }

        .signup_link {
            text-align: center;
        }

        .signup_link a {
            color: #4caf50;
        }
        header {
			background-color: #4caf50;
			color: #fff;
			padding: 10px 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		nav {
			background-color: #4caf50;
			padding: 10px;
		}
		nav ul {
			list-style: none;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		nav li {
			position: relative;
			margin: 0;
			padding: 0;
			flex: 1;
			text-align: center;
		}
		nav a {
			display: block;
			padding: 10px 20px;
			color: #f2f2f2;
			font-size: 18px;
			text-decoration: none;
		}
		nav ul ul {
			display: none;
			position: absolute;
			top: 100%;
			left: 0;
			background-color: #f2f2f2;
			width: 100%;
			z-index: 1;
		}
		nav ul ul li {
			display: block;
			width: 100%;
		}
		nav ul ul a {
			padding: 10px 20px;
			color: #333;
			font-size: 16px;
			text-decoration: none;
			display: block;
			text-align: left;
		}
		nav li:hover > ul {
			display: block;
		}
        header img {
			height: 100px;
			margin-right: 10px;
		}
    </style>
</head>
<body>


<header>
		<img src="http://localhost/CS260_project/iitplogo.jpg" alt="IITP Logo">
		Hello <?php echo  $user_data['compName']; ?> !
		<nav>
			<ul>
				<a href="http://localhost/CS260_project/company_profile.php">Profile</a>
			    <a href="logout.php">Log Out</a>
			</ul>
		</nav>
	</header>

    <h1 style="color:lightgreen">Find the best students you can get!</h1>
		<form action="#" method="post">

            <p>Enter the following information to get eligible student list</p>
            <label for="branch">Branch:</label>
            <select id="branch" name="branch" style="width:50%">
            <option value="cse">CSE</option>
            <option value="ai">AI</option>
            <option value="mnc">MNC</option>
            <option value="eee">EEE</option>
             <option value="me">ME</option>
              <option value="cb">CB</option>
              <option value="ce">CE</option>
              <option value="ep">EP</option>
              <option value="mme">MME</option>

            </select><br><br>

            <label for="cpi">CPI:</label>
			<input id="cpi" type="number" name="cpi" min="0" max="10"  step="0.01" style="width:50%"><br><br>
			
            <div class="submit">
            <input id="submit" type="submit" value="SUBMIT"><br><br>
		</div>
        <table border ="1" cellspacing="0" cellpadding="10">
  <tr>
  <th>Sr.No.</th>
    <th>Name</th>
    <th>Program enrolled</th>
    <th>Branch</th>
    <th>CPI</th>
    <th>Email</th>
  </tr>
<?php
if ($result) {if(mysqli_num_rows($result) > 0){
  $sn=1;
  while($data = mysqli_fetch_assoc($result)) {
 ?>
 <tr>
 <td><?php echo $sn; ?> </td>
   <td><?php echo $data['name']; ?> </td>
   <td><?php echo $data['prog']; ?> </td>
   <td><?php echo $data['branch']; ?> </td>
   <td><?php echo $data['cpi']; ?> </td>
   <td><?php echo $data['email']; ?> </td>
 <tr>
 <?php
  $sn++;}}else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } } else { ?>
    <tr>
     <td colspan="8">No data found</td>
    </tr>

 <?php } ?>
  </table>
    </form>
    
</body>
</html>