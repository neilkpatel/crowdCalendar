<?php
include 'includes/dbh.inc.php';
# connect mysql db
dbConnect();
$query = mysql_query(
  'SELECT id, event_name, event_datetime, event_description, vote 
  FROM  voting
  LIMIT 0 , 99'); // limit of 15 items. extend eventually
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>jQUery Voting System</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


  <script src="https://use.fontawesome.com/df1d01cb31.js"></script>  
  </head>

<body>
  <!-- Login system -->
  <header>
    <nav>
        <div class="main-wrapper">
              <ul>
                <li><a href="index.php">Home</a></li>
              </ul>
              <div class="nav-login">
                <form>
                <input text="text" name="uid" placeholder="Username/e-mail">
                <input text="password" name="pwd" placeholder="Password">
                <button type="submit" name="submit">Login</button>
                <a href="signup.php">Sign Up</a>
              </form>


              </div>
        </div>
    </nav>
  </header>