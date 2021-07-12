<?php
session_start();
include "connect.php";

$errors = array(); 

if(isset($_POST['login_submit'])){
   $userName = mysqli_real_escape_string($con,$_POST['userName']);
   $password = mysqli_real_escape_string($con,$_POST['password']);
   $query = "SELECT * FROM users WHERE userId='$userName' AND password='$password'";
   $result = mysqli_query($con, $query);
   
    if($result){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
               $_SESSION['logedInUserId'] =  $row['id'];
               echo '<script>window.location.href = "../index.php";</script>';
            }
        }else{
        echo '<script>window.location.href = "../login.php?errorlog";</script>';
        array_push($errors, "Something wrong");
    }
    }
}


if(isset($_POST['register_submit'])){
    $fullName = mysqli_real_escape_string($con,$_POST['fullName']);
     $mobileNumber = mysqli_real_escape_string($con,$_POST['mobileNumber']);
     $clubId = mysqli_real_escape_string($con,$_POST['clubId']);
     $password = mysqli_real_escape_string($con,$_POST['password']);
     $userName = mysqli_real_escape_string($con,$_POST['userName']);
     $email = mysqli_real_escape_string($con,$_POST['email']);
     $sponsorId = mysqli_real_escape_string($con,$_POST['sponsorId']);
     $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
   
   $query = "INSERT INTO users ( fullName , mobileNumber , clubId , password , userId , email , sopnsorsUserId ) 
   VALUES ('$fullName' , '$mobileNumber' , '$clubId' , '$password' , '$userName' , '$email', '$sponsorId')";



   $result = mysqli_query($con,$query);
   if($result){
       echo "register success";
   }else{
       echo "something wrong";
   }
}


?>