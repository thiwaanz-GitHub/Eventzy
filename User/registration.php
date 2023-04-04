<?php
include_once '../Admin/connection.php';
session_start();

function profile()
    {
        $uploads_dir = "uploads";
        $newFileName = "";
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES["image"]["tmp_name"];
            $fileName = $_FILES["image"]["name"];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            if (move_uploaded_file($tmpName, "../$uploads_dir/$newFileName")) {
                return $newFileName;
            }
        }
        return $newFileName;
    }

if(isset($_POST['submit'])){

    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $image = profile();
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contct = $_POST['contact'];
    $distric = $_POST['distric'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $select = "SELECT * from userinfo where Email = '$email' && Password = '$password1'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result)>0){
        $error[]= 'User Already Exist!';

    }else{
        if($password1 != $password2){
            $error[] = 'Password not matched!';

        }else{
            $insert = "INSERT INTO userinfo (Company,`Name`,`Image`,Email, Contact, Distric,`Password`,Confirm_Password)
            VALUES ('$company' , '$name', '$image', '$email', '$contct', '$distric','$password1','$password2')";

            mysqli_query($conn, $insert);
            header('location:login.php');

    }
    }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body class="body">

<div class="bd d-flex justify-content-center align-items-center">
<form method="post" enctype="multipart/form-data" class="fmm">
<h1 class="htag">Create Account</h1>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Company</label> -->
    <input type="text" name="company" class="form-control ep" name="company" placeholder="Company" aria-describedby="emailHelp" required>
  </div>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Full Name</label> -->
    <input type="text" class="form-control ep" placeholder="Full Name" name="name" required>
  </div>

  <div class="mb-3">
  <!-- <label for="" class="form-label">Image</label> -->
  <input type="file" name="image" placeholder="Image" class="form-control ep" required>
  </div>
  <div class="mb-3">
    <!-- <label for="" class="form-label">Email</label> -->
    <input type="email" name="email" placeholder="Email" class="form-control ep" required>
  </div>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Contact</label> -->
    <input type="number" name="contact" placeholder="Contact No" class="form-control ep" required>
  </div>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Distric</label> -->
    
    <select name="distric" id="" placeholder="Distric" class="form-control ep" required>
                    <option value="" disabled selected hidden>Choose Your Distric...</option>
                    <option value="Galle">Galle</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Puththalama">Puththalama</option>
                    <option value="Kaluthara">Kaluthara</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Kagalle">Kagalle</option>
                    <option value="Kurunagala">Kurunagala</option>
                    <option value="Kilinochchiya">Kilinochchiya</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Mathara">Mathara</option>
                    <option value="Hambanthota">Hambanthota</option>
                    <option value="Wauniyava">Wauniyava</option>
                    <option value="Mulathiw">Mulathiw</option>
                    <option value="Thoppigala">Thoppigala</option>
    </select>
  </div>
  <?php   
        if(isset($error)){
            foreach ($error as $error) {
                echo '<span class="error">'.$error.'</span>';
            };
        };
        ?>
  <div class="mb-3">
    <!-- <label for="" class="form-label">Password</label> -->
    <input type="password"  name="password1" placeholder="Password" class="form-control ep" required>
  </div>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Confirm Password</label> -->
    <input type="password" name="password2" placeholder="Confirm Password" class="form-control ep" required>
  </div>

  <button type="submit" name="submit" class="btn btn-primary by mb-2">Submit</button> 
  <a href="login.php" class="btn btn-primary by mb-2">Back to login</a>
</form>
</div>
</body>
</html>
