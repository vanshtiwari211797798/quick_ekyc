<?php 
 $hostname = "localhost";
 $username = "root";
 $password ="";
 $database = "u360061830_quickresult";
//  u360061830_quickresult
// Aadhaarprint@9090
// 9794181096

 $conn = mysqli_connect($hostname,$username,$password,$database);
 if(!$conn){
    echo "database Not Connected ";
 }
//  else{
//     echo "Database Connected";
//  }

?>