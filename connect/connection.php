<?php

function connection(){
    session_start();
    $lhost = "localhost";
    $uname = "root";
    $pwd   = "12345";
    $dname = "mylibrarysystem";
    
    $con = new mysqli( $lhost, $uname, $pwd, $dname);
    if($con->connect_error){
        echo $con->connect_error;
    }else{
        return $con;
        
        
    }

}