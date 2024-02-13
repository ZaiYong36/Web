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
            background-color:red;
            display:flex;
            justify-content:center;
        }
        #infobox{
            justify-content:center;
        }
        #IDbox{
            display:flex;
            justify-content:center;
            
        }
        #ID{
            background-color:red;
            display:flex;
            justify-content:center;
        }
        #fnamebox{
            display:flex;
            justify-content:center;
        }
        #fname{
            background-color:red;
            display:flex;
            justify-content:center;
            
        }
        #lnamebox{
            display:flex;
            justify-content:center;
        }
        #lname{
            background-color:red;
            display:flex;
            justify-content:center;
        }
        #phbox{
            display:flex;
            justify-content:center;
        }
        #ph{
            background-color:red;
            display:flex;
            justify-content:center;
        }
        #emailbox{
            display:flex;
            justify-content:center;
        }
        #email{
            background-color:red;
            display:flex;
            justify-content:center;
        }
        #treenumbox{
            display:flex;
            justify-content:center;
        }
        #treenum{
            background-color:red;
            display:flex;
            justify-content:center;
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
            background-color:white;
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
        <div id="infobox">
            <div id="idbox">
                <div id="id">
                    <h4>ID:</h4><input type="text" name="idinput" value="<?php echo $row['ID'];?>">
                </div>
            </div>
            <div id="fnamebox">
                <div id="fname">
                    <h4>First Name:</h4><input type="text" name="fnameinput" value="<?php echo $row['First_Name'];?>">
                </div>
            </div>
            <div id="lnamebox">
                <div id="lname">
                    <h4>Last Name:</h4><input type="text" name="lnameinput" value="<?php echo $row['Last_Name'];?>">
                </div>
            </div>
            <div id="phbox">
                <div id="ph">
                    <h4>Phone Number:</h4><input type="text" name="phinput" value="<?php echo $row['Phone_Number'];?>">
                </div>
            </div>
            <div id="emailbox">
                <div id="email">
                    <h4>Email:</h4><input type="text" name="emailinput" value="<?php echo $row['Email'];?>">
                </div>
            </div>
            <div id="treenumbox">
                <div id="treenum">
                    <h4>Number of Tree(s):</h4><input type="text" name="treenuminput" value="<?php echo $row['Number_of_Trees'];?>">
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
