<?php 
include 'connect.php';

if(isset($_POST['editNote'])){
$id = mysqli_real_escape_string($con,$_POST['id']);
$note = mysqli_real_escape_string($con,$_POST['note']);

    
$query = "UPDATE transiction
SET note = '$note'
WHERE id='$id' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'>note Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}

}


?>