<?php
    include('MAYDbConnect.php');
    $tabledata="Select * FROM member";
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
            background-color: greenyellow;
            border-radius: 20px;
            height: 100%;
            display: flex;
            justify-content: center;
            
        }
        #TtlFunds{
            background-color:greenyellow;
            border-radius: 20px;
            height: 100%;
            display: flex;
            justify-content: center;
        }
        #rbox{
            display:flex;
            justify-content:center;
        }
        #Records{
            background-color:aqua;
            display: flex;
            justify-content: center;
            border-radius:20px;
        }
        #sntbox{
            display:flex;
            justify-content:center;
        }
        #sbox{
            justify-content:center;
        }
        #Search{
            background-color:red;
            display: flex;
            justify-content: center;
            border-radius:20px;
        }
        #searchtable{
            background-color:red;
        }
        #tbox{
            display:flex;
            justify-content:center;
        }
        #membtable{
            background-color: greenyellow;
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
        }
    </style>
</head>
<body>
    <div id="wlcomenttlfunds">
        <div id="Wlcome">
            <h2>Welcome back, User</h2>
        </div>
        <div id="TtlFunds">
            <h3>Total Funds Raised: xxx,xxx,xxx</h3>
        </div>
    </div>
    <div id=rbox>
        <div id="Records">
            <h3>Records:</h3>
        </div>
    </div>
    <div id="sntbox" class="container">
        <div id="sbox">
            <div id="Search">
                <form action="" method="GET">
                    <label><h4>Search:</h4></label>
                    <input type="text" name="searchtarget" value="<?php if(isset($_GET['searchtarget'])) {echo $_GET['searchtarget'];} ?>" placeholder="Please enter a name">
                    <button type="submit" class="btn btn-primary" name="searchbttn">Search</button>
                </form>
            </div><br>
            <div id="searchtable" class="container">
                <table border="3">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>No. of Tree(s)</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                        <?php
                            if(isset($_GET["searchbttn"])){
                                $targetmember=$_GET["searchtarget"];
                                $searchresult="SELECT * FROM member WHERE CONCAT(ID,First_Name,Last_Name,Phone_Number,Email,Number_of_Trees) LIKE '%".$targetmember."%'";
                                $displaysearch=mysqli_query($conn,$searchresult);

                                if(mysqli_num_rows($displaysearch)>0){
                                    while($resultdata =mysqli_fetch_assoc($displaysearch)){

                                        ?>
                                        <tr>
                                            <td><?=$resultdata["ID"];?></td>
                                            <td><?=$resultdata["First_Name"];?></td>
                                            <td><?=$resultdata["Last_Name"];?></td>
                                            <td><?=$resultdata["Phone_Number"];?></td>
                                            <td><?=$resultdata["Email"];?></td>
                                            <td><?=$resultdata["Number_of_Trees"];?></td>
                                        </tr>
                                        <?php
                                    }
                                }else{
                                    echo "<tr><td colspan='8'>No records found</td></tr>";
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
                    <tr id="tblerow1">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>No. of Tree(s)</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <tr>
                        <?php
                            while($row=mysqli_fetch_assoc($displaymemb))
                            {
                        ?>
                        <td><?php echo $row['ID'] ?></td>
                        <td><?php echo $row['First_Name'] ?></td>
                        <td><?php echo $row['Last_Name'] ?></td>
                        <td><?php echo $row['Phone_Number'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td><?php echo $row['Number_of_Trees'] ?></td>
                        <td><a href="MAYEditMember.php?ID=<?php echo $row['ID'] ?>">Edit</a></td>
                        <td><a href="MAYDelete.php?ID=<?php echo $row['ID'] ?>">Delete</a></td>
                    </tr>     
                        <?php
                            }
                        ?>
                </table>
            </div>
        </div>
    </div>
    <div id="logout">
        <form action="logout.php" method="get"><input type="submit" name="logout" value="Log Out"></form>
    </div>
</body>
</html>
