<?php

// start a session
session_start();

// For logging in username and pwd


if (isset($_POST['submit'])) {
	include 'dbh.inc.php';

	$uid = mysqli_real_escape_string($conn, $_POST['uid']); // makes sure people can't type malicious code inside inputs
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	// error handlers
	// check if inputs are empty
	if (empty($uid) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
		
	
	} else { // check if username exists inside database. $uid can be uid or email
		$sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
		$result = mysqli_query($conn, $sql); 
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck < 1) { // check for errors message
			header("Location: ../index.php?login=error");
			exit();

		} else {
			if ($row = mysqli_fetch_assoc($result)) { // taking data from database and inserting it inside array in php called $row
				// check if password matches using De-hashing function
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']); // matching passwords
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
					
				} elseif ($hashedPwdCheck == true) { // else if statement to check if password == true and not some other number
					// Login user into the website
					// we use $SESSION variable which is a super-global that we can access as long as we have session going
					$_SESSION['u_id'] = $row['user_id']; // id from database, not user_uid
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../index.php?login=success");
					exit();
				} 

				// echo $row['user_uid'];
			}

		}

	}

	
} else {
		header("Location: ../index.php?login=error");
		exit();
	}