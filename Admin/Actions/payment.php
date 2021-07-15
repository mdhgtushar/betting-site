<?php
include "connect.php";

if(isset($_POST['sub_paymentOpt'])){
$methodName = mysqli_real_escape_string($con,$_POST['methodName']);
$methodType = mysqli_real_escape_string($con,$_POST['methodType']);
$number = mysqli_real_escape_string($con,$_POST['number']);

$query = "INSERT INTO payment_method ( methodName, methodType , number) 
VALUES ('$methodName','$methodType' , '$number' )";
$result = mysqli_query($con,$query);
if($result){ echo "<p class='col-suc'>Deposit submited.</p>"; }else{ echo "<p class='col-dng'>Something wrong </p>"; }

}

?>