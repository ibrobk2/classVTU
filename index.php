<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="static/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>

<?php
include "config/server.php";


if($conn){
 
    echo '<script>
    swal("Good Job", "Connection established Successfully", "success")
    </script>';
 
}


?>