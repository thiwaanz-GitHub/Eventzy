<?php
include '../Admin/connection.php';
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

if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    $image = update();

    if(count($_POST)>0){

    $sql = "UPDATE user_add SET Add_title= '" . $_POST['title'] . "', Category= '" . $_POST['category'] . "', Description= '" . $_POST['description'] . "',
    Distric= '" . $_POST['distric'] . "', Email= '" . $_POST['email'] . "', Contact= '" . $_POST['contact'] . "', Url= '" . $_POST['url'] . "' 
    WHERE Id= '$id'";

    if ($conn->query($sql) === TRUE) {
      header('Location:user.php?');
    } else {
    echo "Error updating record";
    }
}


$result = mysqli_query($conn,"SELECT * FROM user_add WHERE Id = '$id'");
$row= mysqli_fetch_array($result);
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="login.css">
</head>
<body class="body">
<div class="bd d-flex justify-content-center align-items-center">
<form method="post" enctype="multipart/form-data" class="frn">
<h1 class="htag">Update Information</h1>
<div class="mb-3">
  <!-- <label for="" class="form-label">Add Title</label> -->
  <input type="text" name="title" placeholder="Add Your Title" value="<?php echo $row['Add_title']; ?>" class="form-control ep" id="">
</div>
<?php
              $query = "SELECT * FROM category_table";
              $result = $conn->query($query);
              if ($result->num_rows > 0) {
                  $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
              }
              ?>
              <div class="mb-3">
              <!-- <label for="" class="form-label">Category</label> -->
              <select name="category" placeholder="Choose Your Category" value="<?php echo $row['Category']; ?>" class="form-control ep">
              
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

<div class="mb-3">
  <!-- <label for="" class="form-label">Description</label> -->
  <textarea type="text" name="description" placeholder="Your Description" value="<?php echo $row['Description']; ?>" class="form-control ep" rows="4" cols="50">
  </textarea>
  </div>

<div class="mb-3">
  <!-- <label for="" class="form-label">Distric</label> -->
  <select name="distric" class="form-control ep" placeholder="Choose Your Distric" value="<?php echo $row['Distric']; ?>" >
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

<div class="mb-3">
  <!-- <label for="" class="form-label">Email</label> -->
  <input type="email" value="<?php echo $row['Email']; ?>" placeholder="Your Email"  name="email" class="form-control ep" id="">
</div>

<div class="mb-3">
  <!-- <label for="" class="form-label">Contact</label> -->
  <input type="number" value="<?php echo $row['Contact']; ?>" name="contact" placeholder="Contact No" class="form-control ep" id="">
</div>

<div class="mb-3">
  <!-- <label for="" class="form-label">Reference URL</label> -->
  <input type="url" name="url" value="<?php echo $row['Url']; ?>" placeholder="Your Reference Url" class="form-control ep" id="">
</div>

<button type="submit" name="update" class="btn btn-primary by">Update</button>
</form>
</div>

</body>
</html>
