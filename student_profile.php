<?php
session_start();

include("connection.php");
include("student_functions.php");

$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $user_data['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phoneno = $_POST['phoneno'];
    $prog = $_POST['prog'];
    $branch = $_POST['branch'];
    $yop = $_POST['yop'];
    $placed = $_POST['placed'];
    $ten_class =$_POST['ten_class'];
    $twelve_class =$_POST['twelve_class'];
    $cpi = $_POST['cpi'];

    /**/ 

    $curr_pack = $_POST['curr_pack'];
    $curr_compName = $_POST['curr_compName'];
    
    if (!empty($password)) {
        //save to database
        $user_id = random_num(20);
        $query = "UPDATE student SET password = '$password' WHERE email = '$email'"; 

        mysqli_query($con, $query);
    }

    if (!empty($name)) {
      //save to database
      $user_id = random_num(20);
      $query = "UPDATE student SET name = '$name' WHERE email = '$email'"; 

      mysqli_query($con, $query);
   }

    if (!empty($age)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET age = '$age' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

    if (!empty($phoneno)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET phoneno = '$phoneno' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($prog)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET prog = '$prog' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($branch)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET branch = '$branch' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($yop)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET yop = '$yop' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($ten_class)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET ten_class = '$ten_class' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($tweleve_class)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET tweleve_class = '$tweleve_class' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($cpi)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET cpi = '$cpi' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($curr_pack)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET curr_pack = '$curr_pack' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($curr_compName)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE student SET curr_compName = '$curr_compName' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   header("Location: http://localhost/CS260_project/student_portal.php");
    die;
}
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Student </title>
<style>
 body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        form {
            margin: 0 auto;
            width: 600px;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
        }

.row {
  display: flex;
}
.column {
  flex: 50%;
  padding: 10px;
}

input[type="number"],
        input[type="text"],
        select {
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

        .button_Submit{
            text-align: center;
        }

        .signup_link {
            text-align: center;
        }

        .signup_link a {
            color: #4caf50;
        }
  </style>    
<script>
function placedfun(x){
if(x==0){
document.getElementById('u_currpackage').style.display="block";
document.getElementById('u_currcompany').style.display="block";
}
else{
  document.getElementById('u_currpackage').style.display="none";
document.getElementById('u_currcompany').style.display="none";
} 
return;
}
</script>

</head>

<body>
<h1 id="pageheader" style="text-align:center;background-color:lightgreen ; padding: 25px 32px;">Section: PROFILE </h1>
<hr/>
<div class="row">

<div class="column">


<h3 id="personaldet">Personal Details:- </h3>
<div id="namepara">
<label for="name"> Name:</label>
<?php echo $user_data['name'];?><br><br><br>
</div>
<div id="genderpara">Gender:
 <?php echo $user_data['gender']; ?><br><br><br><br>
</div>
<div id="agepara">Age:
<?php echo $user_data['age'];?><br><br><br><br>

</div>Contact number:
<?php echo $user_data['phoneno'];?><br><br><br><br>
<br>

<h3 id="academicdet">Academic Details:- </h3>

<div id="class10markspara">Class 10 Marks in Percent :
<?php echo $user_data['ten_class']; ?><br><br><br><br>
</div>


<div id="class12markspara">Class 12 Marks in Percent :
<?php echo $user_data['twelve_class']; ?><br><br><br><br>
</div>

<div id="cpipara">Current CPI :
<?php echo $user_data['cpi'];?><br><br><br><br>
</div>


<div id="progenpara">
  Program Enrolled :
  <?php echo $user_data['prog']; ?><br><br><br><br>
</div>

<div id="branch">Branch:
<?php echo $user_data['branch']; ?><br><br><br><br>
</div>

<div id="batchyearpara">Year of Passing:
<?php echo $user_data['yop'];?><br><br><br><br>
</div>

<div id="currpackage">Current Package in LPA:
  <?php echo $user_data['curr_pack'];?><br><br><br><br>
</div>


<div id="currcompany">Current Company name:
  <?php echo $user_data['curr_compName']; ?><br><br><br><br>
</div>

<br><br>

</div>
<div class="column">
<form method = "post">

<h3 id="u_personaldet">Personal Details:- </h3>
<div id="u_namepara">
<label for="u_name"> Name:</label>
  <input type="text" id="name" name="name" size=50><br><br>
</div>
<div id="u_genderpara">Gender:
<input type="radio" id="male" name="gender" value="Male">
  <label for="male">MALE</label>
  <input type="radio" id="female" name="gender" value="Female">
  <label for="female">FEMALE</label><br><br>
</div>
<div id="u_agepara"> Age:
  <input type="number" id="age" name="age" min="18" max="30" size=50%><br><br>
</div>
<label for="u_phone">Contact number:</label><br>
  <input type="tel" id="phoneno" name="phoneno" placeholder="9988776655" pattern="[0-9]{10}" style="width:100%;height:30px"><br><br>
<hr/>

<h3 id="u_academicdet">Academic Details:- </h3>

<div id="u_class10markspara">Class 10 Marks in Percent :
 <input type="number" id="ten_class" name="ten_class" min="0" max="100"  step="0.01"><br><br>
</div>


<div id="u_class12markspara">Class 12 Marks in Percent :
<input type="number" id="twelve_class" name="twelve_class" min="0" max="100"  step="0.01" ><br><br>
</div>

<div id="u_cpipara">Current CPI :
<input type="number" id="cpi" name="cpi" min="0" max="10"  step="0.01" ><br><br>
</div>


<div id="u_progenpara">
  Program Enrolled :
  <input type="radio" id="btech" name="prog" value="B.Tech">
  <label for="btech">B.Tech</label>
  <input type="radio" id="mtech" name="prog" value="M.Tech">
  <label for="mtech">M.Tech</label><br><br> 
</div>

<div id="u_branchpara">Branch:
            <select name="branch" id="branch" >
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
            </select><br><br>
</div>
<div id="u_batchyearpara">
<label for="yop">Year of Passing:</label>
  <input type="number" id="yop" name="yop" min="2008" max="3000" ><br><br>
</div>

<div id="u_placedinfo">
  Placed ? :
  <input type="radio" id="yesplaced" name="placed" value="YES" onclick="placedfun(0)"checked>
  <label for="yes">YES</label>
  <input type="radio" id="notplaced" name="placed" value="NO" onclick="placedfun(1)">
  <label for="no">NO</label><br><br> 
</div>


<div id="u_currpackage">
<label for="curr_pack">Current Package in LPA:</label>
  <input type="number" id="curr_pack" name="curr_pack"  min="01" max="10000" ><br><br>
</div>


<div id="u_currcompany">
<label for="curr_compName">Current Company name:</label>
  <input type="text" id="curr_compName" name="curr_compName" size=20><br><br>
</div>


<hr/>

<input type="submit" value="Update" style="background:lightgreen;font-size: 16px; border:none;padding: 12px 68px ;font-weight:bold;"><br><br>

</form>
</div>
</div>
</body>
</html>