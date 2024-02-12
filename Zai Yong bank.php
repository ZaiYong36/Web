<?php
    $server = 'localhost';  //127.0.0.1
    $user = 'root'; //default user
    $password = '';
    $database = 'dummy';

    $connection = mysqli_connect($server,$user,$password,$database);
    
    if($connection === false) {
        die( "Database connection failed" . mysqli_error($connection));
     } 
    //  else{
    //     echo "Database connection Established" ;  // die is the command that will display message and execute command  
    // }
    if(isset($_POST['btnregister'])){
        $name = $_POST['tname'];
        $num = $_POST['tnum'];
        $date = $_POST['tdate'];
        $amount = $_POST['tamount'];
    
        $sqlnum="SELECT * FROM `payment` WHERE `number` = '$num'";
        $results = mysqli_query($connection,$sqlnum);

    if (mysqli_num_rows($results) == 1 ) {
        $row = mysqli_fetch_assoc($results);
        echo 'Credit card number Exists!';
    }else {
         $sql = "INSERT INTO `payment`(`name`, `number`, `date`, `amount`) VALUES ('$name','$num','$date','$amount')";

        if(mysqli_query($connection,$sql)){
            echo 'Registered Successfully!';
        }else{
            echo 'Fail to Register!';
        }
    }
}


mysqli_close($connection);
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
    <link rel="stylesheet" href="css/style.css">
<style>
body {
    background-image: url("Img/Forest.avif");
    background-repeat: no-repeat;
    background-size: cover;
}
.box1 {
    opacity:0.97;
    border-radius:5px;
}
</style>
</head>
<body background-image: url("Img/Forest.avif")>
    <div class="box1">    
        <form action="#" method="post">
            <p class="p1"><b>Pay with card</b></p>
            <input class="Name" placeholder="&nbsp; Name" type="text" name="tname" ><br>
            <input class="Num" placeholder="&nbsp; Number" type="text" name="tnum"><br>
            <input class="Date" placeholder="YYYY/MM/DD" type="text" name="tdate">
            <input class="Amount" placeholder="Amount" type="text" name="tamount"><br>
            <button class="Bt1">Cancel</button>
            <button class="Bt2" type="submit" value="register" name="btnregister">Pay</button>
        </form>
    </div>
</body>
</html>
