<?php
session_start();
include "dbConn.php";
$user_id = $_SESSION["user_id"];
$amount = $_SESSION["amount"];
$date = date("Y-m-d");
$tree_amount = $_SESSION["tree_amount"];
$certificate_id = $_SESSION["certificate_id"];

//insert payment record into database
if (isset($_POST["paybtn"])) {
    $query = "INSERT INTO `payment`(`user_id`, `amount`, `date`, `tree_amount`, `certificate_id`) VALUES ('$user_id','$amount','$date','$tree_amount','$certificate_id')";
    $result = mysqli_query($connection, $query);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <style>
        body{
            background-image: url(forest-background.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
        #box {
            height: 550px;
            width: 80%;
            margin: 35px 10%;
            background-color: white;
            text-align: center;
            padding-top: 100px;
            font-size: 50px;
            border-radius: 15px ;
        }

        .button {
            border: none;
            padding: 100px 110px;
            text-align: center;
            font-size: 16px;
            margin: 200px 30px;
            cursor: pointer;
            border-radius: 15px;
            font-size: large;
            background-color: #32a86b;
            color: white;
        }
        .button:hover {
            background-color: #4cd97a;
        }
    </style>
</head>
<body>
    <div id="box">Please choose your payment method:
        <br>
        <a href="credit-card.php"><button class="button">Credit card</button></a>
        <a href="bank.php"><button class="button">Online Banking</button></a>
        <a href="Tng.php"><button class="button">Tng Wallet</button></a>

    </div>
    
</body>
</html>