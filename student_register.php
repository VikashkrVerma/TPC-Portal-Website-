<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phoneno = $_POST['contact_number'];
    $prog = $_POST['programme_enrolled'];
    $branch = $_POST['branch'];
    $yop = $_POST['year_of_passing'];
    $placed = $_POST['placed'];
    $ten_class =$_POST['class_10_marks'];
    $twelve_class =$_POST['class_12_marks'];
    $cpi = $_POST['current_cpi'];

    /**/ 

    $curr_pack = $_POST['package'];
    $curr_compName = $_POST['company'];
    
    if (!empty($email) && !empty($password) && !empty($name) && !empty($gender) && !empty($age) && !empty($phoneno) && !empty($prog) && !empty($branch) && !empty($yop)) {
        //save to database
        $user_id = random_num(20);
        $query = "insert into student values ('$email','$password','$name','$gender','$age','$phoneno','$ten_class','$twelve_class','$cpi','$prog','$branch','$yop','$curr_pack','$curr_compName','$id','$user_id')";

        mysqli_query($con, $query);

        header("Location: http://localhost/CS260_project/student_login.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Profile Page</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/CS260_project/style.css">
</head>

<body>
	<div class="container">
		<h1>Student Register Page</h1>
		<form method="post">

			<h2>Sign Up</h2>
			<label for="email">Email:</label>
			<input type="text" id="email" name="email"><br>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password"><br>

			<label for="confirm-password">Confirm Password:</label>
			<input type="password" id="confirmpassword" name="confirmpassword"><br>

			<h2>Personal Details</h2>

			<label for="Name">Name:</label>
			<input type="text" id="name" name="name"><br>

            <label>Gender:</label>
            <div>
              <input type="radio" name="gender" value="male" id="male">
              <label for="male">Male</label>
            </div>
            <div>
              <input type="radio" name="gender" value="female" id="female">
              <label for="female">Female</label>
            </div><br>
            

            <label for="Age">Age:</label>
			<input type="number" id="age" name="age"><br>

            <label for="ContactNumber">Contact Number:</label>
			<input type="text" id="contact_number" name="contact_number"><br>

            <h2>Academic Details</h2>


            <label>Class 10 Marks (in %):</label>
            <input type="number" name="class_10_marks" id="class_10_marks" min="0" max="100" step="0.01" required><br>

            <label>Class 12 Marks (in %):</label>
            <input type="number" name="class_12_marks" id="class_12_marks" min="0" max="100" step="0.01" required><br>

            <label>Current CPI:</label>
            <input type="number" name="current_cpi" id="current_cpi" min="0" max="100" step="0.01" required><br>

            <label>Programme Enrolled:</label>
            <select name="programme_enrolled" id="programme_enrolled" required>
              <option value="">Select a programme</option>
              <option value="BTech">BTech</option>
              <option value="MTech">MTech</option>
              <option value="PhD">PhD</option>
            </select><br>

            <label>Branch:</label>
            <select name="branch" id="branch" required>
              <option value="">Select Branch</option>
              <option value="cse">CSE</option>
              <option value="ai">AI</option>
              <option value="eee">EEE</option>
              <option value="mnc">MNC</option>
              <option value="me">ME</option>
              <option value="cb">CB</option>
              <option value="ce">CE</option>
              <option value="ep">EP</option>
              <option value="mme">MME</option>
            </select><br>

            <label for="YearofPassing">Year of Passing:</label>
			<input type="number" id="year_of_passing" name="year_of_passing"><br>
            
            
            <label>Placed or not:</label>
            <div>
            <input type="radio" name="placed" value="yes" id="placed_yes">
            <label for="placed_yes">Yes</label>
            </div>
            <div>
            <input type="radio" name="placed" value="no" id="placed_no">
            <label for="placed_no">No</label>
            </div>

            <div id="placed_details" style="display: none;">
            <label>Current Package in LPA:</label>
            <input type="number" name="package" step="0.01" min="0" value="0"><br>
            <label>Current Company:</label>
            <input type="text" name="company" value="NULL">
            </div>

            <script>
            const placedYes = document.getElementById("placed_yes");
            const placedDetails = document.getElementById("placed_details");

            placedYes.addEventListener("change", () => {
                if (placedYes.checked) {
                placedDetails.style.display = "block";
                } else {
                placedDetails.style.display = "none";
                }
            });
            </script>        

			<input type="submit" value="Save">
		</form>
	</div>
</body>

</html>