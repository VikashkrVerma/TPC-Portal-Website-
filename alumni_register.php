<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $_POST['email'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phoneno = $_POST['contact_number'];
    $prog = $_POST['programme_enrolled'];
    $branch = $_POST['branch'];
    $yop = $_POST['year_of_passing'];
    /**/ 
    $ctc = $_POST['package'];
    $comp = $_POST['company'];
    $pos = $_POST['position'];

    if (!empty($email) && !empty($name) && !empty($gender) && !empty($age) && !empty($phoneno) && !empty($prog) && !empty($branch) && !empty($yop) && !empty($ctc) && !empty($comp) && !empty($pos)) {
        //save to database
        $user_id = random_num(20);
        $query = "insert into alumni values ('$name','$age','$gender','$phoneno','$prog','$branch','$yop','$comp','$pos','$ctc','$email','$id','$user_id')";

        mysqli_query($con, $query);

        header("Location: http://localhost/CS260_project/index.php");
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
        <h1>Alumni Register Page</h1>
        <form method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email"><br>

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

                <label>Current Package in LPA:</label>
                <input type="number" name="package" step="0.01" min="0" required><br>
                <label>Current Company:</label>
                <input type="text" name="company" required>
                <label>Company Position:</label>
                <input type="text" name="position" required>

            <input type="submit" value="Save">
        </form>
    </div>
</body>

</html>