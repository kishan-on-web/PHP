<?php
if (isset($_POST['id'])) {
$nameId = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];

$conn = mysqli_connect("localhost","root","","mydb") or die("Connection Failed");

$sql = "UPDATE `simpledata` SET fname = '{$fname}',lname = '{$lname}' WHERE id = {$nameId}";

if(mysqli_query($conn, $sql)){
    echo 1;
}else{
    echo 0;
}
}else{
    echo "error";
}

?>
