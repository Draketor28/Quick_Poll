<?php
include 'config.php';
if (isset($_POST["submit_form"]))
{
		// echo '<pre>';
		// print_r($_POST);
		// echo '</pre>';
        // die;
$actor = mysqli_real_escape_string($connection, $_POST["actorname"]);
date_default_timezone_set('Asia/Kolkata');
$addedDate = date('Y-m-d');
if ($actor == 'Miguel de Cervantes') {
$query7 = "SELECT * from user_poll where `actor_name` = 'Miguel de Cervantes'";
//   echo $query;
//   die;
  $stmt7 = $connection->query($query7);
 if(mysqli_num_rows($stmt7) > 0) {
      if ($row7 = mysqli_fetch_assoc($stmt7)) {
            $votecount = $row7['votes'];
      }
}
$totvotes = $votecount + 1;
}
if ($actor == 'Charles Dickens') {
$query7 = "SELECT * from user_poll where `actor_name` = 'Charles Dickens'";
//   echo $query;
//   die;
  $stmt7 = $connection->query($query7);
 if(mysqli_num_rows($stmt7) > 0) {
      if ($row7 = mysqli_fetch_assoc($stmt7)) {
            $votecount = $row7['votes'];
      }
}
$totvotes = $votecount + 1;
}
if ($actor == 'J.R.R. Tolkien') {
$query7 = "SELECT * from user_poll where `actor_name` = 'J.R.R. Tolkien'";
//   echo $query;
//   die;
  $stmt7 = $connection->query($query7);
 if(mysqli_num_rows($stmt7) > 0) {
      if ($row7 = mysqli_fetch_assoc($stmt7)) {
            $votecount = $row7['votes'];
      }
}
$totvotes = $votecount + 1;
}
if ($actor == 'Antoine de Saint-Exuper') {
$query7 = "SELECT * from user_poll where `actor_name` = 'Antoine de Saint-Exuper'";
//   echo $query;
//   die;
  $stmt7 = $connection->query($query7);
 if(mysqli_num_rows($stmt7) > 0) {
      if ($row7 = mysqli_fetch_assoc($stmt7)) {
            $votecount = $row7['votes'];
      }
}
$totvotes =  $votecount + 1;
}
$sqlinsert = "UPDATE `user_poll` SET `votes` = '$totvotes' WHERE `actor_name` = '$actor'";
 	// echo $sqlinsert;
 	// die;
$resultins = mysqli_query($connection, $sqlinsert);
if($resultins === true)

{

 echo ("<script LANGUAGE='JavaScript'>
 window.alert('Voting successful!');
window.location.href='http://localhost/Poll_OLD/Results.php';
 </script>");
}	

     else {
      echo ("<script LANGUAGE='JavaScript'>
 window.alert('Error while saving info!');
 window.location.href='';
 </script>");
 
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quick Poll</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a href="index.php" class="navbar-brand">
            <img src="images/logo.png" height="28" alt="NPoles">
        NPoles
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Results.php">Results</a>
    </li>
     <li class="nav-item">
      <a class="nav-link active" href="About.php">About Us</a>
    </li> 
  </ul>
    </div>
</nav>
<div class="jumbotron bg-warning text-center mb-0">
    <h1 class="font-weight-bold"><i class="fas fa-poll"></i> <b>Opinion Poll Form</b></h1>
</div>
<div class="register-photo">
    <div class="form-container">
    <div class="col-xs-6 float-left">
        <img src="images/QuickPoll.jpg" class="img-fluid">
        </div>
        <div class="col-xs-6 float-right">
        <form method="post">
            <h2 class="text-center"><i class="fas fa-users"></i> <strong>Favorite Actor</strong></h2>
            <div class="form-group font-weight-light"><h5>Who is your favorite author?</h5></div>
            <div class="form-group font-weight-light"><input class="form-check-input" type="radio" name="actorname" value="Miguel de Cervantes" id="flexRadioDefault1" required>
                <label class="form-check-label" for="actorname">
                Miguel de Cervantes
                </label></div>
                <div class="form-group font-weight-light"><input class="form-check-input" type="radio" name="actorname" value="Charles Dickens" id="flexRadioDefault2">
                <label class="form-check-label" for="actorname">
                Charles Dickens
                </label></div>
                <div class="form-group font-weight-light"><input class="form-check-input" type="radio" name="actorname" value="J.R.R. Tolkien" id="flexRadioDefault3">
                <label class="form-check-label" for="actorname">
                J.R.R. Tolkien
                </label></div>
                <div class="form-group font-weight-light"><input class="form-check-input" type="radio" name="actorname" value="Antoine de Saint-Exuper" id="flexRadioDefault4">
                <label class="form-check-label" for="actorname">
                Antoine de Saint-Exuper
                </label></div>
            <div class="form-group"><button class="btn btn-success btn-block" type="submit" name="submit_form">Submit</button></div>
        </form>
        </div>
    </div>
</div>

</body>
</html>
