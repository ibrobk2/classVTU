<?php

if(isset($_GET['btn_verify'])){
    $code = $_GET['code'];
}
  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Email Verification Page</title>
    <style>
        .container{
            margin-top: 120px;
            width: 350px;
        }

        .form-group{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center text-success">Verify Email</h2>
            <form action="verify.php" method="get">
                <div class="form-group">
                    <label for="otp">Enter OTP Code Below:</label>
                    <input type="text" class="form-control" placeholder="OTP Code: Example 234528" name="token">

                </div>
                <div class="form-group">
                    <button name="btn_verify" type="submit" class="btn btn-success form-control">Verify Email</button>
                </div>
            </form>
    </div>
  
</body>
</html>
