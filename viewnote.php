<?php
include_once("connect/connection.php");
$con = connection();

  $sql = "SELECT * FROM `note` ";
  $note =$con->query($sql) or die($con->error);
  $row = $note->fetch_assoc();

  $id = $_SESSION['id'];
  $sql= "SELECT * FROM `book` WHERE id= '$id'";
  $book = $con->query($sql) or die ($con->error);
  $ro = $book->fetch_assoc();
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
             <div class="row justify-content-center">
             
                  <table class="table table-striped">
                      <tr>
                        
                          <th>Title</th>
                          <th>Content</th>
                          <th colspan="2">Action</th>
                      </tr>
                      <?php do{?>                     
                        <tr>

                          <td><?php echo $row['title'];?></td>
                          <td style="position:absolute;
                          overflow:hidden;
                          height:40px;width:200px;
                          "><?php echo $row['text'];?></td>
                          <?php if($row == 0){?>
                          <div class="text-center">
                             <h1 style="margin-left:-10%;position:absolute;margin-top:20%;" class="btn btn-light">No Note</h1>
                            <br>
                             </div>
                          <?php }else{?>   
                          <td><a href="viewnote1.php?id=<?php echo $row['note_id'];?>"class="btn btn-info">View</a>
                          <a href="deletenote.php?id=<?php echo $row['note_id'];?>"class="btn btn-danger">Remove</a>
                          
                          <?php }?>
                          <a href="index.php" class="btn btn-dark">Go to home</a>
                        </td>
                      </tr>
                      <?php }while($row = $note->fetch_assoc())?>
                     
                  </table>

                  
             </div>
        </div>
</body>
</html>