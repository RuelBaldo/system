<?php
include_once("connect/connection.php");
$con = connection();
if(isset($_GET['id'])){
    $_SESSION['id'] = $_GET['id'];
}
if(!isset($_SESSION['id'])){
    echo header("index.php");
}

$sql ="SELECT * FROM `request`  ";
$rec = $con->query($sql) or die ($con->error);
$row = $rec->fetch_assoc();
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
        <div class="container">
           
                  <div class="title">
                      <h3 class="text-light text-center">My Admin</h3>
                  </div><br>
                  
                  
                  <div class="col-md-12">
                   <div class="row">
                     <div class="col-md-3">
                        <div class="list">
                           <a href="add.php" class="btn btn-dark"><span class="material-icons">add</span> Book</a><br>
                           <a href="deletebook.php"class="btn btn-dark"><span class="material-icons">delete</span> Book</a>
                           <a href="viewsoftcopy.php"class="btn btn-dark"><span class="material-icons">delete</span> Softcopy</a>
                           <a href="statistics.php"class="btn btn-dark"><span class="material-icons">dashboard</span> Statistics</a>
                           

                        </div>
                     
                     </div>
                    
                     <div class="col-md-9">
                    <div class="row justify-content-center">
                    <?php
                          if (isset($_SESSION['msg'])):?>
                         <div class="alert alert-<?=$_SESSION['msg_typ']?> alert-md">
                     <?php 
                                   echo $_SESSION['msg'];
                                  unset($_SESSION['msg']);
                      ?>
                        </div>
                         <?php endif ?>
                    </div>
                     
                     <a href="add.php"class="btn btn-info">Softcopy Request</a>
                    
                      <table class="table table-striped text-light">
                     
                          <tr>
                              <th>Id</th>
                              <th>BookName</th>
                              <th>Date</th>
                              <th colspan="2">Action</th>
                          </tr>
                          <?php do{?>
                          <tr>
                              <td><?php echo $row['id'];?></td>
                              <td><?php echo $row['name'];?></td>
                              <td><?php echo $row['date'];?></td>
                              <?php if($row == 0){?>
                          <div class="text-center">
                             <h1 style="margin-left:-10%;position:absolute;margin-top:20%;" class="btn btn-light">No Request</h1>
                             </div>
                          <?php }else{?>   
                              <td><a href="addsoft.php?id=<?php echo $row['id'];?>"class="btn btn-info">Send Copy</a>
                              <a href="removeadmin.php?id=<?php echo $row['id'];?>"class="btn btn-danger">Remove</a>
                             
                              </td>
                              <?php } ?>
                          </tr>
                          <?php }while($row = $rec->fetch_assoc())?>
                         
                      </table>

                     </div>
                   </div>
                  
                

                  
             </div>
        </div>
</body>
</html>