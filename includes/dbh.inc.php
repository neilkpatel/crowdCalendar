
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
    mysql_close($link);
    return true;
  }

  $link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to MySQL DB ') . mysql_error();
  if (!mysql_select_db(DB_NAME, $link))
    return false;
}

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
