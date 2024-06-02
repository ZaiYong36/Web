<?php
    session_start();

    $user_id = $_SESSION["user_id"];
    $username = $_SESSION["username"];
    include "dbConn.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>
    <style>
        body {
            background-image: url(forest-background.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        #bigbox {
            width: 85%;
            margin-top: 30px;
            margin-left: 7.5%;
            opacity: 0.8;

        }
        #welcomebox {
            width: 700px;
            top: 0px;
            left: 0px;
            text-align: center;
            padding: 100px 0px;
            font-size: 50px;
            float:left;
            border-radius: 25px;
            border-style: ridge;
            background-color: white;
            margin-bottom: 20px;
            box-shadow: rgba(179, 172, 168, 0.55) 0px 0px 15px -4px;
 
        }
        #treebox {
            height: 720px;
            width: 550px;
            background-color: white;
            float: right;
            text-align: center;
            padding-top: 100px;
            font-size: 30px;
            box-shadow: rgba(179, 172, 168, 0.55) 0px 0px 15px -4px;
            border-radius: 25px;

        }
        #treebox2 {
            height: 300px;
            width: 500px;
            background-color: white;
            padding-top: 300px;
            padding-left: 50px;
            font-size: 40px;
            text-align: left;
        }

        #paymentbox {
            height: 500px;
            width: 700px;
            top: 0px;
            left: 0px;
            text-align: center;
            padding-top: 40px;
            margin-bottom: 20px;
            font-size: 30px;
            float:left;
            background-color: white;
            box-shadow: rgba(179, 172, 168, 0.55) 0px 0px 15px -4px;
            border-radius: 25px;
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
        }
        .button:hover {
            background-color: #4cd97a;
        }
        .button:active {
            background-color: #4cd97a;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
        .clearb {
            clear: both;
        }

        .paybutton {
            background-color: green;
            color: white;}

        .paybutton:hover {
            background-color: #4cd97a;
        }
        
        #certificate {
            height: 100%;
            width: 100%;
            background-color: white;
            padding: 10px 10px;
            font-size: 40px;
            border-radius: 15px;
            box-shadow: rgba(179, 172, 168, 0.55) 0px 0px 15px -4px
        }
        #treestick {
            background-color: burlywood;
        }

        .logo1{
        width: 80px;
        margin-left: 0px;
        margin-top: -25px;
        border-radius: 100%;
        float: left;
        }
        .box1 ul {
            text-align: left;
            display: inline;
            padding: 45px 0px 17px 0;
            background-color: white;
            padding-bottom: 75px;
            box-shadow: rgba(179, 172, 168, 0.55) 0px 0px 15px -4px;
            font-family: 'Maitree', serif;
        }
        .box1 ul li {
            display: inline-block;
            margin-right: 2.5px;
            margin-top: 10px;
            position: relative;
            padding: 10px 649px 0px 0px;
            transition: color 0.3s;
            vertical-align: top;
            font-size: 25px;
            font-family: 'Maitree', serif;
            cursor: pointer;
            text-align: left;
        }
        .box1 ul li:hover{
        color: #a7db16;
        }

        .table {
            width: 100%;
            padding: 10px 10px;
        }
        th {
        background-color: #04AA6D;
        color: white;
        }
        th, td {
            padding: 10px 10px;
        }

        tr:hover {
            background-color: #99ffd3;
        }
        a {
            text-decoration: none;
            color: #2ac73c;
            font-size: 100%;
        }
        a:hover {
            color: #08a61b;
        }
        a:active {
            color: #018a2a;
        }
        .callus {
            font-size: 30px;
            color: #02d653;
            text-decoration: none;
        }
        .imgcontact {
            width: 30px;
            height: 25px;
        }
    </style>
