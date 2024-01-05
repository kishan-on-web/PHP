<?php
$conn = new mysqli('localhost', 'root', '', 'csvdata') or die("connection failed");

if (!isset($_FILES["file"])) {
    echo "Error: No file uploaded.";
} elseif ($_FILES["file"]["error"] != 0) {
    echo "Error: File upload failed with error code " . $_FILES["file"]["error"];
} else {
    $file = $_FILES["file"]["tmp_name"];

    if (empty($file)) {
        echo "Error: File path is empty.";
    } else {
        $handle = fopen($file, "r");

        if ($handle !== false) {
            // Read and discard the header (title) line
            $header = fgetcsv($handle, 1000, ",");

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $id = $data[0];
                $name = $data[1];
                $mobile = $data[2];

                $sql = "INSERT INTO try (id, name, mobile) VALUES ('$id', '$name', '$mobile')";
                $conn->query($sql);
            }

            fclose($handle);
            echo "1"; // Success
        } else {
            echo "Error: Unable to open the file for reading.";
        }
    }
}

$conn->close();
?>
