<?php
    $server = 'localhost';  //127.0.0.1
    $user = 'root'; //default user
    $password = '';
    $database = 'wdt_assignment';

    $connection = mysqli_connect($server,$user,$password,$database);
    
    if($connection === false) {
        die( "Database connection failed" . mysqli_error($connection));
     } 
    //  else{
    //     echo "Database connection Established" ;  // die is the command that will display message and execute command  
    // }
    



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maitree:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bank.css">
<style>
body {
    background-image: url("Forest.avif");
    background-repeat: no-repeat;
    background-size: cover;
}
.box1 {
    opacity:0.97;
    border-radius:5px;
}
.Amount{
    margin-left: 175px;
    margin-top: 25px;
    height: 50px;
    width: 760px;
    font-size: 28px;
    text-align: center;
    font-family: 'Maitree', serif;
}
.box1{
    margin-left: 200px;
    margin-right: 200px;
    background-color: white;
    padding-top: 10px;
    padding-bottom: 200px;
    font-family: 'Maitree', serif;
    opacity: 0.98;
    border-radius: 5px;
}
.Bt1{
    float:left;
    margin-top: 20px;
    margin-left: 175px;
    height: 50px;
    width: 345px;
    font-family: 'Maitree', serif;
    background-color: #a7db16;
    border: none;
    color: white;
    font-size: 28px;
    border-radius: 2px;
    cursor: pointer;
    transition: opacity 0.3s;
}
.Bt1:hover{
    opacity: 0.8;
}
.Bt2{
    float:right;
    margin-right: 175px ;
    margin-top: 20px;
    height: 50px;
    width: 355px;
    font-family: 'Maitree', serif;
    background-color: #a7db16;
    border: none;
    color: white;
    font-size: 28px;
    border-radius: 2px;
    cursor: pointer;
    transition: opacity 0.3s;
}
.Bt2:hover{
    opacity: 0.8;
}
</style>
</head>
<body>
    <div class="box1">    
        <form action="bank.php" method="post">
            <p class="p1"><b>Pay with online banking</b></p>
            <input class="Name" placeholder="&nbsp; Account Name" type="text" name="tname" required><br>
            <input class="Num" placeholder="&nbsp; Account Number" type="text" name="tnum" required><br>
            <input class="Amount" placeholder="Amount" type="text" name="tamount" required><br>
            <button class="Bt2" type="submit" value="register" name="btnregister">Pay</button>
        </form>
        <a href="Payment.php"><button class="Bt1">Cancel</button></a>
    </div>
</body>
</html>

<?php

if(isset($_POST['btnregister'])){
    
    $name = $_POST['tname'];
    $num = $_POST['tnum'];
    $amount = $_POST['tamount'];


     $sql = "INSERT INTO `bank_pay`(`name`, `number`, `amount`) VALUES ('$name','$num','$amount')";

    if(mysqli_query($connection,$sql)){
        echo "<script> alert('Payment successfully')</script>";
    }else{
        echo "<script> alert('Payment failed')</script>";
    }
    $registerbtn = null;
    header("Location: receipt.php");
}

?>
