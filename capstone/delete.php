<?php
	include 'dbh.php';

	if ( isset($_GET["id"])){
		$id = $_GET["id"];

		$sql = "DELETE FROM form WHERE id=$id";
		$result = $conn->query($sql);
        }

		header("location: /index.php");
		exit;
?>