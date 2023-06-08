<?php 
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];
        $compName = $_POST['compName'];
        $compType = $_POST['compType'];
        $location = $_POST['location'];
        $progAllow = $_POST['progAllow'];
        $branchAllow = $_POST['branchAllow'];
        $minCPI = $_POST['minCPI'];
        $modeOfInt = $_POST['modeOfInt'];
        $noOfOA = $_POST['noOfOA'];
        $packOffer = $_POST['packOffer'];
        $posOffer = $_POST['posOffer'];

		if(!empty($email) && !empty($password) && !empty($compName) && !empty($compType) && !empty($location) && !empty($progAllow) && !empty($branchAllow) && !empty($minCPI) && !empty($modeOfInt) && !empty($noOfOA) && !empty($packOffer) && !empty($posOffer) )
		{
			//save to database
			$user_id = random_num(20);
			$query = "insert into company values ('$email','$password','$compName','$compType','$location','$progAllow','$branchAllow','$minCPI','$modeOfInt','$noOfOA','$packOffer','$posOffer','$user_id','$id')";

			mysqli_query($con, $query);

			header("Location: http://localhost/CS260_project/company_login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Profile Page</title>
	<style>
		body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
  }
  
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
  }
  
  h1 {
    margin-top: 0;
    text-align: center;
  }
  
  form {
    display: grid;
    grid-gap: 10px;
  }
  
  label {
    font-weight: bold;
  }
  
  input[type="text"],
  input[type="number"],
  select,
  textarea {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
  }
  
  select[multiple] {
    height: 120px;
  }
  
  input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  }
  
  input[type="submit"]:hover {
    background-color: #3e8e41;
  }
  
  /* Specific styles */
  
  .criteria-heading {
    margin-top: 30px;
    font-size: 20px;
    font-weight: bold;
  }
  
  .cpi-input {
    width: 100px;
  }
  
  .location-input {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 10px;
  }
  
  .mode-input {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
  }
  
  .position-input {
    margin-top: 30px;
  }
  
  /* Styles for specific company types */
  
  .tech-company .company-type {
    color: #1abc9c;
  }
  
  .finance-company .company-type {
    color: #3498db;
  }
  
  .core-company .company-type {
    color: #9b59b6;
  }
	</style>
</head>

<body>
	<div class="container">
		<h1>Company Register Page</h1>
		<form method="post">

			<h2>Sign Up</h2>
			<label for="email">Email:</label>
			<input type="text" id="email" name="email"><br><br>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password"><br><br>

			<label for="confirmpassword">Confirm Password:</label>
			<input type="password" id="confirmpassword" name="confirmpassword"><br><br>

			<h2>Details</h2>

			<label for="compName">Company Name:</label>
			<input type="text" id="compName" name="compName"><br><br>

			<label for="compType">Company Type:</label>
			<select id="compType" name="compType">
				<option value="tech">Tech Company</option>
				<option value="finance">Finance Company</option>
				<option value="core">Core Company</option>
			</select><br><br>

			<label for="location">Location:</label>
			<input type="text" id="location" name="location"><br><br>

			<h2>Criteria</h2>

			<label for="progAllow">Programmes Allowed:</label>
			<select id="progAllow" name="progAllow">
				<option value="Btech">B.Tech</option>
				<option value="Mtech">M.Tech</option>
				<option value="PHD">PhD</option>
			</select><br><br>

			<label for="branchAllow">Branches Allowed:</label>
			<select id="branchAllow" name="branchAllow">
				<option value="CSE">CSE</option>
				<option value="AI">AI</option>
				<option value="EEE">EEE</option>
				<option value="MNC">MNC</option>
				<option value="CB">CB</option>
				<option value="CE">CE</option>
				<option value="PH">PH</option>
				<option value="MME">MME</option>
			</select><br><br>

			<label for="minCPI">Minimum CPI:</label>
			<input type="number" id="minCPI" name="minCPI" min="0" max="10" step="any"><br><br>

			<h2>Interview</h2>

			<label for="modeOfInt">Mode of Interview:</label>
			<select id="modeOfInt" name="modeOfInt">
				<option value="online">Online</option>
				<option value="offline">Offline</option>
			</select><br><br>

			<label for="noOfOA">Number of OA Rounds:</label>
			<input type="number" id="noOfOA" name="noOfOA"><br><br>

			<h2>Company Offer</h2>

			<label for="packOffer">Package Offered:</label>
			<input type="number" id="packOffer" name="packOffer"><br><br>

			<label for="posOffer">Position Offered:</label>
			<input type="text" id="posOffer" name="posOffer"><br><br>

			<input type="submit" value="Save">
		</form>
	</div>
</body>

</html>