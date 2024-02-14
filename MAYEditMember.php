<?php
    include('MAYDbConnect.php');
    echo $ID = $_GET['ID'];

    $edittarget ="Select * from member where ID = $ID";

    $result = mysqli_query($conn,$edittarget);
    if(mysqli_num_rows($result) ==1){
        $row = mysqli_fetch_assoc($result);
?>  
<?php
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
                <div id="id">
                    <h4>ID:</h4><input type="text" name="idinput" value="<?php echo $row['ID'];?>">
                </div>
                <div id="fname">
                    <h4>First Name:</h4><input type="text" name="fnameinput" value="<?php echo $row['First_Name'];?>">
                </div>
                <div id="lname">
                    <h4>Last Name:</h4><input type="text" name="lnameinput" value="<?php echo $row['Last_Name'];?>">
                </div>
                <div id="ph">
                    <h4>Phone Number:</h4><input type="text" name="phinput" value="<?php echo $row['Phone_Number'];?>">
                </div>
                <div id="email">
                    <h4>Email:</h4><input type="text" name="emailinput" value="<?php echo $row['Email'];?>">
                </div>
                <div id="treenum">
                    <h4>Number of Tree(s):</h4><input type="text" name="treenuminput" value="<?php echo $row['Number_of_Trees'];?>">
                </div>
            </div>
        </div>
        <div id="logoutbutton">
            <input type="submit" value="Update" name="updatetarget">
        </div>
        </div>
    </form>
    <div>
        <?php
            if(isset($_POST['updatetarget'])){
                $fname= $_POST['fnameinput'];
                $lname= $_POST['lnameinput'];
                $phnum= $_POST['phinput'];
                $email= $_POST['emailinput'];
                $treenum= $_POST['treenuminput'];

                $update="UPDATE  member set ID='$ID',First_Name='$fname',Last_Name='$lname',
                            Phone_Number='$phnum', Email='$email',Number_of_Trees='$treenum'
                            where ID='$ID'";
                
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
                <a href='MAYAdmin.php'><h3>Return</h3></a>
            </div>
    </div>
</body>
</html>
