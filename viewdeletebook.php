<?php
include_once("connect/connection.php");
$con = connection();
    
   $sql= "SELECT * FROM `book` ";
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
    <title>My Library</title>
   
</head>
<body class="bg-dark">
        <div class="container">
          <div class="title bg-warning">
             <h3 class="text-dark">Booklist</h3>
             </div><br>
             <a href="admin.php"class="btn btn-dark">Go to MyAdmin</a>
          <div class="row">
               
              <br>
              <div class="col-md-12"><br>
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
               <table class="table table-striped text-light">
                 <tr>
                     <th>ID</th>
                     <th>COVER</th>
                     <th>BOOKNAME</th>
                     <th>AUTHOR</th>
                     <th colspan="2">ACTION</th>

                 </tr>
                 <?php do{?>
                 <tr>
                      <td><?php echo $row['id'];?></td>
                      <td><img src="uploads/<?php echo $row['image'];?>" alt=""style="width:10%"class="rounded"></td>
                      <td><?php echo $row['title'];?></td>
                      <td><?php echo $row['author'];?></td>
                      <td>
                      <?php if(isset($row)==0){?>
                      <p class="btn btn-light">No Book</p>
                      <?php }else{?>
                      <a href="deletebook.php?id=<?php echo $row['id'];?>"class="btn btn-danger">Delete</a></td>
                      <?php } ?>
                 </tr>
                 <?php }while($row = $book->fetch_assoc())?>
               </table>
              </div>
          </div>
        </div>
</body>
</html>