<?php
$conn = new mysqli('localhost', 'root', '', 'ldata') or die("connection failed");

if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    $file = $_FILES["file"]["tmp_name"];

    if (!empty($file)) {
        $handle = fopen($file, "r");

        if ($handle !== false) {
            $rows = [];

            while (($row = fgetcsv($handle)) !== false) {
                $rows[] = $row;
            }

            fclose($handle);

            $header = array_map('trim', array_shift($rows));

            if (in_array('Name', $header) && in_array('Mobile No.', $header)) {
                $array = [];

                foreach ($rows as $row) {
                    $array[] = array_combine($header, $row);
                }

                foreach ($array as $data) {
                    $name = $data['Name'];
                    $mobile = $data['Mobile No.'];

                    if (!is_numeric($mobile) || strlen($mobile) !== 10) {
                        echo "Invalid entry - Name: $name, Mobile: $mobile <br>";
                    } else {
                        $sql = "INSERT INTO data (name, mobile) VALUES ('$name', '$mobile')";

                        if ($conn->query($sql) !== TRUE) {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
                echo "Data uploaded successfully.";
                die();
            } else {
                echo "Required columns not found in the CSV file.";
            }
        } else {
            echo "Error reading the file.";
        }
    } else {
        echo "Empty file.";
    }
} else {
    echo "No file uploaded.";
}

mysqli_close($conn);
?>
