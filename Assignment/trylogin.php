
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="trylogin.php" method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    <input type="submit" name="submitbtn" value="submit">
    </form>

</body>
</html>

<?php 

if (mysqli_query($connection,$query)) {
    echo "<script> alert('Payment successfully')</script>"
}

?>