<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <style>
        #modal{
            background: rgba(0,0,0,0.7);
            position: fixed;
            left: 0;
            top:0;
            width: 100%;
            height: 100%;
            z-index: 100;
            display: none;
            }
        #modal-form{
            background: #fff;
            width: 30%;
            position: relative;
            top: 20%;
            left: calc(50% - 15%);
            padding: 15px;
            border-radius: 4px;
        }
        #modal-form h2{
            margin: 0 0 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #000;
        }
        #modal-form input[type = "text"]{
            width: 100%;
        }
    </style>
</head>

<body>
    <table>
        <td>

            first name <input type="text" id="fname">
            last name <input type="text" id="lname">
            <input type="button" id="save-button" value="save">

        </td>
        <div id="search-bar" style="margin:20px;">
            <label>Search :</label>
            <input type="text" id="search" autocomplete="off">
        </div>

        <tr>
            <td id="table-data">
            </td>
        </tr>
    </table>
    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <table cellpadding="10px" width="100%">
            </table>
            <div id="close-btn">X</div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        function loadTable() {
            $.ajax({
                url: "simpledata.php",
                type: "POST",
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        }
        loadTable();

        $("#save-button").on("click", function(e) {
            e.preventDefault();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            
            $.ajax({
                url: "insertData.php",
                type: "POST",
                data: {
                    fname: fname,
                    lname: lname
                },
                success: function(data) {
                    console.log("data", data);
                    if (data == 1) {
                        loadTable();
                    } else {
                        // alert("no data");
                    }
                }
            });
        });

        $(document).on("click", ".delete-btn", function() {
            var nameId = $(this).data("id");
            var ele = this;

            $.ajax({
                url: "Delete.php",
                type: "POST",
                data: {
                    id: nameId
                },
                success: function(data) {
                    if (data == 1) {
                        $(ele).closest("tr").fadeOut();
                    } else {
                        // alert("delete failed");
                    }
                }
            })
        })

        $(document).on("click", ".edit-btn", function(){
            $("#modal").show();
            // console.log(show());
            var nameId = $(this).data("id");

            $.ajax({
                url: "loadUpadate.php",
                type: "POST",
                data: {id: nameId },
                success: function(data) {
                    $("#modal-form table").html(data);
                }
            })
        });
        
        $("#close-btn").on("click",function(){
            $("#modal").hide();
        });

        $(document).on("click","#edit-submit", function(){
        var nameId = $("#edit-id").val();
        var fname = $("#edit-fname").val();
        var lname = $("#edit-lname").val();

            $.ajax({
                url: "updateForm.php",
                type : "POST",
                data : {id: nameId, fname: fname, lname: lname},
                success: function(data) {
                    if(data == 1){
                        $("#modal").hide();
                        loadTable();
                    }
                }

            })
        });


        $("#search").on("keyup",function(){
        var searchData = $(this).val();

            $.ajax({
                url: "searchData.php",
                type: "POST",
                data : {search: searchData },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        });

    });
    
    </script>
</body>

</html>