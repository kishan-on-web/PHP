<?php
    $conn = mysqli_connect("localhost","root", "", "registration") or die("connection failed");
    
    $sql = "SELECT * FROM data";

    $result = mysqli_query($conn,$sql) or die("connection failed");
    $output ="";
    
    if(mysqli_num_rows($result) > 0){
        $output='<table>
        <tr>

        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>

    </tr>';
        while($row = mysqli_fetch_assoc($result)) {
            $output .= "<tr><td>{$row["id"]}</td><td>{$row["fname"]}</td><td>{$row["lname"]}</td><td>{$row["email"]}</td></tr>";
        }
        $output .= '</table>';

        mysqli_close($conn);

        echo $output;
    }else{
    echo "no data found";
    }
?>