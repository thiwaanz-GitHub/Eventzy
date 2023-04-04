<?php
include '../Admin/connection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<table border=1px;>
    <tr>
    <th>Add ID</th>
    <th>Add Title</th>
    <th>Category</th>
    <th>Description</th>
    <th>Distric</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Image</th>
    <th>Options</th>
    </tr>

    <?php 
    if(isset($_GET['Id'])){
        $id= $_GET['Id'];
        // if(isset($_SESSION['Company'])){
            // $id = $_SESSION['Company'];
        
            $display = $conn->query("SELECT * FROM user_add WHERE Company = '$id'");
        
            while ($data = $display->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $data['Id']; ?></td>
                    <td><?php echo $data['Add_title']; ?></td>
                    <td><?php echo $data['Category']; ?></td>
                    <td><?php echo $data['Description']; ?></td>   
                    <td><?php echo $data['Distric']; ?></td>
                    <td><?php echo $data['Email']; ?></td>
                    <td><?php echo $data['Contact']; ?></td>
                    <td><?php echo $data['Image']; ?></td>
                    <td><a href="delete.php?Id=<?php echo $data["Id"]; ?>">Delete</a> /
                    <a href="update.php?Id=<?php echo $data["Id"]; ?>">Update</a> </td>
                </tr>
            <?php 
            }
        }
    // }
            ?>
        
            
        
        </table>
    

</body>
</html>