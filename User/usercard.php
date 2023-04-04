<?php

$conn = mysqli_connect('localhost', 'root','','eventzy');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="grid.css">
</head>
<body>
<div class="grid-container">
 <?php
  
  if(isset($_GET['Id'])){
    $category = $_GET['Id'];

  $card = $conn->query("SELECT * FROM user_add WHERE Category = '$category'");
  
  while ($array = $card->fetch_assoc())
  {
  ?>
<div class="card mt-4" style="width: 18rem;">
  <img src="../uploads/<?php echo $array['Image']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $array['Add_title']; ?></h5>
    <p class="card-text"> <?php echo $array['Description']; ?> </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $array['Distric']; ?></li>
    <li class="list-group-item"><?php echo $array['Contact']; ?></li>
    <li class="list-group-item"><?php echo $array['Email']; ?></li>
  </ul>
  <div class="card-body">
    <a href="<?php echo $array['Url']; ?>" target="_blank" class="card-link">Reference Link</a>
    <a href="viewprofile.php?Id=<?php echo $array['Company']; ?>" class="card-link">View Profile</a>
  </div>
</div>
<?php
  }
}
?>
  </div>
 

</body>
</html>