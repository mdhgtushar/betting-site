<?php 
include'connect.php';



if(isset($_POST['sub_addQues'])){
$ques = mysqli_real_escape_string($con,$_POST['ques']);
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);

$query = "INSERT INTO bett_qus ( ques , gameId, statusId) 
VALUES ('$ques' , '$gameId', '2')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Question added success!</p>"; }else{ echo "<p class='col-dng'>something wrong</p>"; }
}



if(isset($_POST['sub_addStockQues'])){
$ques = mysqli_real_escape_string($con,$_POST['ques']);
$stackId = mysqli_real_escape_string($con,$_POST['stackId']);

$query = "INSERT INTO bett_qus ( ques , stackId) 
VALUES ('$ques' , '$stackId')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Question added success!</p>";
echo '<script>window.location.href = "";</script>'; }else{ echo "<p class='col-dng'>something wrong</p>"; }
}


if(isset($_POST['sub_addAns'])){
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);
$quesId = mysqli_real_escape_string($con,$_POST['quesId']);
$ansr = mysqli_real_escape_string($con,$_POST['ansr']);
$rate = mysqli_real_escape_string($con,$_POST['rate']);

$query = "INSERT INTO bett_ans ( answ , gameId, quesId, betRate) 
VALUES ('$ansr' , '$gameId', '$quesId','$rate')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Answer added success!</p>"; }else{ echo "<p class='col-dng'>something wrong</p>"; }
}




if(isset($_POST['stackType'])){
$stackType = mysqli_real_escape_string($con,$_POST['stackType']);

$query = "INSERT INTO auto_stack ( stackType ) 
VALUES ('$stackType')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Stack added success!</p>"; 
echo '<script>window.location.href = "auto_stack.php";</script>'; }else{ echo "<p class='col-dng'>something wrong</p>"; }
}



if(isset($_POST['update_addAns'])){
 $editId = mysqli_real_escape_string($con,$_POST['editId']);
 $ansr = mysqli_real_escape_string($con,$_POST['ansr']);
 $rate = mysqli_real_escape_string($con,$_POST['rate']);

$query = "UPDATE bett_ans
SET answ = '$ansr',
betRate = '$rate'
WHERE id='$editId' ";


$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Answer Update success!</p>"; }else{ echo "<p class='col-dng'>Something wrong 1!</p>"; }

}

if(isset($_POST['sub_addStackAns'])){
$stackId = mysqli_real_escape_string($con,$_POST['stackId']);
$quesId = mysqli_real_escape_string($con,$_POST['quesId']);
$ansr = mysqli_real_escape_string($con,$_POST['ansr']);
$rate = mysqli_real_escape_string($con,$_POST['rate']);

$query = "INSERT INTO bett_ans ( answ , stackId, quesId, betRate) 
VALUES ('$ansr' , '$stackId', '$quesId','$rate')";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Answer added success!</p>"; }else{ echo "<p class='col-dng'>something wrong</p>"; }
}



?>