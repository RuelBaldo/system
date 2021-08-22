<?php
include_once("connect/connection.php");
$con = connection();
  
   $id = $_GET['id'];
   $sql = "DELETE FROM `request` WHERE id='$id'";
   $con->query($sql) or die($con->error);
    echo header("location: admin.php");
   ?>