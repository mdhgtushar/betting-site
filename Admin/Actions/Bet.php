<?php 
include'connect.php';



if(isset($_POST['sub_addQues'])){
$ques = mysqli_real_escape_string($con,$_POST['ques']);
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);

$query = "INSERT INTO bett_qus ( ques , gameId) 
VALUES ('$ques' , '$gameId')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Question added success!</p>"; }else{ echo "<p class='col-dng'>something wrong</p>"; }
}



if(isset($_POST['sub_addAns'])){
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);
$quesId = mysqli_real_escape_string($con,$_POST['quesId']);
$ansr = mysqli_real_escape_string($con,$_POST['ansr']);
$rate = mysqli_real_escape_string($con,$_POST['rate']);

$query = "INSERT INTO bett_ans ( answ , gameId, quesId, betRate) 
VALUES ('$ansr' , '$gameId', '$quesId','$rate')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Question added success!</p>"; }else{ echo "<p class='col-dng'>something wrong</p>"; }
}
?>