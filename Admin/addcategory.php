<?php
include_once 'connection.php';
 
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
    
    if (isset($_POST['submit'])) {

        $image = upload();
        $category = $_POST['category'];

        $sql = "INSERT INTO category_table (`C_name`, `Image`)
            VALUES ('$category','$image')";

        mysqli_query($conn, $sql);
    }
   
    ?>
     <form action="" class="form" method="post" enctype="multipart/form-data">
        <h3> Add Categories </h3>

        <div>

            <label>Category:</label>
            <input type="text" name="category" id="" placeholder="Category Name.." required><br><br>

            <label>Image:</label>
            <input type="file" name="image" placeholder="Image.." required><br><br>

            <button class="" name="submit"> Save</button>
            <br>

        </div>


    </form> 
    </body>
    </html>