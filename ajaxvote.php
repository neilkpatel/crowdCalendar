<?php

include 'includes/dbh.inc.php';
# start new session
session_start();
dbConnect(); 
if ($_SERVER['HTTP_X_REQUESTED_WITH']) { // this checks whether a request is AJAX or not
  if (isset($_POST['postid']) AND isset($_POST['action'])) {
    $postId = (int) mysqli_real_escape_string($conn, $_POST['postid']);
    # check if already voted, if found voted then return
    if (isset($_SESSION['vote'][$postId])) return; // see bottom
    # connect mysql db
    

    # query into db table to know current voting score 
    $query = mysqli_query($conn, "
      SELECT vote
      from voting
      WHERE id = '{$postId}' 
      LIMIT 1" );

    # increase or decrease voting score
    if ($data = mysqli_fetch_array($query)) {
      if ($_POST['action'] === 'up'){
        $vote = ++$data['vote'];
      } else {
        $vote = --$data['vote'];
      }
      # update new voting score
      mysqli_query($conn, "
        UPDATE voting
        SET vote = '{$vote}'
        WHERE id = '{$postId}' ");

      # set session with post id as true
      $_SESSION['vote'][$postId] = true;
      # close db connection
      
    }
  }
}
dbConnect(false);

?>



