<?php
  include_once 'header.php';

   $count=mysqli_num_rows($query);

  if($count==0) {
    echo "<br>";
    echo "Apparently nothing interesting is happening. Add an event to change that!";
  }

  ?>

  <div class="wrap">
    <?php while($row = mysqli_fetch_array($query)): ?> 
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
        <p><br><b>Location: </b><?php echo $row['address'] ?></p>
        <p><br><b>URL: </b><a href="<?php echo $row['url'] ?>"><?php echo $row['url'] ?></a></p>
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


<?php
include_once 'footer.php';
?>
