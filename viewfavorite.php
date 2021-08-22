<?php
include_once("connect/connection.php");
$con = connection();

  $sql = "SELECT * FROM `fav` ";
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
            <h1 class="text-light text-center"style="font-family:monospace">My Favorite Book</h1>
            </div><br><br>
             <div class="row justify-content-center"><br>
             <table class="table table-striped">
                      <tr>
                          <th>Title</th>
                          <th>Content</th>
                          <th colspan="2">Action</th>
                      </tr>
                      <?php do{?>                     
                        <tr>
                          <td style="width:200px;position:absolute;overflow:hidden;height:auto;"><img src="uploads/<?php echo $row['image'];?>" alt=""style="width:40%"></td>
                          <td><?php echo $row['name'];?></td>
                          <?php if($row == 0){?>
                          <div class="text-center">
                             <h1 style="margin-left:36%;position:absolute;margin-top:20%;" class="btn btn-light">No favorite</h1>
                             </div>
                          <?php }else{?>   
                          <td><a href="view.php?id=<?php echo $row['id'];?>"class="btn btn-info">View</a>
                          <a href="deletefav.php?id=<?php echo $row['fav_id'];?>"class="btn btn-danger">Delete</a>
                           <?php }?>
                        </td>
                      </tr>
                      <?php }while($row = $note->fetch_assoc())?>
                      
                  </table>
                  <a href="index.php" class="btn btn-dark">Go to home</a>
               
             </div>
        </div>
</body>
</html>