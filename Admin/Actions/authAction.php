<?php
session_start();
include "connect.php";

$errors = array(); 

if(isset($_POST['login_submit'])){
$userName = mysqli_real_escape_string($con,$_POST['userName']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$query = "SELECT * FROM admins WHERE emailId='$userName' AND password='$password'";
$result = mysqli_query($con, $query);

if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
    echo "success redirecting..";
$_SESSION['logedInAdminId'] =  $row['id'];
echo '<script>window.location.href = "index.php";</script>';
}
}else{
    echo "Username or password is incorrect";
}
}
}


if(isset($_POST['sub_admin_edit_pass'])){
$userId = mysqli_real_escape_string($con,$_POST['userId']);
$password = mysqli_real_escape_string($con,$_POST['password']);

    
$query = "UPDATE admins
SET password = '$password'
WHERE id='$userId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'>Password Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
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



if(isset($_POST['sub_admin'])){
$adminName = mysqli_real_escape_string($con,$_POST['adminName']);
$emailId = mysqli_real_escape_string($con,$_POST['emailId']);
$password = mysqli_real_escape_string($con,$_POST['password']);

$value = 1;


$queryyy = "SELECT * FROM admins WHERE emailId='$emailId'";
$resulttt = mysqli_query($con, $queryyy);
if($resulttt){
if(mysqli_num_rows($resulttt) > 0){
     echo "<p class='col-dng'>Email Already exist</p><br>";
     $value = 0;
}}
if($value == 1){
    
$query = "INSERT INTO admins ( adminName , emailId , password ) 
VALUES ('$adminName' , '$emailId' , '$password')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Register success!</p>"; }else{ echo "<p class='col-dng'>something wrong</p>"; }
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