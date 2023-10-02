<?php

//form sumission to html

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$cord = $_POST["cord"];
$Zipcode = $_POST["Zipcode"];
$property = $_POST["property"];
$obstruction = $_POST["obstruction"];
$history = $_POST["history"];

include 'dbh.php';

$sql = "INSERT INTO form (firstname, lastname, email, cord, Zipcode, property, obstruction, history) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
	die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssssisss",
						$firstname,
						$lastname,
						$email,
						$cord,
						$Zipcode,
						$property,
						$obstruction,
						$history);

mysqli_stmt_execute($stmt);

header("location: /form_sub.html")
?>