<?php
if (isset($_POST['id'])) {
$nameId = $_POST['id'];

$conn = mysqli_connect('localhost','root','','mydb') or die("Connection Failed");

$sql = "SELECT * FROM `simpledata` WHERE id = {$nameId}";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>
            <td width='90px'>First Name</td>
            <td><input type='text' id='edit-fname' value='{$row["fname"]}'>
                <input type='text' id='edit-id' hidden value='{$row["id"]}'>
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type='text' id='edit-lname' value='{$row["lname"]}'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' id='edit-submit' value='save'></td>
        </tr>";

    }

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}
}else {
    echo "ID is not set in POST request.";
}

?>
