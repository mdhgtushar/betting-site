<?php include"inc/header.php";
if(isset($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];

    $query = "DELETE FROM transiction WHERE id = '$deleteId'";
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
$query = "UPDATE transiction
SET statusPo = '$statusId'
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
<h3 class="tbl-head">All Deposit List</h3>
<div style="width:100%; overflow-x:scroll">
<table id="customers">  

<thead>
<tr>
<th>SL.</th>
<th>Request By</th>
<th>Ammount</th>
<th>Method</th>
<th>Deposited by</th>
<th>Transaction Id</th>
<th>Date</th>
<th>Note</th>
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
$queryy = "SELECT * FROM transiction WHERE  statusId=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>

<tr>
<td><?php echo $i; $i++;?></td>

<td>
       <?php 
$userId = $roww['userId'];
$clubQry = "SELECT * FROM users WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
    $clbFetch = mysqli_fetch_array($clubResult);
    echo $clbFetch['fullName'];
}
?>
</td>
<td><?php echo $roww['ammount']?></td>
<td><?php echo $roww['method']?></td>
<td><?php echo $roww['valueFrom']?></td>
<td><?php echo $roww['trnNum']?></td>
<td><?php echo $roww['subTime']?></td>
<td><a href="#">edit Note</a></td>
<td><?php
 $statusPo = $roww['statusPo'];
 if($statusPo == 0){
         echo "<span style='color:gray'>panding<span>";
 }elseif($statusPo == 1){
        echo "<span style='color:green'>Accepted<span>";
 }elseif($statusPo == 2){
        echo "<span style='color:red'>Canceled<span>";
 }
 ?></td>
<td>
    <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $roww['id']?>">
        <input type="hidden" name="statusId" value="1">
        <input type="submit" class="btn btn-success" name="Status_change" value="Accept">
    </form>
</td>
<td>
    <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $roww['id']?>">
        <input type="hidden" name="statusId" value="2">
        <input type="submit" class="btn btn-danger" name="Status_change" value="Reject">
    </form>
</td>
<td><a href="" class="btn btn-info">Edit</a></td>
<td><a href="?deleteId=<?php echo $roww['id']?>" onclick="return confirm('Are you Sure to Delete?')" class="btn btn-danger">Delete</a>
</td>

</tr>



<?php } } } ?>
</tbody>
</table>
</div>
</section
<?php include"inc/footer.php"?>