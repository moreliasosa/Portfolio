<?php 
// login/log out page
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
</!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Microplastic Anylsis Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<body style="margin: 50px; ">
    <h1 style="text-align:center;">Microplastic Anylsis Dashboard</h1>
    <p style="text-align:center;"> <a class='btn btn-primary btn-sm' href="index.php">Table</a> 
     <a class='btn btn-info btn-sm' href="form_sub.html?logout='1'">Soil Submission Form</a>
   <a class='btn btn-danger btn-sm' href="index.php?logout='1'">Logout</a> </p>

<?php

  $host = "db";
  $dbname ="form_db";
  $hostusername = "docker";
  $hostpassword = "password";

  // create connection to mysql
  $conn = mysqli_connect($host,  $hostusername, $hostpassword, $dbname, 3306);

  // Check connection
   if (mysqli_connect_errno()) {
     die("connection error:  " . mysqli_connect_errno());
   }
//column(chart 1) pull form mysql
$dataPoints = array();
$count=0;

$res=mysqli_query($conn, "select * from form");
while($row=mysqli_fetch_array($res))
{
  $dataPoints[$count]['label']=$row['Zipcode']; //x axis
  $dataPoints[$count]['y']=$row['size']; //y axis
  $count=$count+1;
}
//scatter plot(chart 2) pull form mysql
$dataPoints2 = array();
$count2=0;

$res2=mysqli_query($conn, "select * from form");
while($row2=mysqli_fetch_array($res2))
{
  $dataPoints2[$count2]['label']=$row2['color']; //x axis
  $dataPoints2[$count2]['y']=$row2['ph']; //y axis
  $count2=$count2+1;
}

//pie(chart 3) pull form mysql
$dataPoints3 = array();
$count3=0;

$res3=mysqli_query($conn, "select * from form");
while($row3=mysqli_fetch_array($res3))
{
  $dataPoints3[$count3]['label']=$row3['shape']; //x axis
  $dataPoints3[$count3]['y']=$row3['minC']; //y axis
  $count3=$count3+1;
}

?>

<script>
window.onload = function () {
//column(chart 1)
var chart= new CanvasJS.Chart("chartContainer1", {
  animationEnabled: true,
  theme: "light1",
  title:{
    text: "Microplastic Average Size by Zipcode",
    fontSize: 20,
  },
  axisY: {
    title: "Size"
  },
  axisX: {
    title: "Zipcode"
  },
  data: [{
    type: "column",
    yValueFormatString: "#,##0.00\"%\"",
    indexLabel: "{label} ({y})",
    yValueFormatString: "#,##0.## ml",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
//Scatter Plot Chart 2
var chart2 = new CanvasJS.Chart("chartContainer2", {
  animationEnabled: true,
  theme: "light1",
  title:{
    text: "pH Level to Color of Microplastic",
    fontSize: 20,
  },
  axisY: {
    title: "pH Level"
  },
  axisX: {
    title: "Color"
  },
  data: [{
    type: "scatter",
    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
  }]
});
chart2.render();
//Pie Chart chart 3
var chart3 = new CanvasJS.Chart("chartContainer3", {
  animationEnabled: true,
  theme: "light1",
  title:{
    text: "Shape to Precent Mineral content",
    fontSize: 20,
  },
  data: [{
    type: "pie",
    yValueFormatString: "#,##0.00\"%\"",
    indexLabel: "{label} ({y})",
    dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
  }]
});
chart3.render();
}
</script>
</head>
<body>
<div id="chartContainer1" style="width: 45%; height: 300px;display: inline-block;"></div>
<div id="chartContainer2" style="width: 45%; height: 300px;display: inline-block;"></div>
<div id="chartContainer3" style="width: 45%; height: 300px;display: inline-block;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

</body>
</html>