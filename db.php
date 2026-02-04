<?php

$conn = mysqli_connect("localhost","root","","test_db");

if(!$conn)
    {
        die("Connection failed" . mysqli_connect_error());
        
    }
    echo "Connected Successfully";

    mysqli_close($conn);

?>

