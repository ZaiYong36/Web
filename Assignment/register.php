<?php
include "dbConn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Gaia</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    
    
    <div class="wrapper">
        <form action="register.php" method="post">
            <h1>Register</h1>
            
            <div class="input-box">
                <input type="text" name="username"
                placeholder="Username" required>
            </div>

            <div class="input-box">
                <input type="email" name="email" 
                placeholder="email" required>
                
            </div>

            <div class="input-box">
                <input type="password" name="password" id="password"
                placeholder="password" required>
            </div>

            <input type="submit" name="loginbtn" class="btn" value="Register">

        </form>
    </div>

</body>
</html>

<?php
if (isset($_POST["loginbtn"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE username like '%$username%'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result)<1) {
        $query = "INSERT INTO `user`(`username`, `email`, `password`) VALUES ('$username','$email','$password');";

        if(mysqli_query($connection, $query)) {
            echo '<script>alert("Registered successfully!")</script>' ;
            header("Refresh: 1; url=Login.php"); 
        } else {
            echo '<script>alert("Failed to register!")</script>' ;}
    }
    else {
        echo '<script>alert("Name exist!")</script>';
    }
}
    
    
?>