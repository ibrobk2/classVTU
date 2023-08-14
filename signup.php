
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="static/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php
include "config/server.php";
include "controller/auth.php";



?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
            <h3 class="text-center text-primary">Register</h3>
            <?php 
            if(count($errors)>0): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </div>
            <?php endif;?>

                <form action="signup.php" method="post">
                    <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                    </div>

                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" value="<?php echo $cpassword; ?>">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="btn_signup" class="btn btn-primary form-control mt-3">Sign Up</button>
                    </div>

                    <p class="text-center">Already Have an Account? <a href="login.php">Login Here</a> </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>