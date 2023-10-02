<?php
//form sumission to html
include 'dbh.php';

$id = "";
$Zipcode = "";
$property = "";
$obstruction = "";
$history = "";

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	// GET method: show the dat of the client
	 if( !isset($_GET["id"])){
	 	header("location: /index.php");
	 	exit;
	 }

	 $id = $_GET["id"];

	 // read the row of the selected clienr from database table 
	 $sql = "SELECT * FROM form WHERE id=$id";
	 $result = $conn->query($sql);
	 $row = $result->fetch_assoc();

	 	 if (!$row){
	 	 	header("location: /index.php");
	 	 	exit;
	 	 }

     $cord = $row["cord"];
	 	 $Zipcode = $row["Zipcode"];
	 	 $property = $row["property"];
	 	 $obstruction = $row["obstruction"];
	 	 $history = $row["history"];
	 	 $color = $row["color"];
	 	 $shape = $row["shape"];
	 	 $size = $row["size"];
	 	 $perM = $row["perM"];
	 	 $ph = $row["ph"];
	 	 $minC = $row["minC"];
	 	 $nitro = $row["nitro"];
	 	 $pho = $row["pho"];
	 	 $pot = $row["pot"];
	}
	else {
	// POST method: update the data of the client
		 $id = $_POST["id"];
     $cord = $_POST["cord"];
		 $Zipcode = $_POST["Zipcode"];
	 	 $property = $_POST["property"];
	 	 $obstruction = $_POST["obstruction"];
	 	 $history = $_POST["history"];
	 	 $color = $_POST["color"];
	 	 $shape = $_POST["shape"];
	 	 $size = $_POST["size"];
	 	 $perM = $_POST["perM"];
	 	 $ph = $_POST["ph"];
	 	 $minC = $_POST["minC"];
	 	 $nitro = $_POST["nitro"];
	 	 $pho = $_POST["pho"];
	 	 $pot = $_POST["pot"];

	 do{
		if( empty($cord) ||empty($Zipcode) || empty($property) || empty($obstruction) || empty($history) || empty($color) || empty($shape) ){
			$errorMessage = "All feilds are required";
			break;
		}

		$sql = "UPDATE form SET cord='$cord',Zipcode='$Zipcode', property='$property', obstruction='$obstruction', history='$history', color='$color', shape='$shape', size='$size', perM='$perM', ph='$ph', minC='$minC' , nitro='$nitro' , pho='$pho', pot='$pot' WHERE id=$id";

		$result = $conn->query($sql);

		if (!$result){
			$errorMessage = "Invalid query: " . $con->error;
			break;
		}

		header("location: /index.php");
		exit;

	} while (false);
}
?>

</!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Soil Sample Database</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
	<div class="container text-center">
		<h2> Update Soil Sample</h2>

		<?php

		if( !empty($errorMessage)){
			echo "
					<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					<strong>$errorMessage</strong>
					</div>
			";
		}

		?>
    <!--Coordinates-->
<form method="post">
  <input type= "hidden" name="id" value="<?php echo $id; ?>">
   <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Coordinates</div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="cord" value="<?php echo $cord;?>">
      </div>
  </div>
		<!--Zipcode-->
<form method="post">
	<input type= "hidden" name="id" value="<?php echo $id; ?>">
   <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Zipcode</div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="Zipcode" value="<?php echo $Zipcode;?>">
      </div>
	</div>

   <!--Type of Home -->
     
    <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Property Type</div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="property" value="<?php echo $property; ?>">
      </div>
	</div>

<!--Explanation of sample obstruction -->
    <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Sample Obstuction Explanation</div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="obstruction" value="<?php echo $obstruction; ?>">
      </div>
  </div>

<!--Explanation of history of soil -->
    <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Sample History Explanation</div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="history" value="<?php echo $history; ?>">
      </div>
  	</div>
<!--Color -->
 <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Color</div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="color" value="<?php echo $color; ?>">
      </div>
  	</div>
<!--Shape -->
 <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Shape</div>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="shape" value="<?php echo $shape; ?>">
      </div>
  	</div>
<!--Size -->
 <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Size</div>
      <div class="col-sm-6">
        <input type="number" class="form-control" step=.01 name="size" value="<?php echo $size; ?>">
      </div>
  	</div>
<!--Per Mass -->
 <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Concentration Per Mass</div>
      <div class="col-sm-6">
        <input type="number" class="form-control" step=.01 name="perM" value="<?php echo $perM; ?>">
      </div>
  	</div>
<!--pH Level -->
 <div class="row mb-3">
      <div class="col-sm-3 col-form-label">pH Level</div>
      <div class="col-sm-6">
        <input type="number" class="form-control" step=.01 name="ph" value="<?php echo $ph; ?>">
      </div>
  	</div>
<!--Mineral Content -->
 <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Percent Mineral Content</div>
      <div class="col-sm-6">
        <input type="number" class="form-control" step=.01 name="minC" value="<?php echo $minC; ?>">
      </div>
  	</div>
<!--nitrogen -->
 <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Nitrogen</div>
      <div class="col-sm-6">
        <input type="number" class="form-control" step=.01 name="nitro" value="<?php echo $nitro; ?>">
      </div>
  	</div>
<!--Phosphorus -->
 <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Phosphorus</div>
      <div class="col-sm-6">
        <input type="number" class="form-control" step=.01 name="pho" value="<?php echo $pho; ?>">
      </div>
  	</div>
<!--Potassium -->
 <div class="row mb-3">
      <div class="col-sm-3 col-form-label">Potassium</div>
      <div class="col-sm-6">
        <input type="number" class="form-control" step=.01 name="pot" value="<?php echo $pot; ?>">
      </div>
  	</div>

      <div class="row mb-3">
      <div class= "offset-sm-3 col-sm-3 d-grid"></div>
      	<button type="submit" class="btn btn-primary">Submit</button>
      	 <a class="btn btn-outline-primary" href="/index.php" role="button">Cancel</a>
    </div>
	</div>
</form>
</div>
</body>
</html>