<?php
session_start();
include "connect.php";
include "balance.php";





$userID = $_SESSION['logedInUserId'];


if(isset($_POST['bit_submit'])){
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);
$quesId = mysqli_real_escape_string($con,$_POST['quesId']);
$answId = mysqli_real_escape_string($con,$_POST['answId']);
$ammount = mysqli_real_escape_string($con,$_POST['ammount']);
$userId = mysqli_real_escape_string($con,$_POST['userId']);


if($ammount < $balanceNow){
$query = "INSERT INTO user_bits ( gameId , quesId , ansId ,ammount, userId ) 
VALUES ('$gameId' , '$quesId' , '$answId' , '$ammount', '$userID' )";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>success!</p>"; 
echo '<script>setTimeout(function() {window.location.href = "index.php";}, 1000)</script>';

}else{ echo "<p class='col-dng'>Something wrong!</p>"; }
}else{
    echo "<p class='col-dng'>You have not enough balance to Place a bet</p>";
echo '<script>setTimeout(function() {window.location.href = "index.php";}, 1000)</script>';
}
}


if(isset($_POST['deposit_submit'])){
$method = mysqli_real_escape_string($con,$_POST['method']);
$ammount = mysqli_real_escape_string($con,$_POST['ammount']);
$valueFrom = mysqli_real_escape_string($con,$_POST['valueFrom']);
$transId = mysqli_real_escape_string($con,$_POST['transId']);



$query = "INSERT INTO transiction ( method,  ammount , valueFrom , trnNum, userId, statusId ) 
VALUES ('$method', '$ammount' , '$valueFrom' , '$transId', '$userID', '1')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Deposit submited.</p>";
echo '<script>window.location.href = "statement.php?deposit";</script>'; }else{ echo "<p class='col-dng'>Something wrong </p>"; }

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
if($result){ echo "<p class='col-suc'>Withdrow request submited. we will review it soon.</p>";
echo '<script>window.location.href = "profile.php?widthrow";</script>'; }else{ echo "<p class='col-dng'>Something wrong</p>"; }
}else{
    echo "<p class='col-dng'>You have not enough balance to Withdrow</p>";
}
}




if(isset($_POST['transfar_submit'])){
$username = mysqli_real_escape_string($con,$_POST['username']);
$note = mysqli_real_escape_string($con,$_POST['note']);
$ammount = mysqli_real_escape_string($con,$_POST['ammount']);
$password = mysqli_real_escape_string($con,$_POST['password']);




$queryn = "SELECT * FROM users WHERE id='$userID' AND password='$password' AND userId='$username'";
$resultn = mysqli_query($con, $queryn);

if($resultn){
if(mysqli_num_rows($resultn) > 0){
    
    
    
if($ammount < $balanceNow){
$query = "INSERT INTO transiction (trnsfUserName, note , ammount, userId, statusId) 
VALUES ('$username','$note' , '$ammount' , '$userID', '3')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Transfer Successful.</p>"; 
echo '<script>window.location.href = "profile.php?Transfar";</script>';
}else{ echo "<p class='col-dng'>something wrong</p>"; }
}else{
    echo "<p class='col-dng'>You have not enough balance to transfer</p>";
}

}else{
    echo "<p class='col-dng'>Password OR UserId not Matched</p>";
}
}


}

?>