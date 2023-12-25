<!-- <!DOCTYPE html>
<html>
    <head>
        <style>
             table {
                width: 100vh;
            }
            th,td {
                border: 1px solid black;
                padding: 10px;
                margin: 5px;
                text-align: center;
            }
        </style>
    </head>

<body> -->
<?php 


if(isset($_POST['submit'])){
    $id = $_POST['id'];
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_errno());
}

$sql = "SELECT id,fname, lname,email,pass,cpass FROM data where id='$id'";
// $sql = "select * from data";

$result = mysqli_query($conn,$sql);

$row =[];

// if ($result->num_rows > 0)
// {
//     echo "<table><tr><th>ID</th> <th>firstName</th> <th>lastName</th> <th>email</th> <th>password</th> <th>confrompassword</th></tr>";
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fname"]. "</td><td>" . $row["lname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["pass"]. "</td><td>" . $row["cpass"]. " </td></tr>";
//     }
//         echo "</table>";
//     } 
    
// else {
//     echo "0 results"+
// ;
// }
?>
<!-- </body>
</html> -->

<!DOCTYPE html>
<html>
    <head>
        <style>
            table {
                width: 100vh;
            }
            th,td {
                border: 1px solid black;
                padding: 10px;
                margin: 5px;
                text-align: center;
            }
        </style>
    </head>
    <boday>
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Confrom Password</th>
                </tr>

                <?php
                    if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                    ?>
                

                   <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['pass']; ?></td>
                    <td><?php echo $row['cpass']; ?></td>
                   </tr>
                 
                
            <?php } }
            
                else {
                    echo "no data found";
                }
            ?>

            </table>
    </boday>
</html>

<?php 
    mysqli_close($conn);
?>