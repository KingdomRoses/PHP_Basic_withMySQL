
<?php

if(isset($_POST['name'])){



//set connection variables
$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, 'reboot-server.mysql.database.azure.com', 'skmnhokqqk', 'U44$dIg6$TVuoW53', 'reboot-server', 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
header("location: /failure.php");
}


//creating db connection
//conn=mysqli_connect($server,$username,$password);
 

//collect post variables
$name=$_POST['name'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];


$sql="INSERT INTO `trip`.`trip` (`name`, `email`, `gender`, `age`, `phone`, `other`,
 `date`) VALUES ('$name', '$email', '$gender', '$age','$phone',' $desc', '2023-01-07 15:51:10.000000');";
//echo $sql;



//execute the query
if($conn->query($sql)==true)
{
    echo "Successfully inserted";
   
}
else{
    echo "ERROR $sql <br> $conn->error"; 
    header("location: /failure.php");
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
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
<img class="bg" src="bag.jpg" alt="KKWIEER">
<div class="container"> 
    <h1>Welcome to KKWIEER! Gujrat Trip Form</h1>
    <p> Enter details to register</p>

    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="email" id="email" placeholder="Enter your email-id">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="contact" id="contact" placeholder="Enter your contact number">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information "></textarea>
        <button class="btn">Submit</button>
    
    
    </form>


</div>


</body>
</html>