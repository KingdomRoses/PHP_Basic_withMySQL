<?php

//set universal variables
$servername = "reboot-server.mysql.database.azure.com";
$username = "skmnhokqqk";
$password = "10 things I hate about you!";
$database = "players";
$table = "competitors";

//create a new connection using universal variables
$conn = new mysqli($servername, $username, $password);

//if connection fails, die and echo error
if (mysqli_connect_errno($conn)) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}

//if the connection succeeds echo confirmation
echo "Connected Successfully";
    
//close db connection
$conn->close();

?>




