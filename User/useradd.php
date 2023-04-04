<?php
session_start();
include_once '../Admin/connection.php';
 
function upload()
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


if(isset ($_SESSION['ID'])){
  
if(isset($_POST['submit'])){
  $id = $_SESSION['ID'];


  $title = $_POST['title'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $distric = $_POST['distric'];
  $image = upload();
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $url = $_POST['url'];

  $insert = "INSERT INTO user_add (`Company`,`Add_title`, `Category`, `Description`,`Distric`,`Image`, `Email`, `Contact`, `Url`)
            VALUES ('$id', '$title', '$category', '$description','$distric','$image','$email','$contact', '$url')";


  if ($conn->query($insert) === TRUE) {
    header('Location:user.php?');
  } else {
    echo "Error: " . $insert . "<br>" . $conn->error;
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
<form method="post" enctype="multipart/form-data" class="fmmm">
<h1 class="htag">Create Your Add</h1>
<div class="mb-2">
  <!-- <label for="" class="form-label">Add Title</label> -->
  <input type="text" name="title" placeholder="Add Title" class="form-control ep" id="" required>
</div>
<?php
              $query = "SELECT * FROM category_table";
              $result = $conn->query($query);
              if ($result->num_rows > 0) {
                  $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
              }
              ?>
              <div class="mb-2">
              <!-- <label for="" class="form-label">Category</label> -->
              <select name="category" class="form-control ep" required>
              
                  <option>Select Category</option>
                  <?php {
                      foreach ($options as $option) {
                  ?>
                      <option value="<?php echo $option['Id']; ?>"><?php echo $option['C_name']; ?> </option>
                  <?php
                      }
                  }
                  ?>
              </select>
              </div>

<div class="mb-2">
  <!-- <label for="" class="form-label">Description</label> -->
  <textarea rows="4" cols="50" class="form-control ep" placeholder="Description" name="description" required></textarea>
  <!-- <textarea  name="description" class="form-control ep" rows="4" cols="50" placeholder="Describe yourself here..."> -->
  </textarea>
  </div>

<div class="mb-2">
  <!-- <label for="" class="form-label">Distric</label> -->
  <select name="distric" class="form-control ep" id="" required>
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

<div class="mb-2">
  <!-- <label for="" class="form-label">Email</label> -->
  <input type="email"  name="email" placeholder="Email" class="form-control ep" id="" required>
</div>

<div class="mb-2">
  <!-- <label for="" class="form-label">Contact</label> -->
  <input type="number" name="contact" placeholder="Contact No" class="form-control ep" id="" required>
</div>

<div class="mb-2">
  <!-- <label for="" class="form-label">Image</label> -->
  <input type="file" name="image" class="form-control ep" placeholder="Image" id="" required>
</div>

<div class="mb-2">
  <!-- <label for="" class="form-label">Reference URL</label> -->
  <input type="url" name="url" class="form-control ep" placeholder="Reference Url" id="" required>
</div>


<button type="submit" name="submit" class="btn btn-primary by mb-1">Submit</button>
</form>
</div>
<?php
}

?>

</body>
</html>