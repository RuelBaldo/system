<?php
include_once("connect/connection.php");
$con = connection();

if(isset($_POST['addbook'])){
    $file = $_FILES['f'];
    $title = $_POST['t'];
    $author = $_POST['a'];
    $file = $_POST['f'];
    $filename = $_FILES['f']['name'];
    $fileTmpName = $_FILES['f']['tmp_name'];
    $filesize = $_FILES['f']['size'];
    $fileerror = $_FILES['f']['error'];
    $filetype = $_FILES['f']['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf','jfif');

    if(in_array($fileActualExt,$allowed)){
        if($fileerror === 0){
            if($filesize < 10000000){
                 $fileNameNew = uniqid('', true).".".$fileActualExt;
                 $file_dir= 'uploads/'.$fileNameNew;
                 move_uploaded_file($fileTmpName,$file_dir);
                 $sql = "INSERT INTO `book`(`title`, `author`, `image`) 
                 VALUES ('$title',' $author','$fileNameNew')";
                 $con->query($sql) or die ($con->error);
                $_SESSION['msg'] = "Book has been added!";
               $_SESSION['msg_typ'] = "success";
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
<body class="bg-dark">
        <div class="container">
             <div class="row justify-content-center">
                  <form action="" method="post" enctype="multipart/form-data"class="text-light">
                    <div class="form-group">
                    <h2 class="text-center text-dark">Add Book</h2>
                    <label for="">Title</label>
                    <input type="text"class="form-control" name="t" id="">
                    </div>
                    <div class="form-group">
                    <label for="">author</label>
                    <input type="text"class="form-control" name="a" id="">
                    </div>
                    <div class="form-group">
                    <label for="">File</label>
                    <input type="file" class="form-control"name="f" id="">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                       <button type="submit"name="addbook"class="btn btn-primary">Add</button>
                        </div>
                        </div>

                  </form>
             </div>
        </div>
</body>
</html>