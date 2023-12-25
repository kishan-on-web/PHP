<?php
error_reporting(0);

$msg = "";

if (isset($_POST['upload'])) {
    $filename = $_FILES["upload"]["name"];
    $teamfile = $_FILES["upload"]["tmp_name"];
    $folder = "./image/" . $filename;

    $db = mysqli_connect("localhost", "root", "", "tryup");

    $sql = "INSERT INTO upload (image) VALUES ('$filename')";

    mysqli_query($db, $sql);

    if (move_uploaded_file($teamfile, $folder)) {
        echo "<h3>IMAGE UPLOADED SUCCESSFULLY!</h3>";
    } else {
        echo "<h3>FAILED TO UPLOAD IMAGE!</h3>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        .content {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        #display-image img {
            max-width: 300px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="content">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" name="upload" id="upload" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>

    <div id="display-image">
        <?php
        $query = "SELECT * FROM upload";
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <img src="./image/<?php echo $row['image']; ?>">
            <?php
        }
        ?>
    </div>

</body>

</html>