<?php 
include"inc/header.php";
$msg = null;
if(isset($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];

    $query = "DELETE FROM users WHERE id = '$deleteId'";
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
<h3 class="tbl-head">All Users</h3>
<p><?php echo $msg;?></p>
<div style="width:100%; overflow-x:scroll">
<table id="customers">
<thead>
<tr>
<th>sl</th>
<th>Username</th>
<th>userId</th>
<th>Login</th>
<th>Email</th>
<th>Phone</th>
<th>Club</th>
<th>Sponsor</th>
<th>Joining Date</th>
<th>Status</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
$queryy = "SELECT * FROM users";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($rowwq = mysqli_fetch_array($resulyt)){
?>

<tr>
<td><?php echo $i; $i++;?></td>
<td><?php echo $rowwq['fullName']?></td>
<td><?php echo $rowwq['userId']?></td>
<td><a href="" class="btn btn-success">Login</a></td>
<td><?php echo $rowwq['email']?></td>
<td><?php echo $rowwq['mobileNumber']?></td>
<td>
<?php 
$clubId = $rowwq['clubId'];
$clubQry = "SELECT * FROM clubs WHERE id='$clubId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
    $clbFetch = mysqli_fetch_array($clubResult);
    echo $clbFetch['clubName'];
}
?>
</td>
<td><?php echo $rowwq['sopnsorsUserId']?></td>
<td><?php echo $rowwq['createTime']?></td>

<td><?php
 $statusPo = $rowwq['statusId'];
 if($statusPo == 0){
      $statusPosub = 1;
         echo "<span style='color:red'>Inactive<span>";
 }elseif($statusPo == 1){
      $statusPosub = 0;
        echo "<span style='color:green'>Active<span>";
 }else{
      $statusPosub = 1;
 }
 ?></td>

<td>
    <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $rowwq['userId']?>">
        <input type="hidden" name="statusId" value="<?php echo $statusPosub;?>">
        <input type="submit" class="btn btn-info" name="Status_change" value="Change Status">
    </form>
    
</td>
<td><a href="userEdit.php?id=<?php echo $rowwq['id']?>" class="btn btn-primary">Edit</a></td>
<td><a href="?deleteId=<?php echo $rowwq['id']?>" onclick="return confirm('Are you sure? to delete')" class="btn btn-danger">Delete</a></td>
<td><a href="userEdit.php?passEditId=<?php echo $rowwq['id']?>" class="btn btn-success">Edit Password</a></td>
</tr>
<?php } } } ?>
</tbody>
</table>
</div>
</section
<?php include"inc/footer.php"?>