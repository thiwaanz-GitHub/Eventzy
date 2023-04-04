<?php
include_once '../Admin/connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Account</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body class="color">
<?php
if(isset($_SESSION['ID'])){
    $id = $_SESSION['ID'];

    $select = "SELECT * from userinfo where Id = '$id'";
    $result = mysqli_query($conn, $select);
    $ary = mysqli_fetch_assoc($result);

?>
<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid navcolor">
    <a class="navbar-brand" href="../Eventzy.php">Eventzy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="useradd.php?Id=<?php echo $_SESSION['ID']; ?> ">New Add</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="retriveadd.php?Id=<?php echo $_SESSION['ID']; ?>">My Add</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
        
        <a href="logout.php" class="btn btn-outline-success navbutton" id="navbutton">Logout</a>
      <!-- </form> -->
    </div>
  </div>
</nav>



            

                <div class="text-center mt-3">
                    <br>

                    <img src="../uploads/<?php echo $ary['Image']; ?>" width="100" class="rounded-circle">
                    
                </div>
                
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0 textcolor"><?php echo $ary['Company']; ?></h5>
                    <span><?php echo $ary['Name']; ?></span>
                    
                    <div class="px-4 mt-1">
                        <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    
                    </div>
                    
                     <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        <li><i class="fa fa-dribbble"></i></li>
                        <li><i class="fa fa-instagram"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>

                    </ul>                 
                    
                </div>
                <?php 
                $display = $conn->query("SELECT * FROM userinfo");
                $data = $display->fetch_assoc()
                ?>
                <a class="btn btn-outline-success" href="updateprofile.php?Id=<?php echo $_SESSION['ID'] ?>" >Edit Profile</a>
                
                
            </div>
            
        </div>
        
    </div>
    
</div>
<?php
}
?>
</body>
</html>