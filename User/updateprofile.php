<?php
include '../Admin/connection.php';
session_start();
function update()
    {
        $uploads_dir = "uploads";
        $newFileName = "";
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES["image"]["tmp_name"];
            $fileName = $_FILES["image"]["name"];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            if (move_uploaded_file($tmpName, "../../$uploads_dir/$newFileName")) {
                return $newFileName;
            }
        }
        return $newFileName;
    }

if(isset($_SESSION['ID'])){
    $id=$_SESSION['ID'];
    $image = update();

    if(count($_POST)>0){

    $sql = "UPDATE userinfo SET Company= '" . $_POST['company'] . "', Name= '" . $_POST['name'] . "', Email= '" . $_POST['email'] . "',
    Contact= '" . $_POST['contact'] . "', Distric= '" . $_POST['distric'] . "', Password= '" . $_POST['password1'] . "', 
    Confirm_Password= '" . $_POST['password2'] . "' 
    WHERE Id= '$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location:user.php?');
    } else {
    echo "Error updating record";
    }
}


$result = mysqli_query($conn,"SELECT * FROM userinfo WHERE Id = '$id'");
$row= mysqli_fetch_array($result);
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
<form method="post" enctype="multipart/form-data" class="fmmmm">
<h1 class="htag">Update Info</h1>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Company</label> -->
    <input type="text" name="company" value="<?php echo $row['Company']; ?>" class="form-control ep" placeholder="Company" aria-describedby="emailHelp" required>
  </div>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Full Name</label> -->
    <input type="text" class="form-control ep" value="<?php echo $row['Name']; ?>" placeholder="Full Name" name="name" required>
  </div>

  <!-- <div class="mb-3"> -->
  <!-- <label for="" class="form-label">Image</label> -->
  <!-- <input type="file" name="image" placeholder="Image" class="form-control ep" required> -->
  <!-- </div> -->
  <div class="mb-3">
    <!-- <label for="" class="form-label">Email</label>  -->
    <input type="email" name="email" placeholder="Email" value="<?php echo $row['Email']; ?>" class="form-control ep" required>
  </div>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Contact</label> -->
    <input type="number" name="contact" placeholder="Contact No" value="<?php echo $row['Contact']; ?>" class="form-control ep" required>
  </div>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Distric</label> -->
    
    <select name="distric" id="" placeholder="Distric" class="form-control ep" value="<?php echo $row['Distric']; ?>" required>
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
    <input type="password"  name="password1" placeholder="Password" value="<?php echo $row['Password']; ?>" class="form-control ep" required>
  </div>

  <div class="mb-3">
    <!-- <label for="" class="form-label">Confirm Password</label> -->
    <input type="password" name="password2" placeholder="Confirm Password" value="<?php echo $row['Confirm_Password']; ?>" class="form-control ep" required>
  </div>

  <button type="submit" name="submit" class="btn btn-primary by mb-2" onclick="location.href='user.php'">Update</button>
  <!-- <a type="submit" name="submit" href="user.php" class="btn btn-primary by mb-2">Update </a> -->

</form>
</div>
</body>
</html>
