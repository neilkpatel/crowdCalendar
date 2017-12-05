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
  // Today:
  // $query = mysqli_query($conn, 'SELECT id, event_name, event_datetime, event_description, vote, address, url
  // FROM  voting
  // WHERE CAST(event_datetime as DATE) = CAST(CURDATE() AS DATE) AND isapproved = 1
  // ORDER BY vote DESC
  // LIMIT 0 , 99'); 

    $query = mysqli_query($conn, 
    'SELECT id, event_name, event_datetime, event_description, vote, address, url, isongoing 
    FROM  voting
    WHERE event_datetime >= CURDATE() AND isapproved = 1
    ORDER BY vote DESC
    LIMIT 0 , 99'); // limit of 15 items. extend eventually



?>
<!DOCTYPE html>

<html lang="en">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110557075-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110557075-1');
</script>

  <link rel="icon" href="img/favicon.png"> 
  <meta charset="UTF-8"/>
  <title>sup in your city - NYC events calendar</title>
  <meta name ="description" contet = "NYC events calendar organized by user votes">

  <link rel="stylesheet" type="text/css" href="style.css">

  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script src="https://use.fontawesome.com/df1d01cb31.js"></script>  
  <meta name="google-site-verification" content="y31LU6itZmxtLo_Dke8hCFYSHepHXbAmwCuXhtnByvo" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


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

 <div class="headerimage"><a href="index.php"><img src="img/supinyourcitytext.png"/></a>
      </div>

     <div class="horizontalmenu">
          <br>

        
        <div class="dropdown"><button class="dropbtn">NYC&nbsp; &darr;</button>
            <div class="dropdown-content">
              <a href="chicago.php">Chicago</a>
              <a href="miami.php">Miami</a>
              <a href="seattle.php">Seattle</a>
            </div>
        </div>

        <!-- Begin MailChimp Signup Form -->

<div class="mc_embed_signup">
<form action="https://supinyourcity.us17.list-manage.com/subscribe/post?u=8e14256d809d17808f58d04b9&amp;id=574d8085ed" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
  <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_8e14256d809d17808f58d04b9_574d8085ed" tabindex="-1" value=""></div>
    <span class="clear"><input type="submit" value="Subscribe (weekly email)" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </span>
</form>
</div>

<!--End mc_embed_signup-->
        <a class="addeventtest" href="addeventpage.php">Add Event</a>
        <a class="mostvotes" href="index.php">All</a>
        <a class="today" href="today.php">Today</a>
        <a class="tomorrow" href="tomorrow.php">Tomorrow</a>
        <a class="weekend" href="weekend.php">Weekend</a>
        <a class="ongoing" href="ongoing.php">Ongoing</a>
        
        </div>
        
      <?php
      // if (isset($_SESSION['u_id'])) {
      //   echo "You are logged in!";
      // } else {
      //   echo "You are not logged in!";
      // }
      ?>
    </div>
  </section>
  <hr style="background-color: #1D72B2; height: 2px;">

<script>
  $(function(){
    $('.sortdate a').each(function(){
        if($(this).prop('href') == window.location.href) {
          $(this).addClass('active'); 
        } else if (window.location.href == 'http://www.supinyourcity.com/') {
          $('.sortdate .mostvotes').addClass('active');
        }
    });
  });
</script>

