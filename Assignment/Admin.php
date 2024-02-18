<?php
    include('AdminDbConnect.php');
    $tabledata="Select * FROM payment";
    $displaymemb = mysqli_query($conn,$tabledata);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <body background="https://images.pexels.com/photos/38136/pexels-photo-38136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></body>
    <style>
        #wlcomenttlfunds{
            display: flex;
            justify-content: space-around;
        }
        #Wlcome{
            background-color: rgb(128,255,0,0.8);
            width: 50%;
            border-radius: 20px;
            height: 100%;
            display: flex;
            justify-content: center;
            
        }
        #TtlFunds{
            background-color:rgb(128,255,0,0.8);
            border-radius: 20px;
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            font-size: 50px;
        }
        #rbox{
            display:flex;
            justify-content:center;
        }
        #Records{
            background-color:aqua;
            width: 100%;
            display: flex;
            justify-content: center;
            border-radius:20px;
        }
        #sntbox{
            display:flex;
            justify-content:space-around;
        }
        #sbox{
            justify-content:center;
            width: 50%;
        }
        #Search{
            background-color:rgb(255,0,0,0.9);
            display: flex;
            width: 100%;
            justify-content: center;
            border-radius:20px;
        }
        #searchtable{
            width: 100%;
            background-color:rgb(255,255,255,0.8);
        }
        #tbox{
            display:flex;
            justify-content:center;
        }
        #membtable{
            background-color: rgb(128,255,0,0.8);
            height: 100%;
            margin: 0%;
            display: flex;
            justify-content: center;
        }
        #logout{
            background-color: rgba(255, 0, 0, 0.5)
            height: 100%;
            display: flex;
            justify-content: center;
            position: relative;
            top:50px;
        }
        #tablerow1{
            width: 100%;
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
        table {
            width:100%;
        }
        
    </style>
</head>
<body>
    <div id="wlcomenttlfunds">
        <div id="Wlcome">
            <h2>Welcome back, Admin</h2>
        </div>
        <div id="TtlFunds">
            Total fund raised: RM
            <?php
            $query = "SELECT SUM(tree_amount) AS TA FROM payment ";

            $results = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($results)>0) {
                $row = mysqli_fetch_assoc($results);
                echo $row["TA"];

            }
            ?>
        </div>
    </div>
    <div id=rbox>
        <div id="Records">
            <h1>Payment records and user information:</h1>
        </div>
    </div>
    <div id="sntbox" class="container">
        <div id="sbox">
            <div id="Search">
                <form action="" method="GET">
                    <h2>Search payment record:</h2>
                    <input type="text" name="searchtarget" value="<?php if(isset($_GET['searchtarget'])) {echo $_GET['searchtarget'];} ?>" placeholder="Please enter a name">
                    <button type="submit" class="btn btn-primary" name="searchbttn">Search</button>
                </form>
            </div><br>
            <div id="searchtable" class="container">
                <table border="3">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Amount of tree</th>
                        <th>Certificate_ID</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                        <?php
                            if(isset($_GET["searchbttn"])){
                                //get user_id
                                $targetmember=$_GET["searchtarget"];
                                $query = "SELECT * FROM user where username LIKE '%".$targetmember."%'";
                                $results = mysqli_query($conn, $query);

                                while ($result = mysqli_fetch_assoc($results)){
                                    $result_id = $result["user_id"];
                                    $searchresult="SELECT * FROM payment WHERE user_id LIKE '%$result_id%'";
                                    $displaysearch=mysqli_query($conn,$searchresult);
                                    $username = $result["username"];

                                    if(mysqli_num_rows($displaysearch)>0){
                                        while($resultdata =mysqli_fetch_assoc($displaysearch)){

                                            ?>
                                            <tr>
                                                <td><?=$resultdata["payment_id"];?></td>
                                                <td><?=$result["username"];?></td>
                                                <td><?=$resultdata["amount"];?></td>
                                                <td><?=$resultdata["date"];?></td>
                                                <td><?=$resultdata["tree_amount"];?></td>
                                                <td><?=$resultdata["certificate_id"];?></td>
                                                <td><a href="Delete.php?ID=<?php echo $resultdata["payment_id"] ?>">Delete</a></td>
                                            </tr>

                                        
                                    
                                        <?php
                                        }
                                    }else{
                                        echo "<tr><td colspan='8' style='text-align: center;'>No records found for ".  $username . "</td></tr>";
                                    }
                                }
                            }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <div id="tbox">
            
            <div id="membtable">
                
                <table border="3">
                    <tr id="tablerow1">
                        <th>ID</th>
                        <th>Username</th>
                        <th>email</th>
                        <th>password</th>
                        <th>Total Tree Planted</th>
                        
                    </tr>
                    <tr>
                        <?php
                            $query = "SELECT * FROM user";
                            $results = mysqli_query($conn, $query);
                            while($row=mysqli_fetch_assoc($results))
                            {
                        ?>
                        <td><?php echo $row['user_id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['total_tree'] ?></td>
                        
                    </tr>     
                        <?php
                            }
                        ?>
                </table>
            </div>
        </div>
    </div>
    <div id="logout">
        <a href="Main page.html"><button class="button">Log out</button></a>
    </div>
</body>
</html>
