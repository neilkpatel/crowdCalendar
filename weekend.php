<?php
  include_once 'header.php';

  $query = mysqli_query($conn, "SELECT id, event_name, event_datetime, event_description, vote, address, url
  FROM  voting
  WHERE ((DAYNAME(event_datetime) = 'Friday' or DAYNAME(event_datetime) = 'Saturday' or DAYNAME(event_datetime) ='Sunday') and (event_datetime <= DATE_ADD(CURDATE(), INTERVAL 5 DAY)) and event_datetime >= CURDATE() ) AND isapproved = 1
  ORDER BY vote DESC
  LIMIT 0 , 99"); // WHERE STATEMENT ABOVE is weighty, but limits search to the upcoming weekend!

  include_once 'index.php';

  

   $count=mysqli_num_rows($query);

  // if($count==0) {
  // 	echo "<br>";
  // 	echo "Apparently nothing interesting is happening!";
  // }

  ?>
