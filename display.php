<html>
<head>
<title> Smart Jar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
#body
{
  margin-top: 100px;
}
.table
{

}
</style>
</head>


<body class="container" id="body">
  <center><h2>Cat I</h2></center> <BR>
<div class="col-sm-3">
</div>
<div class="col-sm-6">
 <table class="table table-bordered table-hover">
    <tr>
    <th>S.NO</th>
    <th>Updated Time</th>
   <th>Value</th>
   </tr>

<?php
// server details
$servername = "";
$username = "";
$password = "";
$dbname = "";


  $sqlq = "Select * from espvalues ";

  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $result = mysqli_query( $conn , $sqlq );

  if ( $result->num_rows  > 0 ) {

 

  while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['entry_id'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['value'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
}
$conn->close();

?>

</table>
</div>
<div class="col-sm-3">
</div>


</body>
</html>
