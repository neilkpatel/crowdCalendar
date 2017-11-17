
<?php
  include_once 'header.php';

  $query = mysqli_query($conn, 'SELECT id, event_name, event_datetime, event_description, vote, address, url 
  FROM  voting
  WHERE CAST(event_datetime as DATE) = CAST(CURDATE() AS DATE) 
  ORDER BY vote DESC
  LIMIT 0 , 99'); 

   
   
   $count=mysqli_num_rows($query);

  if($count==0) {
    echo "<br>";
    echo "Apparently nothing interesting is happening!";
  }



