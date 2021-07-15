<?php
session_start();
include "connect.php";

$userID = $_SESSION['logedInUserId'];


if(isset($_SESSION['logedInUserId'])){

$userId = $_SESSION['logedInUserId'];
$ammount = 0;
$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=1 AND statusPo=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$ammountNew = $roww['ammount'];
$ammount = $ammount + $ammountNew;
}}}


$withdrow = 0;
$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=2 AND statusPo=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$ammountNew = $roww['ammount'];
$withdrow = $withdrow + $ammountNew;
}}}

$withdrowPnd = 0;
$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=2 AND statusPo=0";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$ammountNew = $roww['ammount'];
$withdrowPnd = $withdrowPnd + $ammountNew;
}}}

$transfarBal = 0;
$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=3";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$ammountNew = $roww['ammount'];
$transfarBal = $ammountNew + $transfarBal;
}}}




$transfarBalToMe = 0;
$query = "SELECT * FROM users WHERE id='$userId'";
$result = mysqli_query($con, $query);

if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

$userId =  $row['userId'];


$queryy = "SELECT * FROM transiction WHERE trnsfUserName='$userId' AND statusId=3";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $ammountNew =  $roww['ammount'];
$transfarBalToMe = $ammountNew + $transfarBalToMe;
}}}
}
}
}

$balanceNow = ($ammount + $transfarBalToMe) - ($withdrow + $withdrowPnd + $transfarBal);
}




if(isset($_POST['deposit_submit'])){
$method = mysqli_real_escape_string($con,$_POST['method']);
$ammount = mysqli_real_escape_string($con,$_POST['ammount']);
$valueFrom = mysqli_real_escape_string($con,$_POST['valueFrom']);
$transId = mysqli_real_escape_string($con,$_POST['transId']);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "betting_site";


$query = "INSERT INTO transiction ( method,  ammount , valueFrom , trnNum, userId, statusId ) 
VALUES ('$method', '$ammount' , '$valueFrom' , '$transId', '$userID', '1')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Deposit submited.</p>"; 
echo '<script>window.location.href = "statement.php?deposit";</script>';}else{ echo "<p class='col-dng'>Something wrong </p>"; }
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




$queryn = "SELECT * FROM users WHERE id='$userID' AND password='$password'";
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
    echo "<p class='col-dng'>Password is incorrect</p>";
}
}


}

?>