<?php

session_start();

include 'includes/dbh.inc.php';
# connect mysql db
dbConnect();
// By votes
// $query = mysqli_query($conn, 
//   'SELECT id, event_name, event_datetime, event_description, vote, address, url 
//   FROM  voting
//   WHERE event_datetime >= CURDATE() 
//   ORDER BY vote DESC
//   LIMIT 0 , 99'); // limit of 15 items. extend eventually

  $query = mysqli_query($conn, 'SELECT id, event_name, event_datetime, event_description, vote, address, url 
  FROM  voting
  WHERE CAST(event_datetime as DATE) = CAST(CURDATE() AS DATE) 
  ORDER BY vote DESC
  LIMIT 0 , 99'); 



?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>sup in your city - NYC</title>
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
                <?php if (isset($_SESSION['u_id'])) {
                  echo '<form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="submit">Logout</button>
                         </form>';
                  # code...
                } else {
                  echo '<form action="includes/login.inc.php" method="POST">
                        <input text="text" name="uid" placeholder="Username/e-mail">
                        <input text="password" name="pwd" placeholder="Password">
                        <button type="submit" name="submit">Login</button>
                        <a href="signup.php">Sign Up</a>
                        </form>';

                }

                ?>
                

                


              </div>
        </div>
    </nav>
  </header>
   <section class="main-container"> 
    <div class="main-wrapper"> 
      <div class="headerimage"><img src="img/supinyourcitytext.png"/></div>
        <center class="sortdate">
        <a class="today" href="index.php">Today</a>
        <a class="tomorrow" href="tomorrow.php">Tomorrow</a>
        <a class="weekend" href="weekend.php">Weekend</a>
        <a class="mostvotes" href="mostvotes.php">Most Votes</a>
        </center>
        
        
      <?php
      // if (isset($_SESSION['u_id'])) {
      //   echo "You are logged in!";
      // } else {
      //   echo "You are not logged in!";
      // }
      ?>


    </div>
  </section>
<a class="addevent" href="addeventloginpage.php">&nbsp; Add Event</a>
<hr>

<script>
  $(function(){
    $('.sortdate a').each(function(){
        if($(this).prop('href') == window.location.href) {
          $(this).addClass('active'); 
        }
    });
  });

</script>

