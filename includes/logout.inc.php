<?php

if (isset($_POST['submit'])) {
	session_start();
	session_unset(); // unset all session variables
	session_destroy(); // destroy all sessions
	header("Location: ../index.php");
	exit();
}