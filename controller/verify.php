<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="../static/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    
</body>
</html>
<?php
include "../config/server.php";


if(isset($_GET['btn_verify'])){
    $token = $_GET['token'];

    $sql = "SELECT * FROM users WHERE token=? AND verified=false";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();
    $rowCount = $result->num_rows;
    
    if($rowCount>0){
    $data = $result->fetch_assoc();

    $id = $data['id'];

    $query = "UPDATE users SET verified=true WHERE id=?";
    $stmts = $conn->prepare($query);
    $stmts->bind_param('i', $id);
    if($stmts->execute()){
        echo "<script>swal('Congrats', 'Email Verified Successfully..', 'success')
        .then(function(result){window.location='../dashboard.php'})</script>";
    }
    
}else{
        echo "<script>swal('Error', 'Invalid OTP entered', 'error')
        .then(function(result){window.location='./verify_email.php'})</script>";
    }

}



?>