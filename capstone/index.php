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
    <h1 style="text-align:center;" >Microplastic Anylsis Database</h1>
    <p style="text-align:center;" > <a class='btn btn-primary btn-sm' href="dashboard.php">Dashboard</a> 
     <a class='btn btn-info btn-sm' href="form_sub.html?logout='1'">Soil Submission Form</a>
   <a class='btn btn-danger btn-sm' href="index.php?logout='1'">Logout</a> </p>
    
    <div class="table">
      <form method="post">
        <input type="text" placeholder= "Search Data" aria-label="Search" name="search">
        <button class="btn btn-outline-success btn-sm" type="submit" name="submit">Search</button>
      </form>
      <div class="table table-bordered table-striped table-responsive table-hover">
        <table class="SearchTable">
          <?php
          include 'dbh.php';

          if(isset($_POST['submit'])){
            $search=$_POST['search'];

            $sql="SELECT * FROM form WHERE id like '%$search%' or Zipcode like '%$search%' or property like '%$search%' or id like '%$search%' or lastname like '%$search%' or color like '%$search%' or shape like '%$search%'";

            $result=mysqli_query($conn, $sql);
            if($result){
            if(mysqli_num_rows($result)>0){
              echo "<thead>
              <tr>
              <th>ID</th>
              <th>Last Name</th>
              <th>Coordinates</th>
              <th>Zipcode</th>
              <th>Property Type</th>
              <th>Obstuction</th>
              <th>History</th>
              <th>Color</th>
              <th>Shape</th>
              <th>Size</th>
              <th>Conentration Per Mass</th>
              <th>pH Level</th>
              <th>Nitrogen</th>
              <th>Percent Mineral Content</th>
              <th>Phosphorus</th>
              <th>Potassium</th>
              </tr>
              </thead>";

              while($row=mysqli_fetch_assoc($result)){
              echo "<tr>
              <td>" . $row["id"] . "</td>
              <td>" . $row["lastname"] . "</td>
              <td>" . $row["cord"] . "</td>
              <td>" . $row["Zipcode"] . "</td>
              <td>" . $row["property"] . "</td>
              <td>" . $row["obstruction"] . "</td>
              <td>" . $row["history"] . "</td>
              <td>" . $row["color"] . "</td>
              <td>" . $row["shape"] . "</td>
              <td>" . $row["size"] . "</td>
              <td>" . $row["perM"] . "</td>
              <td>" . $row["ph"] . "</td>
              <td>" . $row["minC"] . "</td>
              <td>" . $row["nitro"] . "</td>
              <td>" . $row["pho"] . "</td>
              <td>" . $row["pot"] . "</td>
             <td>
            <a class='btn btn-primary btn-sm' href='/update.php?id=$row[id]'>Update</a>
             </td>
             <td>
             <a class='btn btn-danger btn-sm' href='/delete.php?id=$row[id]'>Delete</a>
             </td>
            </tr>";
          }
          }else{
            echo "<h2 class=text-danger> DATA NOT FOUND </h2>";
          }

              }
            }

          ?>
        </table>

      </div>
    </div>
    <br>
    <table class="table table-bordered table-striped table-responsive table-hover">
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Last Name</th>
          <th>Coordinates</th>
          <th>Zipcode</th>
          <th>Property Type</th>
          <th>Obstuction</th>
          <th>History</th>
          <th>Color</th>
          <th>Shape</th>
          <th>Size</th>
          <th>Conentration Per Mass</th>
          <th>pH Level</th>
          <th>Percent Mineral Content</th>
          <th>Nitrogen</th>
          <th>Phosphorus</th>
          <th>Potassium</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // create connection to mysql
        include 'dbh.php';

        // read all rows from database table
        $sql = "SELECT * FROM form";
        $result = $conn->query($sql);

        if (!$result){
          die("Invaild query: " . $conn->error);
        }
              //read data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>
          <td>" . $row["id"] . "</td>
          <td>" . $row["lastname"] . "</td>
          <td>" . $row["cord"] . "</td>
          <td>" . $row["Zipcode"] . "</td>
          <td>" . $row["property"] . "</td>
          <td>" . $row["obstruction"] . "</td>
          <td>" . $row["history"] . "</td>
          <td>" . $row["color"] . "</td>
          <td>" . $row["shape"] . "</td>
          <td>" . $row["size"] . "</td>
          <td>" . $row["perM"] . "</td>
          <td>" . $row["ph"] . "</td>
          <td>" . $row["minC"] . "</td>
          <td>" . $row["nitro"] . "</td>
          <td>" . $row["pho"] . "</td>
          <td>" . $row["pot"] . "</td>
          <td>
            <a class='btn btn-primary btn-sm' href='/update.php?id=$row[id]'>Update</a>
          </td>
          <td>
             <a class='btn btn-danger btn-sm' href='/delete.php?id=$row[id]'>Delete</a>
          </td>
        </tr>";
        }

        ?>
      </tbody>
    </table>

</div>

</body>
</html>