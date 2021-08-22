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
   $sql= "SELECT * FROM `book` WHERE id= '$id'";
   $book = $con->query($sql) or die ($con->error);
   $row = $book->fetch_assoc();
   $_SESSION['g'] =$row['image'];
   $_SESSION['bname'] = $row['title'];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" 
    type="text/css" href="https://cdn.usebootstrap.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
    <title>My Library</title>
</head>
<body class="bg-dark">
        <div class="container">
        
            <div class="box">
            <img src="uploads/<?php echo $row['image'];?>" style="width:34%; border-radius:10px;">
            <h1 class="text-dark"style="position:absolute;margin-left:3%;margin-top:2%;font-family:monospace"><?php echo $row['title'];?></h1>
            <p class="text-dark"style="position:absolute;margin-left:3%;margin-top:9%;font-family:monospace">
            By: <?php echo $row['author'];?></p>
            <?php 
               $id= $_SESSION['id'];
               $sql = "SELECT * FROM `softcopy` WHERE id='$id'";
               $res = $con->query($sql) or die($con->error);
               $row = $res->fetch_assoc();
               $total = mysqli_num_rows($res);
               if(isset($row['id'])==0){
                $id = $_SESSION['id'];
                $sql= "SELECT * FROM `book` WHERE id= '$id'";
                $book = $con->query($sql) or die ($con->error);
                $row = $book->fetch_assoc();
                
                 echo "<br><br><br><br><br><br><br><br><br><br><br>
                  
                 <a class='btn btn-primary'href='request.php?id=".$row['id']."'>Request</a> 
                 <a class='btn btn-light'href='index.php'>Back</a>
                  ";
               }else{
                   $id = $_SESSION['id'];
                   $sql = "SELECT * FROM `softcopy` WHERE id='$id'";
                   $file = $con->query($sql) or die($con->error);
                   $ro = $file->fetch_assoc();
                   echo "<br><br><br><br><br><div class='bg-dark' style='display:inline-block;border-radius:7px;'>
                   <a class='btn btn-dark'href='uploads/".$ro['file']."'><span class='material-icons'>visibility</span>View</a><br><br>

                   <a class='btn btn-dark'href='note.php?id=".$row['id']."'><span class='material-icons'>add</span> Note</a><br><br>
                   <a class='btn btn-dark'href='favorite.php?id=".$row['id']."'><span class='material-icons'>add</span> Favorite</a></div>";
               }
             ?>
            </div>
            
        </div>
</body>
</html>