<?php
    if (isset($_POST['search'])) {
    $searchData = $_POST['search'];

    $conn = mysqli_connect("localhost","root", "", "mydb") or die("connection failed");
    
    $sql = "SELECT * FROM simpledata WHERE fname LIKE '%{$searchData}%' OR lname LIKE '%{$searchData}%'";

    $result = mysqli_query($conn,$sql) or die("connection failed");
    $output ="";
    
    if(mysqli_num_rows($result) > 0){
        $output='<table border="1" width="500px" height="500px" style="text-align: center;margin-top:80px;">
                    <tr>
                        <th width="100px">Id</th>
                        <th width="100px">First Name</th>
                        <th width="100px">Last Name</th>
                        <th width="100px">Edit Data</th>
                        <th width="100px">Delete</th>
                    </tr>';
                    
        while($row = mysqli_fetch_assoc($result)) {
            $output .= "<tr><td>{$row["id"]}</td><td>{$row["fname"]}</td><td>{$row["lname"]}</td><td><button class='edit-btn' data-id='{$row["id"]}'>Edit</button></td><td><button class='delete-btn' data-id='{$row["id"]}'>delete</button></td></tr>";
        }
        $output .= '</table>';

        mysqli_close($conn);

        echo $output;
        
    }else{
    echo "no data found";
    }
}else{
    echo "it's not working";
}
?>