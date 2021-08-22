<?php
include_once("connect/connection.php");
$con = connection();
$id= $_SESSION['id'];
$sql ="SELECT * FROM `book` WHERE id='$id'";
$rec = $con->query($sql) or die ($con->error);
$row = $rec->fetch_assoc();
$_SESSION['img'] = $row['image'];
$_SESSION['name'] = $row['title'];
if(isset($_POST['addf'])){
     $img=   $_SESSION['img'] ;
     $id =$_SESSION['id'];
     $bname = $_SESSION['name'];
     $sql ="INSERT INTO `fav`(`id`, `image`, `name`)
      VALUES (' $id','$img',' $bname')";
    $con->query($sql) or die($con->error);
    $_SESSION['msg'] ="Book has been added to favorite!";
    $_SESSION['msg_typ'] = "success";
    echo header("location:index.php");

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
                  <form action="" method="post"style="position:absolute;border-radius:10px;width:30%;"><br><br>
                     <img src="uploads/<?php echo $row['image'];?>"style="width:80%" alt="">
                      <button type="submit" name="addf" class="btn btn-dark">Add to Favorite</button>
                      </form>
                 </div>
</body>
</html>