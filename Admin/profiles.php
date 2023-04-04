<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<div class="container mt-5 d-flex justify-content-center">
    <link rel="stylesheet" href="profiles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
    

    <table border=1px >
        <tr>
        <th>Id</th>
        <th>Add</th>
        <th>Operation</th>
        </tr>
        <?php
    include 'connection.php';
    $display = $conn->query("SELECT * FROM userinfo"); 
    while ($data = $display->fetch_assoc()){
    ?>
        
        <tr>
            <td><?php echo $data['Id']; ?></td>
            <td><div class="card p-3">

<div class="d-flex align-items-center">

    <div class="image">
<img src="../uploads/<?php echo $data['Image']; ?>" class="rounded" width="155" >
</div>

<div class="ml-3 w-100">
    
   <h4 class="mb-0 mt-0"><?php echo $data['Company']; ?></h4>
   <span><?php echo $data['Name']; ?></span>
     
    </div> 
   </div>
   <div class="button mt-2 d-flex flex-row align-items-center">
   </div>
 
        </td>
       

        
            <td>Delete</td>
        </tr>
    <?php 
    }
    ?>

    </table>

 
</body>
</html>