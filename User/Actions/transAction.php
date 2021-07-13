<?php
session_start();
include "connect.php";

$userID = $_SESSION['logedInUserId'];
$balanceNow = 0;



if(isset($_POST['deposit_submit'])){
$method = mysqli_real_escape_string($con,$_POST['method']);
$valueTo = mysqli_real_escape_string($con,$_POST['valueTo']);
$ammount = mysqli_real_escape_string($con,$_POST['ammount']);
$valueFrom = mysqli_real_escape_string($con,$_POST['valueFrom']);
$transId = mysqli_real_escape_string($con,$_POST['transId']);

$query = "INSERT INTO transiction (method, valueTo , ammount , valueFrom , trnNum, userId, statusId) 
VALUES ('$method','$valueTo' , '$ammount' , '$valueFrom' , '$transId', '$userID', '1')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Deposit submited.</p>"; }else{ echo "<p class='col-dng'>Something wrong</p>"; }
}


if(isset($_POST['withrow_submit'])){
    
$method = mysqli_real_escape_string($con,$_POST['method']);
$methodType = mysqli_real_escape_string($con,$_POST['methodType']);
$ammount = mysqli_real_escape_string($con,$_POST['ammount']);
$valueTo = mysqli_real_escape_string($con,$_POST['valueTo']);
if($ammount < $balanceNow){
$query = "INSERT INTO transiction (method, methodType , ammount , valueTo, userId, statusId) 
VALUES ('$method','$methodType' , '$ammount' , '$valueTo', '$userID', '2')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-dng'>Withdrow request submited. we will review it soon.</p>"; }else{ echo "<p class='col-dng'>Something wrong</p>"; }
}else{
    echo "<p class='col-dng'>You have not enough balance to Withdrow</p>";
}
}




if(isset($_POST['transfar_submit'])){
$username = mysqli_real_escape_string($con,$_POST['username']);
$note = mysqli_real_escape_string($con,$_POST['note']);
$ammount = mysqli_real_escape_string($con,$_POST['ammount']);
$password = mysqli_real_escape_string($con,$_POST['password']);




$queryn = "SELECT * FROM users WHERE id='$userID' AND password='$password'";
$resultn = mysqli_query($con, $queryn);

if($resultn){
if(mysqli_num_rows($resultn) > 0){
    
    
    
if($ammount < $balanceNow){
$query = "INSERT INTO transiction (trnsfUserName, note , ammount, userId, statusId) 
VALUES ('$username','$note' , '$ammount' , '$userID', '3')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Transfer Successful.</p>"; }else{ echo "<p class='col-dng'>something wrong</p>"; }
}else{
    echo "<p class='col-dng'>You have not enough balance to transfer</p>";
}

}else{
    echo "<p class='col-dng'>Password is incorrect</p>";
}
}


}

?>