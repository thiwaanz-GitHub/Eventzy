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
</head>
<body>
<?php
if(isset($_GET['Id'])){
    $id = $_GET['Id'];

    $select = "SELECT * from userinfo where Id = '$id'";
    $result = mysqli_query($conn, $select);
    $ary = mysqli_fetch_assoc($result);

?>
<div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img src="../uploads/<?php echo $ary['Image']; ?>" width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    <!-- <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span> -->
                    <h5 class="mt-2 mb-0"><?php echo $ary['Company']; ?></h5>
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
                    <?php
                    // $get = "SELECT * from user_add";
                    // $info = mysqli_query($conn, $get);
                    // $add = mysqli_fetch_assoc($info);
                    ?>
                    <div class="buttons">  
                    <!-- <button class="btn btn-outline-primary px-4">Message</button> -->  
                    <a href="viewadd.php?Id=<?php echo $ary['Id'] ?>" class="btn btn-outline-primary px-4">View More</a>
                        
                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
</div>
<?php
}
?>
</body>
</html>