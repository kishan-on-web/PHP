<?php
    $conn = new mysqli('localhost','root','','mydb') or die("connection failed");

    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $file = $_FILES["file"]["tmp_name"];

        if(!empty($file)){
            $handle = fopen($file, "r");

            if($handle !== false){
                $rows = [];

                    while(($row = fgetcsv($handle)) != false){
                        $rows[] = $row;
                    }
                    
                fclose($handle);
                
                $header = array_shift($rows);

                $array = [];
                
                foreach($rows as $row){
                    $array[] = array_combine($header,$row);
                }


                foreach ($array as $data) {
                    $id = $data['Id'];
                    $name = $data['Name'];
                    $mobile = $data['Mobail No.'];
            
                    $sql = "INSERT INTO csvdata (id, name, mobile) VALUES ('$id', '$name', '$mobile')";
                    
                    if ($conn->query($sql) !== TRUE) {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                echo 1;
            }else {
                echo "file not reading";
            }
        }else {
            echo "empty File";
        }

        
        
    }else{
        echo 0;
    }

    $conn->close();
    ?>

<!-- // while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//     $id = $data[0];
//     $name = $data[1];
//     $mobile = $data[2];
    
//     $sql = "INSERT INTO try (id, name, mobile) VALUES ('$id', '$name', '$mobile')";
//     $conn->query($sql);

// }
-->














