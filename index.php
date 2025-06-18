<?php

$Servername = "reboot-ctf.mysql.database.azure.com";
$username = "skmnhokqqk";
$password = "10 things I hate about you";

$conn = new mysqli($Servername, $username, $password, "players");

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";


//close db connection
$conn->close();

?>

