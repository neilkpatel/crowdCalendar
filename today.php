<?php
  include_once 'header.php';

  $query = mysql_query( 'SELECT id, event_name, event_datetime, event_description, vote, address 
  FROM  voting
  WHERE CAST(event_datetime as DATE) = CAST(CURDATE() AS DATE) 
  ORDER BY event_name ASC
  LIMIT 0 , 99'); // limit of 15 items. extend eventually

  include_once 'index.php';
  ?>


IF CAST(DateField1 AS DATE) = CAST(DateField2 AS DATE)
