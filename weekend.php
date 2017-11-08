<?php
  include_once 'header.php';

  $query = mysql_query( "SELECT id, event_name, event_datetime, event_description, vote, address 
  FROM  voting
  WHERE DAYNAME(event_datetime) = 'Friday' or DAYNAME(event_datetime) = 'Saturday' or DAYNAME(event_datetime) ='Sunday'
  ORDER BY event_name ASC
  LIMIT 0 , 99"); // limit of 15 items. extend eventually

  include_once 'index.php';
  ?>
