<?php
include "dbConn.php";
$namee = "ali";
echo $namee;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #box1 {
            height: 100px;
            width: 100px;
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <form>
            <input type="password" name="password" id="password"
            placeholder="password" required>
            <p class="msg">password is <span class="valid"></span></p>
        </form>

    </div>
    <script src="register.js"></script>
</body>
</html>