<?php 

include "connect.php";



if(isset($_POST['sub_addClub'])){
$clubName = mysqli_real_escape_string($con,$_POST['clubName']);



 
$query = "INSERT INTO clubs ( clubName ) 
VALUES ('$clubName' )";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Club added success!</p>"; }else{ echo "<p class='col-dng'>something wrong</p>"; }

}