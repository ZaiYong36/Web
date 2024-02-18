<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Gaia</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    
    
    <div class="wrapper">
        <form action="buffer.php" method="post">
            <h1>Login</h1>
            
            <div class="input-box">
                <input type="text" name="username"
                placeholder="Username" required>
            </div>

            <div class="input-box">
                <input type="password" name="password"
                placeholder="password" required>

                <?php 
                if (isset($_SESSION["failure"])) {
                    echo "<span style='color:red; margin-left: 35%; font-size: 20px;'>Login failed!</span>";
                    session_unset();
                }
            ?>
            </div>
            <br>
            <div class="remember-forgot">
                
                <label><input type="checkbox"> Remember me
                </label>

            </div>

            <input type="submit" name="loginbtn" class="btn" value="Login">

            <div class="register-link"></div>
                <p>Don't have an account? <a href="register.php">register</a></p>

        </form>
    </div>

</body>
</html>

