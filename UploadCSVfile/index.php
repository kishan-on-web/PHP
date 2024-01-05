<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="dataForm" enctype="multipart/form-data">
        <label for="file">Choose File (only .csv):</label>
        <input type="file" id="file" name="file" accept=".csv" required>
        <p id="error" style="color: red; display: none;">Please upload only CSV files.</p>
        <br>
        <button type="submit">Submit</button>

        
        <div id="res"></div>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#dataForm").submit(function (event) {
                var fileInput = $("#file")[0].files[0];
                var allowedExtensions = /(\.csv)$/i;
            
                if (!allowedExtensions.exec(fileInput.name)) {
                    event.preventDefault();
                    $("#error").show();
                } else {
                    $("#error").hide();
                }
            
                var formData = new FormData();
                formData.append('file', fileInput);
            
                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if(res === "1"){
                            $("#res").html("Data uploaded successfully.");
                        } else {
                            alert("Error" + res);
                        }
                    }
                });
            });
        });


    </script>
</body>
</html>
