<?php
  include_once 'header.php';

  $query = mysql_query( 'SELECT id, event_name, event_datetime, event_description, vote, address 
  FROM  voting
  WHERE DATENAME(dw, event_datetime)="Friday" # OR DATENAME(dw, event_datetime) as "Saturday" OR DATENAME(dw, event_datetime) as "Sunday"
  ORDER BY event_name ASC
  LIMIT 0 , 99'); // limit of 15 items. extend eventually

  include_once 'index.php';
  ?>
