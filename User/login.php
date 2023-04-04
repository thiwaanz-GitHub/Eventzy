<?php
session_start();
include_once '../Admin/connection.php';

if(isset($_POST['submit'])){

$email = $_POST['email'];
$password1 = $_POST['password1'];


$select = "SELECT * from userinfo where Email = '$email' && Password = '$password1' LIMIT 1";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result)==1){


    $data = mysqli_fetch_assoc($result);
    $_SESSION['Company_Name'] = $data['Company'];
    $_SESSION['ID'] = $data['Id'];
    $_SESSION['Email'] = $data['Email'];

  

    header('Location:user.php?');

   }else {

   echo 'Incorrect email or password';

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

<!-- <form method="post" class="fm">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name = "email" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name= "password1" class="form-control" id="">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Login</button>
  <a href="registration.php" class="btn btn-primary">Sign Up</a>

</form> -->




<div class="bd d-flex justify-content-center align-items-center">
    <form class="fm" method="post">
    <h1 class="htag">LOGIN</h1>
        <div class="mb-4">
            <input type="email" class="form-control ep" name = "email" placeholder="Email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-4">
            <input type="password" name= "password1" placeholder="Password" class="form-control ep" id="exampleInputPassword1" required>
        </div>
        <div>
            <button type="submit"  name="submit" class="btn btn-primary by mb-3">Login</button>
            
            <!-- </div>
            <div class="or m-2"> Or </div> -->
            <div>
            <a href="registration.php" class="btn btn-primary byy">Register</a>
            </div>
	</form>
	</div>
  </body>
</html>