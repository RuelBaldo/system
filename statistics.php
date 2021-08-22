<?php
include_once("connect/connection.php");
$con = connection();

   $sql ="SELECT * FROM `request`  ";
   $rec = $con->query($sql) or die ($con->error);
   $row = $rec->fetch_assoc();
   $t = mysqli_num_rows($rec);

   $sql= "SELECT * FROM `book` ";
   $book = $con->query($sql) or die ($con->error);
   $row = $book->fetch_assoc();
   $o = mysqli_num_rows($book);

  
   $sql= "SELECT * FROM `softcopy` ";
   $soft = $con->query($sql) or die ($con->error);
   $ro=  $soft->fetch_assoc();
   $l = mysqli_num_rows($soft);
   
   

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>My Library</title>
    <style type="text/css">
        .list{
             border: 1px solid floralwhite;
             height:450px;
             border-radius:10px;
            
        }
    </style>
</head>
<body class="bg-dark">
        <div class="container-fliud">
           
                  <div class="title">
                      <h3 class="text-light text-center">Statistics</h3>
                  </div><br>
                <div class="container-fluid"> 
            <div class="row">
              <div class="col-md-3">
                <div class="bg-success" style="border-radius:10px;height:200px;">
                <div class="text-center">
                  <img src="book.png" alt=""style="width:60%;position:absolute;margin-top:-30px;margin-left:-30px;">
                  <i class="material-icons "style="color:floralwhite;font-size:70px;">lueja</i><br><h3 style="font-family:monospace;color:floralwhite;">BOOKS</h3><br>
                  </div>
                  <h3 class="btn btn-dark text-center"style="color:floralwhite;font-family:monospace;">Total: <?php echo $o;?>  <a href="viewdeletebook.php"class="text-light"><span class="material-icons">visibility</span></a></h3>
               
                </div>
              </div>
              <div class="col-md-3">
                <div class="bg-primary" style="border-radius:10px;height:200px;">
                <div class="text-center">
                <img src="req.png" alt=""style="width:60%;position:absolute;margin-top:-30px;margin-left:-30px;">
                  <i class="material-icons "style="color:floralwhite;font-size:70px;">ankff</i><br><h3 style="font-family:monospace;color:floralwhite;">REQUEST</h3>
                  </div><br>
                  <h3 class="btn btn-dark text-center"style="color:floralwhite;font-family:monospace;">Total: <?php echo $t;?> <a href="admin.php"class="text-light"><span class="material-icons">visibility</span></a></h3>
               
                </div>
              </div>
              <div class="col-md-3">
              <div class="bg-info" style="border-radius:10px;height:200px;">
                <div class="text-center">
                <img src="pen.png" alt=""style="width:90%;position:absolute;margin-top:-80px;margin-left:-80px;">
                  <i class="material-icons "style="color:floralwhite;font-size:70px;">kamfkfn</i><br><h3 style="font-family:monospace;color:floralwhite;">PENDING</h3>
                  </div><br>
                  <?php 
                 
                  $sql= "SELECT * FROM `request`";
                  $book = $con->query($sql) or die ($con->error);
                  $row = $book->fetch_assoc();
                  $btotal = mysqli_num_rows($book);
                  $sql= "SELECT * FROM `softcopy` ";
                   $soft = $con->query($sql) or die ($con->error);
                 $ro=  $soft->fetch_assoc();
                $softtotal = mysqli_num_rows($soft);

                   $pending = $btotal -  $softtotal;
                  ?>
                    
                  <h3 class="btn btn-dark text-center"style="color:floralwhite;font-family:monospace;">Total: <?php echo $btotal;?> <a href="admin.php"class="text-light"><span class="material-icons">visibility</span></a></h3>
               
                </div>
                </div>
              <div class="col-md-3">
                <div class="bg-warning" style="border-radius:10px;height:200px;">
                <div class="text-center">
                <img src="send.png" alt=""style="width:60%;position:absolute;margin-top:-30px;margin-left:-30px;">
                  <i class="material-icons "style="color:floralwhite;font-size:70px;">recieve</i><h3 style="font-family:monospace;color:floralwhite;">SEND</h3><br>
                  </div>  
                  <h3 class="btn btn-dark text-center"style="color:floralwhite;font-family:monospace;">Total: <?php echo $l;?> <a href="viewsoftcopy.php"class="text-light"><span class="material-icons">visibility</span></a></h3>
               
                </div>
                
                
                <br>
                <a href="admin.php" class="btn btn-dark">Go to MyAdmin</a>

              </div>
            </div>      
                 
             
        </div>
</body>
</html>