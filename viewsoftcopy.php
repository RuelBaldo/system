<?php
include_once("connect/connection.php");
$con = connection();

   $sql= "SELECT * FROM `softcopy`";
   $soft = $con->query($sql) or die ($con->error);
   $row = $soft->fetch_assoc();
   

   
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
          <div class="title">
             <h3 class="text-light">Sofrcopy Management </h3>
             </div><br>
             <div class="row justify-content-left">
            
           
             </div>
          <br>
          <div class="row">
               
              <table class="table table- text-light">
                 <tr>
                    <th>Cover</th>
                    <th>file</th>
                    <th colspan="2">Action</th>
                 </tr>
                 <?php do{?>
                 <tr>
                    <td><img src="uploads/<?php echo $row['img'];?>" alt=""style="border-radius:20px;width:10%;"></td>
                    <td><?php echo $row['file'];?></td>
                    <?php if($row == 0){?>
                      <h1 class="btn btn-light"> No Softcopy</h1>
                    <?php }else{?>  
                    <td><a  class="btn btn-danger"href="deletesoftcopy.php?id=<?php echo $row['soft_id'];?>">Delete</a></td>
                     <?php }?>
                 </tr>
                 <?php }while($row = $soft->fetch_assoc())?>
              </table>
              <a href="admin.php"class="btn btn-dark"> Go to MyAdmin</a>
          </div>
        </div>
</body>
</html>