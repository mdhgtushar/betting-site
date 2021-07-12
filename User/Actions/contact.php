<?php

session_start();
include "connect.php";




if(isset($_POST['contact_submit'])){
    $fullName = mysqli_real_escape_string($con,$_POST['fullName']);
     $email = mysqli_real_escape_string($con,$_POST['email']);
     $subject = mysqli_real_escape_string($con,$_POST['subject']);
     $message = mysqli_real_escape_string($con,$_POST['message']);
   
   $query = "INSERT INTO contacts ( fullName , email , subject , message) 
   VALUES ('$fullName' , '$email' , '$subject' , '$message')";
   $result = mysqli_query($con,$query);
   if($result){
       echo "Message successfully sended";
   }else{
       echo "contact wrong! message not sended";
   }
}
?>