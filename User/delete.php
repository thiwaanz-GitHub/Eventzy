<?php
include '../Admin/connection.php';

// sql to delete a record
if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    
    $delete=mysqli_query($conn, "DELETE from user_add WHERE Id='$id'");
  }
  
?>