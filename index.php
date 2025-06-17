<?php

if(isset($_POST['name'])){
//set connection variables
$conn = mysqli_init();

//enable SSL *current point of concern*
mysqli_ssl_set($conn,NULL,NULL, __DIR__."/DigiCertGlobalRootCA.crt.pem", NULL, NULL);

//connection to database
mysqli_real_connect($conn, 'reboot-server.mysql.database.azure.com', 'skmnhokqqk', '10 things I hate about you!', 'reboot-database', 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}
$name = 'john'; // For testing purposes, you can replace this with $_POST['name'] when ready


$sql = "INSERT INTO `login` (`name`) VALUES ('$name');";
echo $sql;

$result = $conn->query("SELECT * FROM login");
while ($row = $result->fetch_assoc()) {
    echo htmlspecialchars($row['name']) . "<br>";
}


//execute the query
if($conn->query($sql)==true)
{
    //echo "Successfully inserted";
    header("Location: /success.php");
   
}
else{
    //echo "ERROR $sql <br> $conn->error"; 
    header("Location: /failure.php");
}


//close db connection
$conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the rebootCTF!</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
<img class="bg" src="bag.jpg" alt="KKWIEER">
<div class="container"> 
    <h1>A totally legitimate website...</h1>
    <p> Enter your name to access the challenges!</p>

    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <button class="btn">Submit</button>
    
    
    </form>


</div>


</body>
</html>