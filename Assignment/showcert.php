<?php 
session_start();
$username = $_SESSION["username"];
$certificate_id =  $_GET["certificate_id"];
$date = $_GET["date"];
include "dbConn.php";

$query = "SELECT * FROM certificate where certificate_id LIKE '%$certificate_id%'";

$results = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($results)){
    $achievement = $row["achievement"];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        body{
            background-color: white;
            background-image: url("Forest.avif");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .cert {
            height: 550px;
            width: 650px;
            margin: 10px 500px 0px 350px;
            
            background-color: #c7fcd9;
            padding: 50px 100px 0px 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 15px;
            text-align: center;
            font-size: 50px;
        }
        .button {
            border: none;
            padding: 30px 60px;
            text-align: center;
            font-size: 16px;
            margin: 20px 5px;
            cursor: pointer;
            border-radius: 15px;
            font-size: large;
            box-shadow: 0 9px #999;
            background-color: #aafad3;
            left: 0px;
            bottom: 0px;
        }
        .button:hover {
            background-color: #4cd97a;
        }
        .button:active {
            background-color: #4cd97a;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
</head>
<body>
    <div class="cert">
        <?php echo $achievement."<br><br>";
        
        echo "<span style='font-size: 100px;'>". $username . "</span><br><br>";
        echo "<span style='font-size: 100px;'>". $date . "</span><br><br>";
        ?>

    

</div>
<a href="Member.php"><button class="button">Back</button></a>
</body>
</html>