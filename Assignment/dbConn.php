<?php



$server = "localhost";
$user = "root";
$password = "";
$database = "wdt_assignment";
$connection = '';

$connection = mysqli_connect($server,$user,$password,$database);

if($connection) {
      // die is the command that will display message and execute command  

} else{
    die( "Database connection failed" . mysqli_error($connection));
}


?>