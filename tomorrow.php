<?php
  include_once 'header.php';

  $query = mysqli_query($conn, 'SELECT id, event_name, event_datetime, event_description, vote, address, url 
  FROM  voting
  WHERE CAST(event_datetime AS DATE) = CAST(CURDATE()+ 1 AS DATE) AND isapproved = 1
  ORDER BY vote DESC
  LIMIT 0 , 99'); // limit of 15 items. extend eventually

  include_once 'index.php';  

  


  ?>
