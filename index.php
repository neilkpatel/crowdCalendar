<?php
  include_once 'header.php';

  // $query = mysql_query(
  // 'SELECT id, event_name, event_datetime, event_description, vote, address 
  // FROM  voting
  // ORDER BY vote DESC
  // LIMIT 0 , 99'); // limit of 15 items. extend eventually

  ?>



  <hr>

  <div class="wrap">
    <?php while($row = mysql_fetch_array($query)): ?> 
    <div class="item" data-postid="<?php echo $row['id'] ?>" data-score="<?php echo $row['vote'] ?>">
      <div class="vote-span"><!-- voting-->
        <div class="vote" data-action="up" title="Vote up">
          <i class="fa fa-chevron-up"></i>
        </div><!--vote up-->
        <div class="vote-score"><?php echo $row['vote'] ?></div>
        <div class="vote" data-action="down" title="Vote down">
          <i class="fa fa-chevron-down"></i>
        </div><!--vote down-->
      </div>

      <div class="post"><!-- post data -->
        <h2><?php echo $row['event_name'].' on '?><u><?php echo date("l m/d/y g:i A", strtotime($row['event_datetime']))?></u></h2>
        <p><br><?php echo $row['event_description'] ?></p>
        <p><br><b>Address: </b><?php echo $row['address'] ?></p>
      </div>
    </div><!--item-->
    <hr>
    <?php endwhile?>
  </div>
  <?php dbConnect(false); ?>


<script> // Javascript!
  $(document).ready(function(){
    // ajax setup
    $.ajaxSetup({
      url: 'ajaxvote.php',
      type: 'POST',
      cache: 'false'
    });

    // any voting button (up/down) clicked event
    $('.vote').click(function(){
      var self = $(this); // cache $this
      var action = self.data('action'); // grab action data up/down 
      var parent = self.parent().parent(); // grab grand parent .item
      var postid = parent.data('postid'); // grab post id from data-postid
      var score = parent.data('score'); // grab score form data-score

      // only works where is no disabled class. this is probably for repeat voters.
      if (!parent.hasClass('.disabled')) {
        // vote up action
        if (action == 'up') {
          // increase vote score and color to orange
          parent.find('.vote-score').html(++score).css({'color':'green'});
          // change vote up button color to orange
          self.css({'color':'green'});
          // send ajax request with post id & action
          $.ajax({data: {'postid' : postid, 'action' : 'up'}});
        }
        // voting down action
        else if (action == 'down'){
          // decrease vote score and color to red. do you need to send the new score to the database?
          parent.find('.vote-score').html(--score).css({'color':'red'});
          // change vote up button color to red
          self.css({'color':'red'});
          // send ajax request
          $.ajax({data: {'postid' : postid, 'action' : 'down'}});
        };

        // add disabled class with .item
        parent.addClass('.disabled');
      };
    });
  });
  
  // sorting by today, tomorrow, weekend
  function sortTable() {



  }

</script>

<br>
Add an event here!

<form action="includes/newEvent.inc.php" method="POST">
  <input type="text" name="event_name" placeholder="Event Name" size="50" >
  <br>
  <input type="text" name="event_location" placeholder="Event Location" size="50" >
  <br>
  <input type="datetime-local" name="event_datetime">
  <br>
  <textarea rows="5" cols="50" type="text" name="event_description" placeholder="Event Description"> </textarea>
  <br>
  <button type="submit" name="submit">Submit Info</button>
</form>

<?php
include_once 'footer.php';
?>
