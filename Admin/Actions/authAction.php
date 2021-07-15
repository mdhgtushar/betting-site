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
    echo "success redirecting..";
$_SESSION['logedInUserId'] =  $row['id'];
echo '<script>window.location.href = "index.php";</script>';
}
}else{
    echo "Username or password is incorrect";
}
}
}


if(isset($_POST['cngPassSubmited'])){
$userID = $_SESSION['logedInUserId'];
$password = mysqli_real_escape_string($con,$_POST['passoword']);
$oldPass = mysqli_real_escape_string($con,$_POST['oldPass']);



$queryn = "SELECT * FROM users WHERE id='$userID' AND password='$oldPass'";
$resultn = mysqli_query($con, $queryn);

if($resultn){
if(mysqli_num_rows($resultn) > 0){
    
$query = "UPDATE users
SET password = '$password'
WHERE id='$userID' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'>Password Update successful</p>";
echo '<script>window.location.href = "logout.php";</script>';
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}


}else{
    echo "<p class='col-dng'>Old password is incorrect</p>";
}
}
}


if(isset($_POST['editPro_submit'])){
    
 $fullName = mysqli_real_escape_string($con,$_POST['fullName']);
 $mobileNumber = mysqli_real_escape_string($con,$_POST['mobileNumber']);
 $clubId = mysqli_real_escape_string($con,$_POST['clubId']);
 $email = mysqli_real_escape_string($con,$_POST['email']);


$userID = $_SESSION['logedInUserId'];
$query = "UPDATE users
SET fullName = '$fullName',
mobileNumber = '$mobileNumber',
clubId = '$clubId',
email = '$email'
WHERE id='$userID' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'>Profile Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
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

$value = 1;

if($password != $cpassword){
    echo "Password not Mached<br>";
    $value = 0;
}

$queryy = "SELECT * FROM users WHERE userId='$userName'";
$resultt = mysqli_query($con, $queryy);
if($resultt){
if(mysqli_num_rows($resultt) > 0){
     echo "User Name Already exist<br>";
     $value = 0;
}}



$queryyy = "SELECT * FROM users WHERE email='$email'";
$resulttt = mysqli_query($con, $queryyy);
if($resulttt){
if(mysqli_num_rows($resulttt) > 0){
     echo "Email Already exist<br>";
     $value = 0;
}}
if($value == 1){
    
$query = "INSERT INTO users ( fullName , mobileNumber , clubId , password , userId , email , sopnsorsUserId ) 
VALUES ('$fullName' , '$mobileNumber' , '$clubId' , '$password' , '$userName' , '$email', '$sponsorId')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-success'>Register success! Please Login</p>"; }else{ echo "something wrong"; }
}
}




if(isset($_POST['passEditSub'])){
$password = mysqli_real_escape_string($con,$_POST['password']);
$userId = mysqli_real_escape_string($con,$_POST['userId']);
$query = "UPDATE users
SET password = '$password'
WHERE id='$userId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'> Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}


}

?>