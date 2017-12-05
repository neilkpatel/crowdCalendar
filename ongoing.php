<?php
  include_once 'header.php';

	$query = mysqli_query($conn, 
	  'SELECT id, event_name, event_datetime, event_description, vote, address, url, isongoing
	  FROM  voting
	  WHERE event_datetime >= CURDATE() AND isapproved = 1 and isongoing = 1
	  ORDER BY vote DESC
	  LIMIT 0 , 99'); // limit of 15 items. extend eventually

	include_once 'index.php';


  // $count=mysqli_num_rows($query);

  // if($count==0) {
  // 	echo "<br>";
  // 	echo "Apparently nothing interesting is happening!";
  // }


?>

