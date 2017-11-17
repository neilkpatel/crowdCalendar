<?php
	include 'dbh.inc.php';

	mysqli_real_escape_string($conn, $_POST['event_name']); 

	$event_name = mysqli_real_escape_string($conn, $_POST['event_name']);  // $_POST variable is a superglobal, takes data we passed into form
	$address = mysqli_real_escape_string($conn, $_POST['address']); 
	$event_datetime = mysqli_real_escape_string($conn, $_POST['event_datetime']); 
	$event_description = mysqli_real_escape_string($conn, $_POST['event_description']); 
	$url = mysqli_real_escape_string($conn, $_POST['url']); 

	$sql = "INSERT INTO voting (event_name, event_datetime, event_description, address, url)
		   Values ('$event_name', '$event_datetime', '$event_description', '$address', '$url');";



	mysqli_query($conn, $sql);

	header("Location: ../addeventpage.php?neweventsubmit=success"); // takes us back to the submit page