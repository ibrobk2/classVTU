<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
            <h3 class="text-center text-primary">Login</h3>
            <!-- <div class="alert alert-danger">
                <li>Username Field Required</li>
            </div> -->

                <form action="login.php" method="post">
                 

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                   

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                   

                    <div class="form-group">
                        <button type="submit" name="btn_login" class="btn btn-primary form-control mt-3">Login</button>
                    </div>

                    <p class="text-center">Don't Have an Account? <a href="signup.php">Register Here</a> </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>