<?php
    $db_server="localhost";
    $db_user="root";
    $db_pass=" ";
    $db_name="adminrecords2";
    $conn="";

    try{
        $conn=mysqli_connect($db_server,
                            $db_user,
                            $dp_pass,
                            $db_name);
    }
    catch(mysqli_sql_exception) {
        echo "You are not connected";
    }
    /*if($conn){
        echo"You are connected";
    }*/
?>