<?php

include('MAYDbConnect.php');
$ID=$_GET['ID'];
$deletetarget="Delete from member where ID=$ID";
if(mysqli_query($conn,$deletetarget)){
    header("Location:MAYAdmin.php");
}else{
    header("Location:MAYAdmin.php");
}
?>
