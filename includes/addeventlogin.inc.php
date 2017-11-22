<?php
	session_start();
	include 'dbh.inc.php';
	
	

if (isset($_POST['submit'])) {

	$uid = mysqli_real_escape_string($conn, $_POST['uid']); // makes sure people can't type malicious code inside inputs
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	// error handlers
	// check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		// header("Location: ../index.php?login=empty");
		header("Location: ../addeventloginpage.php?login=failed");
		exit();
		
	
	} else { // check if username exists inside database. $uid can be uid or email
		$sql = "SELECT id FROM curators WHERE username = '$uid' AND password = '$pwd'";
		$result = mysqli_query($conn, $sql); 
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck == 1) { // check for errors message
			# session_register("uid"); = deprecated
			$_SESSION['login_user'] = $uid;
			header("Location: ../addeventpage.php");
		} else {
			header("Location: ../addeventloginpage.php?login=failed");
			exit();
		}

	}

} else {
		header("Location: ../addeventloginpage.php?login=failed");
		exit();
	}

