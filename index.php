<?php

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"tpc_portal");
$test1=array();
$count1=0;
$result1=mysqli_query($link,"SELECT yop, AVG(ctc) as avg_package FROM alumni GROUP BY yop");
 while($row1=mysqli_fetch_array($result1)){
  $test1[$count1]["label"]=$row1["yop"];
  $test1[$count1]["y"]=$row1["avg_package"];
  $count1=$count1+1;
 }

 $test=array();
 $count=0;
 $result=mysqli_query($link,"SELECT yop, MAX(ctc) as max_package FROM alumni GROUP BY yop");
  while($row=mysqli_fetch_array($result)){
   $test[$count]["label"]=$row["yop"];
   $test[$count]["y"]=$row["max_package"];
   $count=$count+1;
  }

?>
<!DOCTYPE HTML>

<html>

<head>

<script>
window.onload = function() {
 
var chart1 = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Average package trend"
	},
	axisY: {
		title: "Avg Package in LPA"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## LPA",
		dataPoints: <?php echo json_encode($test1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
 
var chart = new CanvasJS.Chart("chartContainer1", {
	 animationEnabled: true,
	 theme: "light2",
	 title:{
		 text: "Top package trend"
	 },
	 axisY: {
		 title: "Top Package in LPA"
	 },
	 data: [{
		 type: "column",
		 yValueFormatString: "#,##0.## LPA",
		 dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	 }]
 });
 chart.render();
  
}

</script>

<title>Welcome to TPC</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}
		.row{
        display:flex;
		}
		.column{
			flex:50%;
        padding:10 px;
		}
		header {
			background-color: #4caf50;
			color: #fff;
			padding: 10px 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		header img {
			height: 100px;
			margin-right: 10px;
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
		nav ul:hover > li:hover > a{
      color: red;
        }
		nav li:hover > ul {
			display: block;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		p {
			text-align: center;
			font-size: 20px;
		}
	</style>
</head>
<body>

<header>
		<img src="http://localhost/CS260_project/iitplogo.jpg" alt="IITP Logo">
		<h1>Welcome to TPC</h1>
		<nav>
			<ul>
				<li><a href="#">Register▾</a>
					<ul>
						<li><a href="http://localhost/CS260_project/student_register.php">Student</a></li>
						<li><a href="http://localhost/CS260_project/company_register.php">Company</a></li>
						<li><a href="http://localhost/CS260_project/alumni_register.php">Alumni</a></li>
					</ul>
				</li>
				<li><a href="#">Login▾</a>
					<ul>
						<li><a href="http://localhost/CS260_project/student_login.php">Student</a></li>
						<li><a href="http://localhost/CS260_project/company_login.php">Company</a></li>
						<li><a href="#">Admin</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
    <div class="row">
	<div class="column">
    <div id="chartContainer" style="height: 370px; width: 50%;"></div>
	</div>
	<div class="column">
    <div id="chartContainer1" style="height: 370px; width: 50%;"></div>
	</div>
	</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>   