<?php
    
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
    

    $conn = mysqli_connect("localhost","root", "", "mydb") or die("connection failed");

    $sql = "INSERT INTO `simpledata` (`fname`,`lname`) VALUES ('{$fname}', '{$lname}')";



    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
    

    mysqli_close($conn);
?>