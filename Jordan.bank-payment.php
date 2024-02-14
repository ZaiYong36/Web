<?php

$servername = 'localhost'; //127.0.0.1
$username = 'root';
$password = '';
$database = 'payment_info';

$connection = mysqli_connect($servername, $username, $password, $database);

if($connection ===false) {
    die("Connection failed" . mysqli_connect_error());
} 

Function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$txtName = $txtCVV = $txtCardNumber = "";
$NameErr = $CVVErr = $CardNumberErr = "";

if (isset($_POST['btnConfirm'])) {
    if (empty($_POST['txtName'])) {
        $NameErr = 'Please enter your name'; 
    } else {
        $txtName = test_input($_POST['txtName']);
        if (!preg_match("/^[a-zA-Z]*$/",$txtName)){
            $nameErr = "Only letters and white space allowed";
            } else { 
                $namesucess = "success" ;
            }
    }

    if (empty($_POST['txtCVV'])) {
        $CVVErr = 'Please enter your card CVV'; 
    }  else {
            $txtCVV = test_input($_POST['txtCVV']);
        if (!preg_match("/^[0-9]*$/",$txtCVV)){
                $CVVErr = "Invalid CVV";
            } else { 
                $cvvsuccess = "success";
            }
        }


    if (empty($_POST['txtCardNumber'])) {
        $CardNumberErr = 'Please enter your card number'; 
    }   else {
        $txtCardNumber = test_input($_POST['txtCVV']);
        if (!preg_match("/^[0-9]*$/",$txtCVV)){
                $CardNumberErr = "Invalid Card Number";
            } else {
                $cardnumber_success = "success";
            }
        }
    }

if(isset($_POST['btnConfirm'])){
    $name = $_POST['txtName'];
    $cvv = $_POST['txtCVV'];
    $card_number = $_POST['txtCardNumber'];
    $month = $_POST['months'];
    $year = $_POST['years'];

    $query = "INSERT INTO tblpaymentinfo(name, cvv, card_num, expiry_month, expiry_year) 
            VALUES ('$name','$cvv','$card_number','$month','$year')"; 

    if (mysqli_query($connection,$query)) {
    echo "<script> alert('Payment successfully')</script>";
    } else {
    echo "<script> alert('Payment unsuccessfully :C')</script>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="payment-css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
<style>.error{
        color: red;
        }

        .btnConfirm{
            background-color: blueviolet;
            color: white;
            text-align: center;
            text-transform: uppercase;
            text-decoration: none;
            padding: 10px;
            font-size: 18px;
            transition: 0.5s;
            border-radius: 10px;
        }

        .btnConfirm:hover{
            background-color: dodgerblue;
        }

</style>
</head>
<body>
    <form action="#" method="post">
    <div class="container">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="Name">
                <h3>Name</h3>
                <div class="input-field">
                    <input type="text" name="txtName" maxlength = "20">
                    <span class = "error"> <?php echo $NameErr; ?> </span>
                </div>
            </div>
        </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input type="text" name="txtCVV" maxlength = "4">
                    <span class = "error"> <?php echo $CVVErr; ?> </span>
                </div>
            </div>
            <div class="second-row">
                <div class="card-number">
                    <h3>Card Number</h3>
                    <div class="input-field">
                        <input type="text" name="txtCardNumber" maxlength = "19">
                        <span class = "error"> <?php echo $CardNumberErr; ?> </span>
                    </div>
                </div>
            </div>
            <div class="third-row">
                <h3>Expiry Date</h3>
                <div class="selection">
                    <div class="date">
                        <select name="months" id="months">
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">May</option>
                            <option value="Jun">Jun</option>
                            <option value="Jul">Jul</option>
                            <option value="Aug">Aug</option>
                            <option value="Sep">Sep</option>
                            <option value="Oct">Oct</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>   
                        </select>
                        <select name="years" id="years">
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                        </select>
                    </div>
                    <div class="cards">
                        <img src="mc.png" alt="">
                        <img src="vi.png" alt="">
                        <img src="pp.png" alt="">
                    </div>
                </div>
            </div>
            <input type = "submit" name = "btnConfirm" class = "btnConfirm" value = "Confirm"  >
        </div>
    </form>
</body>
</html>
