<?php 
include "connect.php";
if(isset($_POST['sub_addGame'])){
$gameType = mysqli_real_escape_string($con,$_POST['gameType']);
$countryOne = mysqli_real_escape_string($con,$_POST['countryOne']);
$countryTwo = mysqli_real_escape_string($con,$_POST['countryTwo']);
$tornamName = mysqli_real_escape_string($con,$_POST['tornamName']);
$gameDay = mysqli_real_escape_string($con,$_POST['gameDay']);
$gameTime = mysqli_real_escape_string($con,$_POST['gameTime']);
$statusId = mysqli_real_escape_string($con,$_POST['statusId']);



$query = "INSERT INTO games ( gameType , countryOne , countryTwo ,tornamName, gameDay , gameTime , statusId  ) 
VALUES ('$gameType' , '$countryOne' , '$countryTwo' , '$tornamName', '$gameDay' , '$gameTime' , '$statusId')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Game added success!</p>"; }else{ echo "<p class='col-dng'>Something wrong!</p>"; }

}

if(isset($_POST['sub_editGame'])){
$gameType = mysqli_real_escape_string($con,$_POST['gameType']);
$countryOne = mysqli_real_escape_string($con,$_POST['countryOne']);
$countryTwo = mysqli_real_escape_string($con,$_POST['countryTwo']);
$tornamName = mysqli_real_escape_string($con,$_POST['tornamName']);
$gameDay = mysqli_real_escape_string($con,$_POST['gameDay']);
$gameTime = mysqli_real_escape_string($con,$_POST['gameTime']);
$statusId = mysqli_real_escape_string($con,$_POST['statusId']);
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);

$query = "UPDATE games
SET gameType = '$gameType',
countryOne = '$countryOne',
countryTwo = '$countryTwo',
tornamName = '$tornamName',
gameDay = '$gameDay',
gameTime = '$gameTime',
statusId = '$statusId'
WHERE id='$gameId' ";


$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Game Update success!</p>"; }else{ echo "<p class='col-dng'>Something wrong!</p>"; }

}

?>