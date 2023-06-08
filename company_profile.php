<?php
session_start();

include("connection.php");
include("company_functions.php");

$user_data = check_login($con);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $email = $user_data['email'];
    $password = $_POST['password'];
    $compName = $_POST['companyName'];
    $compType = $_POST['companyType'];
    $location = $_POST['location'];
    $progAllow = $_POST['ProgrammeAllowed'];
    $branchAllow = $_POST['BranchAllowed'];
    $minCPI = $_POST['minCPI'];
    $modeOfInt = $_POST['modeOfInterview'];
    $noOfOA = $_POST['noOfOARounds'];
    $packOffer =$_POST['packageOffered'];
    $posOffer =$_POST['positionOffered'];
        
    if (!empty($password)) {
        //save to database
        $user_id = random_num(20);
        $query = "UPDATE company SET password = '$password' WHERE email = '$email'"; 

        mysqli_query($con, $query);
    }

    if (!empty($compName)) {
      //save to database
      $user_id = random_num(20);
      $query = "UPDATE company SET compName = '$compName' WHERE email = '$email'"; 

      mysqli_query($con, $query);
   }

    if (!empty($compType)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE company SET compType = '$compType' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

    if (!empty($location)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE company SET location = '$location' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($progAllow)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE company SET progAllow = '$progAllow' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($branchAllow)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE company SET branchAllow = '$branchAllow' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($minCPI)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE company SET minCPI = '$minCPI' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($modeOfInt)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE company SET modeOfInt = '$modeOfInt' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($noOfOA)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE company SET noOfOA = '$noOfOA' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($packOffer)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE company SET packOffer = '$packOffer' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

   if (!empty($posOffer)) {
    //save to database
    $user_id = random_num(20);
    $query = "UPDATE company SET posOffer = '$posOffer' WHERE email = '$email'"; 

    mysqli_query($con, $query);
   }

    header("Location: http://localhost/CS260_project/company_portal.php");
    die;
}
?>

<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company Profile </title>
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

        .button_Submit {
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
        function placedfun(x) {
            if (x == 0) {
                document.getElementById('u_currpackage').style.display = "block";
                document.getElementById('u_currcompany').style.display = "block";
            } else {
                document.getElementById('u_currpackage').style.display = "none";
                document.getElementById('u_currcompany').style.display = "none";
            }
            return;
        }
    </script>

</head>

<body>
    <h1 id="pageheader" style="text-align:center;background-color:lightgreen ; padding: 25px 32px;">Section: PROFILE </h1>
    <hr />
    <div class="row">

        <div class="column">

            <br><br>
            <h2>Details</h2>
            <br>
            <label for="companyName">Company Name:</label>
            <?php echo $user_data['compName']; ?> <br><br><br>

            <label for="companyType">Company Type:</label>
            <?php  echo $user_data['compType']; ?> <br><br><br>

            <label for="location">Location:</label>
            <?php echo $user_data['location']; ?> <br><br><br><br>

            <br>

            <h2>Criteria</h2>

            <label id="ProgrammeAllowed">Programs Allowed:</label>
            <?php echo $user_data['progAllow']; ?> <br><br><br><br>


            <label id="BranchAllowed">Branches Allowed:</label>
            <?php echo $user_data['branchAllow']; ?> <br><br><br><br>



            <label for="minCPI">Minimum CPI:</label>
            <?php echo $user_data['minCPI']; ?> <br><br><br><br>


            <h2>Interview</h2>
            <br>

            <label for="modeOfInterview">Mode of Interview:</label>
            <?php echo $user_data['modeOfInt']; ?> <br><br><br>


            <label for="noOfOARounds">Number of OA Rounds:</label>
            <?php echo $user_data['noOfOA']; ?> <br><br><br><br>


            <h2>Company Offer</h2>
            <br>

            <label for="packageOffered">Package Offered:</label>
            <?php echo $user_data['packOffer']; ?> <br><br><br><br>

            <label for="positionOffered">Position Offered:</label>
            <?php echo $user_data['posOffer']; ?> <br><br><br><br>

            <br><br>

        </div>
        <div class="column">
            <form method="post">

                <h2>Details</h2>

                <label for="companyName">Company Name:</label>
                <input type="text" id="companyName" name="companyName"><br>

                <label for="companyType">Company Type:</label>
                <select id="companyType" name="companyType">
                    <option value="tech">Tech Company</option>
                    <option value="finance">Finance Company</option>
                    <option value="core">Core Company</option>
                </select><br>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location"><br>

                <h2>Criteria</h2>

                <label for="ProgrammeAllowed">Programme Allowed:</label>
                <select id="ProgrammeAllowed" name="ProgrammeAllowed">
                    <option value="btech">BTECH</option>
                    <option value="mtech">MTECH</option>
                    <option value="phd">PHD</option>
                </select><br>

                <label for="BranchAllowed">Branches Allowed:</label>
                <select id="BranchAllowed" name="BranchAllowed">
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

                
                <label for="minCPI">Minimum CPI:</label>
                <input type="number" id="minCPI" name="minCPI" min="0" max="10" step="0.01"><br><br>

                <h2>Interview</h2>

                <label for="modeOfInterview">Mode of Interview:</label>
                <select id="modeOfInterview" name="modeOfInterview">
                    <option value="online">Online</option>
                    <option value="offline">Offline</option>
                </select><br>

                <label for="noOfOARounds">Number of OA Rounds:</label>
                <input type="number" id="noOfOARounds" name="noOfOARounds" min="0" steps="1"><br><br>

                <h2>Company Offer</h2>

                <label for="packageOffered">Package Offered:</label>
                <input type="text" id="packageOffered" name="packageOffered"><br>

                <label for="positionOffered">Position Offered:</label>
                <input type="text" id="positionOffered" name="positionOffered"><br><br>

                <input type="submit" value="Save" onclick="matchPassword()">
            </form>
        </div>
    </div>
</body>

</html>