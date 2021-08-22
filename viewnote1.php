<?php
include_once("connect/connection.php");
$con = connection();
  $id = $_GET['id'];
  $sql = "SELECT * FROM `note` WHERE note_id ='$id'";
  $note =$con->query($sql) or die($con->error);
  $row = $note->fetch_assoc();
  
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
        <div class="container"><br><br>
            <div class="bg-secondary"style="padding:7px;border-radius:8px;">
            <h1 class="text-light text-center"style="font-family:monospace">My Note</h1>
            </div><br><br>
            <div class="row">
              <div class="col-4">
                  <h2 class="bg-warning text-center"style="font-family:monospace;padding:8px;border-radius:10px;"><?php echo $row['title'];?></h2>
              </div>
              <div class="col-8"style="background:darkslategray;
                  height:auto;padding:10px;
                  color:floralwhite;font-family:monospace;
                  border-radius:10px;
                  ">
                  <p  class=""><?php echo $row['text'];?></p><br><br>
                  <a href="viewnote.php" class="btn btn-light">Back</a>
              </div>
            
            </div>
                 
        </div>
</body>
</html>