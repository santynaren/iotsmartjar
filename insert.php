<?php

$servername = "localhost";//your server name
$username = "root"; // your server's username 
$password = "";//your database password
$databasename = "";// your database name
date_default_timezone_set("Asia/Kolkata");// Time Zone
$now = new DateTime(); // Timestamp Values
parse_str( html_entity_decode( $_SERVER['QUERY_STRING']) , $out); // this Function is used to parse the URL into segments as array
// If Condition Checks the presence of field in the URL ( Thats why in the URL used in arduino Code we have mentioned the word field)
if ( array_key_exists( 'field' , $out ) ) {
// Create connection
$conn = new mysqli($server_name, $server_username, $server_password, $database_name); // Connecting the Server
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//$datenow = $now->format('Y-m-d H:i:s');
$datenow = $now->format('Y-m-d H:i:s');
$fieldvalue  = $out['field']; //Getting the Value from array - out , where the identifier is field
// Inserting the data into Database 
$sql = "INSERT INTO espvalues VALUES ( '' , '$datenow' , '$fieldvalue')";

if ($conn->query($sql) == TRUE) {
echo "New Value Stored Successfully"; // Throwing the Status , you will see this in arduino 
} else {

echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
