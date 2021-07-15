<?php 
include"inc/header.php";

if(isset($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];
    $query = "DELETE FROM clubs WHERE id = '$deleteId'";
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
$query = "UPDATE clubs
SET statusId = '$statusId'
WHERE id='$userId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'> Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}
}
?>
<section id="main-content">
    
    <h3 class="tbl-head">All Clubs ||  <a href="paymentOption.php" class="btn btn-info">Add Club</a></h3>
<div style="width:100%; overflow-x:scroll">
<table id="customers">  

<thead>
<tr>
<th>SL</th>
<th>Club Name</th>
<th>Club Owner</th>
<th>Action</th>
<th>Opening Date</th>
<th>Status</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>

</tr>
</thead>
<tbody>



<?php 
$i = 1;
$queryy = "SELECT * FROM clubs";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>

<tr>
<td><?php echo $i; $i++;?></td>
<td> <?php echo $roww['clubName']; ?></td>
<td>      <?php echo $roww['clubOwner']; ?></td>
<td><a href="" class="btn btn-primary">view club info</a></td>
<td><?php echo $roww['openDate']; ?></td>
<td>
    <?php
 $statusPo = $roww['statusId'];
 if($statusPo == 2){
         echo "<span style='color:red'>Inactive<span>";
         $statusPoNew = 1;
 }elseif($statusPo == 1){
        echo "<span style='color:green'>Active<span>";
         $statusPoNew = 2;
 }else{
         echo "<span style='color:red'>Inactive<span>";
          $statusPoNew = 1;
 }
 ?>
</td >
<td>
    <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $roww['id']?>">
        <input type="hidden" name="statusId" value="<?php echo  $statusPoNew;?>">
        <input type="submit" class="btn btn-success" name="Status_change" value="Change status">
    </form>
</td>
<td>

<a href="" class="btn btn-primary">Edit</a></td><td>
<a href="?deleteId=<?php echo $roww['id']?>" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a></td>
</tr>



<?php } } } ?>
</tbody>
</table>
</div>
</section
<?php include"inc/footer.php"?>