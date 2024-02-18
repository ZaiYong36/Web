<?php

include('AdminDbConnect.php');
$ID=$_GET['ID'];
$deletetarget="Delete from payment where payment_id=$ID";
if(mysqli_query($conn,$deletetarget)){
    header("Location:Admin.php");
}else{
    header("Location:Admin.php");
}
?>
