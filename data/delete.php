<?php

if(isset($_POST['submit']))
{
    $phone = $_POST['phone'];
}

$host = "localhost";
$username ="root";
$password ="";
$dbname = "kishan";

$con = mysqli_connect($host,$username,$password,$dbname);

if(!$con)
{
    die("connection failed!".mysqli_connect_error());
}

$sql = "DELETE FROM data where phone='$phone'";
$rs = mysqli_query($con,$sql);

if($rs)
{

echo "enter add!";

}

mysqli_close($con);

?>
<!DOCTYPE html>
<html>
<body>
<button onclick="window.location.href='index.html'">Home ?</button>
</body>
</html>