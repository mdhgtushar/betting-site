<?php 
include"inc/header.php";
$msg = null;
if(isset($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];

    $query = "DELETE FROM admins WHERE id = '$deleteId'";
    $result = mysqli_query($con, $query);
    if($result){
        $msg =  "Delete Success";
    }else{
        $msg = "Delete Unsuccess";
    }
}


if(isset($_POST['Status_change'])){
$statusId = mysqli_real_escape_string($con,$_POST['statusId']);
$userId = mysqli_real_escape_string($con,$_POST['userId']);
$query = "UPDATE users
SET statusId = '$statusId'
WHERE userId='$userId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'> Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}
}
?>

<section id="main-content">
<h3 class="tbl-head">All Admins ||  <a href="add_admin.php" class="btn btn-info">Add Admin</a></h3>
<p><?php echo $msg;?></p>
<div style="width:100%; overflow-x:scroll">
<table id="customers">
<thead>
<tr>
<th>sl</th>
<th>Full Name</th>
<th>Email</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
$queryy = "SELECT * FROM admins";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>

<tr>
<td><?php echo $i; $i++;?></td>
<td><?php echo $roww['adminName']?></td>
<td><?php echo $roww['emailId']?></td>

<td><a href="edit_admin_pass.php?passEditId=<?php echo $roww['id']?>" class="btn btn-success">Edit Password</a></td>
<td><a href="?deleteId=<?php echo $roww['id']?>" onclick="return confirm('Are you sure? to delete')" class="btn btn-danger">Delete</a></td>
</tr>
<?php } } } ?>
</tbody>
</table>
</div>
</section
<?php include"inc/footer.php"?>