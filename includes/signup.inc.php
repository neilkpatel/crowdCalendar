<!-- Tell database what to do with data that the user typed into the form on signup sheet -->

<?php
// extra security messure. make sure people have to click button to run this code
if (isset($_POST['submit'])) { // check if something is existing inside file. check for submit. take data from previous form and value passed in. check for button named submit
	include_once 'dbh.inc.php'; 

	// Get data from form

	$first = mysqli_real_escape_string($conn, $_POST['first']); // we allow for users to write something to send to this form that we insert into database....this is dangerous and a potential hack. so escape all text via PHP method so it doesn't look like code, but as text
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	// create error handlers in case anything is empty. no signup with wrong info.
	// check for empty fields
	// good habit to check for errors first before you check for success
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) { // empty is a php function, checks if any data attached to it. 
		header("Location: ../signup.php?signup=empty"); // signup=empty will be in URL when we go back. depending on error message, we can include styling inside signup form
		exit(); 
	} else { // check if input characters are something we want to allow in the database
			if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) ) { // php function that checks if we have certain characters inside a string, string to check. error check first. if characters not these characters existing.
				header("Location: ../signup.php?signup=invalid");
				exit();
			} else { // if characters are valid...now check e-mail
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=invalidemail");
				exit();	
				} else { // check if UID is already taken inside database. create connection to database and query database
					$sql = "SELECT * FROM users WHERE user_uid='$uid'";
					$result = mysqli_query($conn, $sql); // connect + run statement inside database. check if we have any results / matches
					$resultCheck = mysqli_num_rows($result); // query and check if we have any kind of rows as results.

					if ($resultCheck > 0) { // if we have a user return
					header("Location: ../signup.php?signup=usertaken");
					exit();		
					} else { // now let's hash the password because if we put password into database, we can read it in database. keep it secure. 
						// hashing the password
						$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); // function for hashing method
						// Insert user into database. renaming variables
						$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
						mysqli_query($conn, $sql); // this inserts the data into the database. runs function.
						header("Location: ../signup.php?signup=success");
						exit();
					}
				}
			}
	}


} else { // else send them back to the signup page. stops entire script
	header("Location: ../signup.php");
	exit(); // exit closes and stops script from running if there's anything after the exit function
}


