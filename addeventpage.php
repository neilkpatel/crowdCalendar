<?php
  include 'session.php';

  if (isset($_GET['neweventsubmit'])) {

  if ($_GET['neweventsubmit']=='success') {
    echo "<br>";
    echo "<span style='color: green;'>&nbsp; Your event has been submitted and will be added pending review. In the meantime, feel free to add more events! </span>";
    }
  }

?>


<h1> Welcome <?php echo $login_session; ?> </h1>

<form action="includes/newEvent.inc.php" method="POST">
  <input type="text" name="event_name" placeholder="Event Name" size="50" required>
  <br>
  <input type="text" name="address" placeholder="Event Location" size="50" required>
  <br>
  <input type="url" name="url" placeholder="Event URL" size="50" required>
  <br>
  <input type="datetime-local" name="event_datetime" required>
  <br>
  <textarea rows="5" cols="50" type="text" name="event_description" placeholder="Event Description" required></textarea>
  <br>
  <br>
  <button type="submit" name="submit">Submit Event</button>
</form>

<br>

<a href = "index.php" style="color: blue">crowdCalendar NYC</a>


