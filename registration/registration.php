<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
    }

    $host ="localhost";
    $username = "root";
    $password = "";
    $dbname ="registration";

    $con = mysqli_connect($host, $username, $password, $dbname);
 
    if(!$con) {
        die("connection failed!" . mysqli_connect_errno());
    }
    $sql = "INSERT INTO `data` (`id`,`fname`,`lname`,`email`,`pass`,`cpass`) VALUES ('$id', '$fname', '$lname', '$email', '$pass', '$cpass')";

    $rs = mysqli_query($con, $sql);
     
    if($rs) {
        echo "Enteries added!";   
    }

    mysqli_close($con);
  
?>


