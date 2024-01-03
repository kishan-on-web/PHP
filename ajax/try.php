<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
    table {
        width: 100vh;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
        margin: 5px;
        text-align: center;
    }
    </style>
</head>

<body>
    <table>
        <tr>
            <td id="table-load">
                <input type="button" id="load-button" value="load button">
            </td>
        </tr>
        <tr id="table-data">

        </tr>

    </table>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#load-button").on("click", function(e) {
            $.ajax({
                url: "data.php",
                type: "GET",
                success: function(data) {
                    $("#table-data").html(data);
                }
            })
        })
    })
    </script>
</body>

</html>