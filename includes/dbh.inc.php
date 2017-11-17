<?php
// saving class files inside includes folder for better organization
// create class that has the database connection to the database. call when you need to create a connection
# db configurations
define('DB_HOST',    'localhost');
define('DB_USER',    'root');
define('DB_PASS',    '');
define('DB_NAME',    'voting');
# db connect
function dbConnect($close=true){
  global $link;

  if (!$close) {
    mysqli_close($link);
    return true;
  }

  $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to MySQL DB ') . mysql_error();
  #mysqli_set_charset($link, "utf8"); # sets character set to avoid black question marks
  if (!mysqli_select_db($link, DB_NAME))
    return false;
}

 $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 mysqli_set_charset($conn, "utf8");
# mysql_set_charset('utf8', $conn);
