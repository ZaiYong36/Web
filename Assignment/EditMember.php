<?php
    include ("AdminDbConnect.php");
    $ID = $_GET['ID'];

    $edittarget ="Select * from payment where payment_id like $ID";

    $result = mysqli_query($conn,$edittarget);
    if(mysqli_num_rows($result) ==1){
        $row = mysqli_fetch_assoc($result);
    }
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <body background="https://images.pexels.com/photos/38136/pexels-photo-38136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></body>
    <style>
        #banner{
            display:flex;
            justify-content:center;
        }
        #bannertext{
            border-radius: 10px 10px 0 0;
            color:red;
            background-color: rgb(51,255,51,0.8);
            display:flex;
            justify-content:center;
        }
        #box1{
            display:flex;
            justify-content:center;
        }
        #box2{
            background-color:rgb(255,255,255,0.8);
            juatify-content:center;
            width:300px;
        }
        #ID{
        }
        #fname{
        }
        #lname{
        }
        #ph{
        }
        #email{
        }
        #treenum{
        }
        #logoutbutton{
            display:flex;
            justify-content:center;
        }
        #Updatestatusbox{
            display:flex;
            justify-content:center;
        }
        #Updatestatus{
            background-color:aqua;
            display:flex;
            justify-content:center;
            border-radius:20px;
        }
        #Returnbox{
            display:flex;
            justify-content:center;
        }
        #Returnbutton{
            background-color:rgb(255,255,255,0.8);
            display:flex;
            justify-content:center;
            border-radius:20px;
            width:200;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div id="banner">
            <div id="bannertext">
                <h2>Member Information</h2>
            </div>
        </div>
        <div id="box1" class="container">
            <div id="box2" class="container">

                <div id="fname">
                    <h4>user_ID:</h4><input type="text" name="user" value="<?php echo $row['user_id'];?>">
                </div>
                <div id="lname">
                    <h4>Amount:</h4><input type="text" name="amount" value="<?php echo $row['amount'];?>">
                </div>
                <div id="ph">
                    <h4>Date(yyyy-mm-dd):</h4><input type="text" name="date" value="<?php echo $row['date'];?>">
                </div>
                <div id="email">
                    <h4>Amount of tree:</h4><input type="text" name="tree_amount" value="<?php echo $row['tree_amount'];?>">
                </div>
                <div id="treenum">
                    <h4>Certificate_ID(s):</h4><input type="text" name="certificate_id" value="<?php echo $row['certificate_id'];?>">
                </div>
            </div>
        </div>
        <div id="updatestatusbox">
            <input type="submit" value="Update" name="updatetarget">
        </div>
        </div>
    </form>
    <div>
        <?php
            if(isset($_POST['updatetarget'])){
                $user= $_POST['user'];
                $amount= $_POST['amount'];
                $date= $_POST['date'];
                $tree_amount= $_POST['tree_amount'];
                $certificate_id= $_POST['certificate_id'];

                $update="UPDATE  payment set user_id='$user',amount='$amount',
                            `date`='$date', tree_amount='$tree_amount',certificate_id='$certificate_id'
                            where payment_id=$ID";
                
                if(mysqli_query($conn,$update)){
                    ?>
                    <div id="Updatestatusbox">
                        <div id="Updatestatus">
                            <h3>Record Updated!</h3>
                        </div>
                    </div>
                    <?php
                } else{
                    echo 'Update Failed!';
                }
            }
        mysqli_close($conn)
        ?>
    </div>
    <div id="Returnbox">
            <div id='Returnbutton'>
                <a href='Admin.php'><h3>Return</h3></a>
            </div>
    </div>
</body>
</html>
