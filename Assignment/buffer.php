<?php

session_start();


include "dbConn.php";
$username = $_POST["username"];
$password = $_POST["password"];



$query = "SELECT * FROM user";

$results = mysqli_query($connection, $query);
while ($resultarray = mysqli_fetch_assoc($results)) {

    if ($username == $resultarray["username"] && $password == $resultarray["password"]) {


        // store user info into session
        $_SESSION["user_id"] = $resultarray["user_id"];
        $_SESSION["username"] = $resultarray["username"];
        $_SESSION["email"] = $resultarray["email"];
        
        $success = "success";
        header("Location:Member.php");

        break;
    }
    elseif ($username == "admin" && $password == "admin123") {
        $success = "success";
        header("Location: Admin.php");
    }

    
}

if (empty($success)){
    $_SESSION["failure"] = "failure";
    header("Location:Login.php");
}


?>