<?php
    if(isset($_POST["id"])) {
    $nameId = $_POST["id"];

    $conn = mysqli_connect("localhost","root", "", "mydb") or die("connection failed");
    
    $sql = "DELETE FROM `simpledata` WHERE id = {$nameId}";

    if (mysqli_query($conn, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
    
    mysqli_close($conn);}
    else {
        echo "ID is not set in POST request.";
    }
?>