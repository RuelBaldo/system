<?php
include_once("connect/connection.php");
$con = connection();
if(isset($_GET['id'])){
    $_SESSION['id'] = $_GET['id'];
}
if(!isset($_SESSION['id'])){
    echo header("index.php");
}
   $id = $_SESSION['id'];
   $sql= "SELECT * FROM `book` WHERE id='$id'";
   $book = $con->query($sql) or die ($con->error);
   $row = $book->fetch_assoc();
   $_SESSION['img'] = $row['image'];
   
if(isset($_POST['addsoft'])){
    $file = $_FILES['f'];
    $img = $_SESSION['img'];
    $book_id = $_SESSION['id'];

    $filename = $_FILES['f']['name'];
    $fileTmpName = $_FILES['f']['tmp_name'];
    $filesize = $_FILES['f']['size'];
    $fileerror = $_FILES['f']['error'];
    $filetype = $_FILES['f']['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('docx','jpeg','png','pdf','jfif');

    if(in_array($fileActualExt,$allowed)){
        if($fileerror === 0){
            if($filesize < 10000000){
                 $fileNameNew = uniqid('', true).".".$fileActualExt;
                 $file_dir= 'uploads/'.$fileNameNew;
                 move_uploaded_file($fileTmpName,$file_dir);
                 $sql = "INSERT INTO `softcopy`(`id`,`img`,`file`) 
                 VALUES ('$book_id','$img','$fileNameNew')";
                 $con->query($sql) or die ($con->error);
                
                 $id = $_SESSION['id'];
                $sql = "DELETE FROM `request` WHERE id='$id'";
                $con->query($sql) or die($con->error);
                
                 echo header("location:admin.php");
                 
            }else{
                echo "Your file is to big ";
            }

        }else{
            echo "There was an error ";
        }
    }else{
        echo "Error upload";
    }
}
    
   
    
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" 
    type="text/css" href="https://cdn.usebootstrap.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>My Library</title>
</head>
<body>
        <div class="container">
             <div class="row justify-content-center">
                  <form action="" method="post"enctype="multipart/form-data">
                    <div class="form-group">
                    <h2 class="text-center text-dark">Send Softcopy</h2>
                    
                    <label for="">File</label>
                    <input type="file" class="form-control"name="f" id="">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                       <button type="submit"name="addsoft"class="btn btn-primary">Add</button>
                        </div>
                        </div>

                  </form>
             </div>
        </div>
</body>
</html>