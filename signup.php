<?php
	include_once 'header.php';
?>



  <section class="main-container"> 
    <div class="main-wrapper">
      <h2>Sign Up</h2>
      <form class="signup-form" action="includes/signup.inc.php" method="POST">  <!-- Info for user table. Action attribute tells form which file we want to load once we click submit. -->
      	<input type="text" name="first" placeholder="First Name">
      	<input type="text" name="last" placeholder="Last Name">
      	<input type="text" name="email" placeholder="E-mail">
      	<input type="text" name="uid" placeholder="Username">
      	<input type="password" name="pwd" placeholder="Password">
      	<button type="submit" name="submit">Sign Up</button>
      </form>

    </div>
  </section>

  <?php
	include_once 'footer.php';
?>