<?php
include_once("connect/connection.php");
$con = connection();

if(isset($_POST['addrequest'])){
    $bookname = $_SESSION['bname'];
    $userid = $_SESSION['id'];
    $sql = "INSERT INTO `request`(`id`, `name`) 
    VALUES ('$userid','$bookname')";
    $con->query($sql) or die ($con->error);
    echo header("location:index.php");
}
$id = $_SESSION['id'];
$sql= "SELECT * FROM `book` WHERE id= '$id'";
$book = $con->query($sql) or die ($con->error);
$row = $book->fetch_assoc();
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
                    <h2 class="text-center text-dark">Request Softcopy</h2>
                     <img src="uploads/<?php echo $row['image'];?>" alt=""style="margin-left:20%;border-radius:10px;width:70%">
                    </div>
                    
                    <div class="form-group">
                        <div class="text-center">
                       <button type="submit"name="addrequest"class="btn btn-primary">Send</button>
                        </div>
                        </div>

                  </form>
             </div>
        </div>
</body>
</html>