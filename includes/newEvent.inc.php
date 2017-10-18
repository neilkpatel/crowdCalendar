<?php
	include 'dbh.inc.php';

	$event_name = $_POST['event_name']; // $_POST variable is a superglobal, takes data we passed into form
	$event_datetime = $_POST['event_datetime'];
	$event_description = $_POST['event_description'];

	$sql = "INSERT INTO voting (event_name, event_datetime, event_description)
		   Values ('$event_name', '$event_datetime', '$event_description');";



	mysqli_query($conn, $sql);

	header("Location: ../index.php?neweventsubmit=success"); // takes us to front page