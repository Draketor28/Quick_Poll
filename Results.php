<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quick Poll Results</title>
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
<div class="jumbotron text-center bg-info">
    <h1 class="font-weight-bold"><i class="fas fa-trophy"></i> <b>Polling Results!</b></h1>
</div>
  
<div class="container-fluid">
  <div class="row">
    <div class="col"></div>
    <div class="col">
    <?Php
require "config.php";// Database connection

if($stmt = $connection->query("SELECT actor_name, votes FROM user_poll")){

$php_data_array = Array(); // create PHP array
  echo "<table class='w-100'>
<tr> <th><h3>Actor Name<h3></th><th><h3>Votes</h3></th></tr>";
while ($row = $stmt->fetch_row()) {
   echo "<tr><td class='font-weight-light'>$row[0]</td><td class='font-weight-light'>$row[1]</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_div"></div>
<br><br>
    </div>
    <div class="col"></div>
  </div>
</div>

</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'actor_name');
        data.addColumn('number', 'votes');
		for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = { width:600,
                       height:500, is3D: true,};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>
</html>
