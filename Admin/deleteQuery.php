<?php
include'Actions/connect.php';

if(isset($_GET['delete'])){
    $deleteId = $_GET['deleteId'];

    $query = "DELETE FROM admins WHERE id = '$deleteId'";
    $result = mysqli_query($con, $query);
    if($result){
        $msg =  "Delete Success";
    }else{
        $msg = "Delete Unsuccess";
    }
}



?>