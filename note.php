<?php
include_once("connect/connection.php");
$con = connection();

if(isset($_POST['addnote'])){
    $book_id= $_SESSION['id'];
    $title = $_POST['t'];
    $cont = $_POST['c'];
    $img = $_SESSION['g'];
    
    
    $sql = "INSERT INTO `note`(`id`, `title`, `text`, `image`) 
    VALUES (' $book_id','$title',' $cont',' $img')";
    $con->query($sql) or die ($con->error);
    echo header("location:index.php?id=".$book_id);
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
                  <form action="" method="post">
                    <div class="form-group">
                    <h2 class="text-center text-dark">Note</h2>
                    <label for="">Title</label>
                    <input type="text"class="form-control" name="t" id="">
                    </div>
                    <div class="form-group">
                    <label for="">content</label>
                    <textarea name="c" class="form-control" id="" cols="30" rows="6"></textarea>
                    </div>
                   
                    <div class="form-group">
                        <div class="text-center">
                       <button type="submit"name="addnote"class="btn btn-dark">Add</button>
                        </div>
                        </div>

                  </form>
             </div>
        </div>
</body>
</html>