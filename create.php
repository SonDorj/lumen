<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<?php
if (isset($_POST['su'])) {
    session_start();
    if (isset($_POST['exampleId']) && isset($_POST['exampleEventName']) && isset($_POST['exampleEventDate']) && isset($_POST['exampleInputEmail']) && isset($_POST['examplePhone']) && isset($_POST['exampleDescription']) && isset($_POST['exampleLocation']) && isset($_POST['exampleStatus']) && isset($_POST['exampleSeat']) && isset($_POST['exampleType'])) {
        require_once 'connect.php';
        $conn = mysqli_connect($host, $user, $ps, $project);       if (!$conn) {
            echo "<script>alert(\"Database error retry after some time !\")</script>";
        }
        $id= mysqli_real_escape_string($conn, $_POST['exampleId']);
        $name = mysqli_real_escape_string($conn, $_POST['exampleEventName']);
        $date = mysqli_real_escape_string($conn, $_POST['exampleEventDate']);
        $mail = mysqli_real_escape_string($conn, $_POST['exampleInputEmail']);
        $phno = mysqli_real_escape_string($conn, $_POST['examplePhone']);
        $desc = mysqli_real_escape_string($conn, $_POST['exampleDescription']);
        $type = mysqli_real_escape_string($conn, $_POST['exampleType']);
        $loc = mysqli_real_escape_string($conn, $_POST['exampleLocation']);
        $status = mysqli_real_escape_string($conn, $_POST['exampleStatus']);
        $seat = mysqli_real_escape_string($conn, $_POST['exampleSeat']);
        
            $sql = "INSERT INTO events (venue_id, event_name, event_date, organizer_email, organizer_phone, event_description, event_type, event_location, event_status, max_seats)
VALUES ('$id','$name','$date','$mail','$phno','$desc', '$type', '$loc','$status','$seat')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>
                alert('successful!');
                window.location.replace(\"home.php\");
                </script>";
                session_destroy();
            } else {
                echo "<script>
                alert('Data enter by you alreay exist in Database please Sign In');
                window.location.replace(\"home.php\");</script>";
                session_destroy();
            }
        }
}
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Lumen Event Management Solution</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./events.php">Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./create.php">Book/Create</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="./aboutus.php">AboutUs</a>
      </li> 
    </ul>
  </div>
</nav>
	<form name="event" method="POST">
	
	    <label for="exampleInputEmail1">Venue_id</label>
	    <input type="number" class="form-control" name="exampleId" required placeholder="Venue Id">
	  
	  
	    <label for="exampleInputEmail1">Event Name</label>
	    <input type="text" class="form-control" name="exampleEventName" required placeholder="Enter name">
	  
	 
	    <label for="exampleInputEmail1">event_date</label>
	    <input type="date" class="form-control" name="exampleEventDate" >  
	  
	    <label for="exampleInputEmail1">Organizer Email</label>
	    <input type="email" class="form-control" name="exampleInputEmail" required placeholder="Enter email">
	  
	    <label for="exampleInputPassword1">Organizer Phone</label>
	    <input type="tel" class="form-control" pattern="[0-9]{10}" name="examplePhone" required placeholder="phone">
	  
    	    <label for="exampleFormControlTextarea1">Event Description</label>
    	    <input class="form-control" name="exampleDescription" required rows="3"></textarea>
  	      
  	      <label for="inputCity">Event Type</label>
	      <input type="text" class="form-control" name="exampleType" required >
	    
	      <label for="inputCity">Event Location</label>
	      <input type="text" class="form-control" name="exampleLocation" required >
	    
	  
	  
	  
	    <label for="exampleInputEmail1">Event Status</label>
	    <input type="text" class="form-control" name="exampleStatus" placeholder="event status" required >
	  
	    <label for="exampleInputEmail1">Max Seat</label>
	    <input type="number" class="form-control" name="exampleSeat" placeholder="Max Seat" required >
	  
	  <br>
	  <input type="submit" name="su">
	</form>
</body>
</html>
