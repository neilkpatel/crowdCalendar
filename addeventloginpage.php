<?php
  include_once 'header.php';
 

?>

<html>
  <form action="includes/addeventlogin.inc.php" method="POST">
    <input type="text" name="uid" placeholder="Username/e-mail">
    <input type="password" name="pwd" placeholder="Password">
    <button type="submit" name="submit">Login</button>
  </form>
</html>



<?php
  include_once 'header.php';

if (isset($_GET['login'])) {

  if ($_GET['login']=='failed') {
  	echo "<br>";
  	echo "<span style='color: red;'>&nbsp; Login failed</span>";
  	}
  }


if (isset($_GET['user'])) {

  if ($_GET['user']=='none') {
  	echo "<br>";
  	echo "<span style='color: red;'>&nbsp; You are not logged in!</span>";
  	}
  }

?>






