<?php
include_once("connect/connection.php");
$con = connection();

$s = $_POST['search'];
$sql = "SELECT * FROM book WHERE title  LIKE '%$s%'";
$book = $con->query($sql) or die ($con->error);
$row = $book->fetch_assoc();


   $sql= "SELECT * FROM `note`";
   $note = $con->query($sql) or die ($con->error);
   $r = $note->fetch_assoc();
   $t = mysqli_num_rows($note);
   
   $sql= "SELECT * FROM `fav`";
   $note = $con->query($sql) or die ($con->error);
   $r = $note->fetch_assoc();
   $y = mysqli_num_rows($note);
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
    <style type="text/css">
      
.lightbox{  
    position: absolute;
    top:10%;
    right:-100%;
    width:20%;
    height:100%;
    background-color: none;
    transition-duration:2s;
  }
  .lightbox:target{
    right: 30%;
  }
  .lightbox-content{
    
      margin-top: 480px;
      position: absolute;
    
  }
  .menu{
    position: absolute;
    color:floralwhite;
    margin-left:38%;
    
    margin-top:-50px;
    border-radius:50%;
    font-size:20px;
    background: darkslategray;
    padding:9px;
    
    text-decoration:none;
  }
  .menu:hover{
    color:darkslategray;
    background:rgb(252, 200, 156);
    border:1px solid darkslategray;
  }
  .close{
    position: absolute;
    color:white;
  }
    </style>
   
</head>
<body>
        <div class="container">
          <div class="title" style="background-color: rgb(19, 65, 65);
                 width:40%;
                 margin-top:3%;
                 border-top-right-radius: 10px;
                 border-bottom-right-radius: 10px;
                 border-top-left-radius: 10px;
                 border-bottom-left-radius: 10px;
                 padding: 10px;">
             <h3 class="text-light" style="font-family:monospace">My Library System </h3>
          </div>  
             <a href="#menu" class="menu"><i class="material-icons">menu</i></a>
          <div class="lightbox" id="menu">
             <a href="#" class="close">Close</a>
          <div class="content">
             <a href="viewnote.php"class="btn btn-dark ">Note <span class=" badge badge-danger"><?php echo $t;?></span></a> 
             <a href="viewfavorite.php"class="btn btn-dark">Favorite <span class=" badge badge-danger"><?php echo $y;?></span></a>
          </div>
          </div>
          <br>
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
             <div class="row justify-content-left">
            
            <form action="searchbook.php" method="post" style="margin-left:5%">

            <input type="text"style="
            border:2px solid darkslategray;
            background:rgb(252, 200, 156);
            border-radius:8px;
            outline:none;
            padding:8px;"name="search"> <button style="margin-top:10px;position:absolute;background:rgb(252, 200, 156);border:none;border-radius:50%;"type="submit" class="text-dark"><i class="material-icons"style="font-size:30px">search</i></button>
            </form>
             </div>
          <br>
          <div class="row">
               
              <br>
              <div class="col-md-12"><br>
              <?php 
                if(isset($row['id'])== 0){?>
                  <div class="row justify-content-center">
                  <h1 class="btn btn-light">No Result</h1>
                  </div>
              <?php }else{?>
                <?php do{?>
                    <a href="view.php?id=<?php echo $row['id'];?>">
                        <img src="uploads/<?php echo $row['image'];?>"style="margin-left:5%;width:15%;border-radius:15px;">
                    </a>
                  
                <?php }while($row = $book->fetch_assoc())?>
                <?php }?>
              </div>
          </div>
        </div>
</body>
</html>