</head>
<body>
    <div class="box1">
        <ul>        
            <li><a href="Main Page.html"><img class="logo1" src="Tree logo.jpg" alt="Tree Logo"></a></li>
            <li><a href="Main Page.html">Green Gaia</a></li>
    </div>
    <div id="clearb"></div>
    <div id="bigbox">
        <div id="welcomebox">Welcome back, <?php echo $username; ?></div>
        <div id="treebox">The number of trees you have planted:<br>
        <?php
        
        $query = "SELECT SUM(tree_amount) as TTS FROM payment WHERE user_id like '%$user_id%'";

        $results = mysqli_query($connection, $query);
        
        if(mysqli_num_rows($results)>0) {
            $row = mysqli_fetch_assoc($results);
            echo $row["TTS"];
            $tts = $row["TTS"];
        }
        else {
            echo "No record found :(";
        }
        
        $update_query = "UPDATE `user` SET `total_tree`='$tts' WHERE `user_id` like '%$user_id%'";
        $update = mysqli_query($connection, $update_query);

        ?>
            <div id="treebox2"><b>Support</b><br>
                <span class="callus">Call us<br><img src="phone logo.jpg" class="imgcontact">011-2831023<br>
                Email us<br><img src="gmail icon.png" class="imgcontact">greengaia@gmail.com</span></div> 
        </div>
        <div id="paymentbox">Would you like to plant more tree(s)?<br>
        How much do you wish to donate?<br>
        <form action="Member.php" method="post">
            <input type="submit" name="button1" class="button" value="1" />
            <input type="submit" name="button2" class="button" value="5" />
            <input type="submit" name="button3" class="button" value="10" />
            <input type="submit" name="button4" class="button" value="50" />
            <input type="submit" name="button5" class="button" value="100" />
        </form>
        <?php
        $price = 0;

        if (isset($_POST["button1"])) {
            $price = $_POST["button1"];
            echo "Price: {$price}";
            $certificate = 1;
        } 
        elseif (isset($_POST["button2"])) {
            $price = $_POST["button2"];
            echo "Price: {$price}";
            $certificate = 2;
        }
        elseif (isset($_POST["button3"])) {
            $price = $_POST["button3"];
            echo "Price: {$price}";
            $certificate = 3;
        }
        elseif (isset($_POST["button4"])) {
            $price = $_POST["button4"];
            echo "Price: {$price}";
            $certificate = 4;
        }
        elseif (isset($_POST["button5"])) {
            $price = $_POST["button5"];
            echo "Price: {$price}";
            $certificate = 5;
        }
        
        // define attribute for payment
        $_SESSION["amount"] = $price;
        $_SESSION["tree_amount"] = $price;
        if (isset($certificate)){
            $_SESSION["certificate_id"] = $certificate;
        }
        


        ?>

        <div style="padding: 10px 330px 0px  0px;"></div> 
        <!-- top right bottom left -->
        <form action="payment.php" method="post">
            <input type="submit" name="paybtn" class="button paybutton" value="pay">
        </form>
        

        </div>
        <div class="clearb"></div>
        <div id="certificate">Your certificates:
            <?php
               
            $query = "SELECT * FROM payment where user_id LIKE '%$user_id%'";
            
            $results = mysqli_query($connection, $query);
            if(mysqli_num_rows($results)>0) {
            
                echo "<table border=1 class=table>

                <tr class=tablerow>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Tree amount</th>
                    <th>View</th>

                </tr>";

                while($row = mysqli_fetch_assoc($results)) 
                { 
            ?>
                    <tr>
                        <td><?php echo $row['payment_id']; ?> </td>
                        <td><?php echo $row['date']; ?> </td>
                        <td><?php echo $row['tree_amount']; ?> </td>
                        <td><a href="showcert.php?certificate_id=<?php echo $row['certificate_id'];?>&date=<?php echo $row['date'];?>">View</a></td>

                    </tr>   

                <?php 
                }
                } else {
                    echo 'Sorry no record found';
                }

                mysqli_close($connection); 
                ?>
        </div>
    </div>
</body>
</html>