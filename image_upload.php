<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <style>
        .container{
            margin-top: 120px;
            width: 450px;
        }
    </style>
</head>
<body>
    <?php include "upload.php"; ?>
    <div class="container">
<?php 
if(count($errors)>0){ ?>
    <div class="alert alert-danger">
        <?php 
        foreach($errors as $err){ ?>
            <li><?php echo $err; ?></li>
       <?php  } ?>
    </div>
<?php } ?>



        <h3 class="text-center">Image Upload</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" class="form-control" name="image">
            </div>

            <div class="mb-3">
                <button class="btn btn-secondary" name="btn_upload">Upload</button>
            </div>
        </form>
    </div>
</body>
</html>