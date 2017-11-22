<?php
	include 'dbh.inc.php';

	// mysqli_real_escape_string($conn, $_POST['event_name']); 

	$event_name = mysqli_real_escape_string($conn, $_POST['event_name']);  // $_POST variable is a superglobal, takes data we passed into form
	$address = mysqli_real_escape_string($conn, $_POST['address']); 
	$event_datetime = mysqli_real_escape_string($conn, $_POST['event_datetime']); 
	$event_description = mysqli_real_escape_string($conn, $_POST['event_description']); 
	$url = mysqli_real_escape_string($conn, $_POST['url']); 

	if ($_POST['ongoing'] == '1') {
		$isongoing = mysqli_real_escape_string($conn, $_POST['ongoing']); 
	} else {
		$isongoing = '0';
	}

	$sql = "INSERT INTO voting (event_name, event_datetime, event_description, address, url, isongoing)
		   Values ('$event_name', '$event_datetime', '$event_description', '$address', '$url', '$isongoing');";



	mysqli_query($conn, $sql);

	header("Location: ../addeventpage.php?neweventsubmit=success"); // takes us back to the submit page