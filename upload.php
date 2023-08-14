<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="static/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    
</body>
</html>
<?php 
$conn = new mysqli("localhost", "root", "", "smart");
$errors = array();

if(isset($_POST['btn_upload'])){
     $image = $_FILES['image'];

     $image_name = $image['name'];
     $image_type = $image['type'];
     $image_size = $image['size'];
     $image_error = $image['error'];
     $tmp_name = $image['tmp_name'];

     $allowed_exts = array("jpg", "png", "jpeg", "gif", "svg");
     $ext = pathinfo($image_name, PATHINFO_EXTENSION);

     $ext_lc = strtolower($ext);

     if(!in_array($ext_lc, $allowed_exts)){
        array_push($errors, "invalid image type");
     }

     if($image_size>100000){
        array_push($errors, "You can only upload an image less than 2MB");
     }

     if(count($errors)===0){
        $new_image_name = substr(uniqid("IMG-"), 1,10).".".$ext_lc;



     $sql = "INSERT INTO images (image_name) VALUES (?)";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param('s', $new_image_name);

     if($stmt->execute()){
       $res = move_uploaded_file($tmp_name, "uploads/".$new_image_name);
       if($res){
        echo "<script>
            swal('Success', 'Image Uploaded Successfully', 'success')
            .then(function(result){
                if(result){
                    window.location = 'image_upload.php'
                }
            });
        </script>";
       }
     }
    }
     
}