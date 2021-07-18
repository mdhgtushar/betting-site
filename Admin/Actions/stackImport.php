<?php
include "connect.php";

$stackId = $_GET['id'];
$gameId = $_GET['gameId'];
$queryy = "SELECT * FROM bett_qus WHERE stackId='$stackId'";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
    $question = $roww['ques'];
    $questionId = $roww['id'];


$sql = "INSERT INTO bett_qus (ques, gameId)
VALUES ('$question', '$gameId') ";
$result = mysqli_query($con,$sql);
if($result){
echo $quesId = mysqli_insert_id($con);
    echo "inserted Ques";
}else{
    echo "problem";
}


$queryya = "SELECT * FROM bett_ans WHERE quesId='$questionId'";
$resulyta = mysqli_query($con, $queryya);
if(mysqli_num_rows($resulyta) > 0){
while($roaww = mysqli_fetch_array($resulyta)){
 $answer = $roaww['answ'];
 $rate = $roaww['betRate'];

 
$sql = "INSERT INTO bett_ans (answ, gameId, quesId, betRate)
VALUES ('$answer', '$gameId','$quesId','$rate') ";
$result = mysqli_query($con,$sql);
if($result){
    echo "inserted ans";
}else{
    echo 'not inserted ans';
}

}}


} }



?>