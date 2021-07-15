<?php
include "connect.php";

if(isset($_POST['bit_submit'])){
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);
$quesId = mysqli_real_escape_string($con,$_POST['quesId']);
$answId = mysqli_real_escape_string($con,$_POST['answId']);
$ammount = mysqli_real_escape_string($con,$_POST['ammount']);
$userId = mysqli_real_escape_string($con,$_POST['userId']);


$query = "INSERT INTO user_bits ( gameId , quesId , ansId ,ammount, userId ) 
VALUES ('$gameId' , '$quesId' , '$answId' , '$ammount', '$userId' )";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>success!</p>"; 
echo '<script>setTimeout(function() {window.location.href = "index.php";}, 3000)</script>';

}else{ echo "<p class='col-dng'>Something wrong!</p>"; }

}

?>