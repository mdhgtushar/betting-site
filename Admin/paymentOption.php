<?php 
include"inc/header.php";

if(isset($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];

    $query = "DELETE FROM payment_method WHERE id = '$deleteId'";
    $result = mysqli_query($con, $query);
    if($result){
        $msg =  "Delete Success";
    }else{
        $msg = "Delete Unsuccess";
    }
}
?>
<section id="main-content">
<h3 class="tbl-head">All Payment Option ||  <a href="add_payment_option.php" class="btn btn-info">Add New</a></h3>
<div style="width:100%; overflow-x:scroll">
<table id="customers">  
<thead>
<tr>
<th>SL.</th>
<th>Payment Method</th>
<th>Payment Method Type</th>
<th>Payment Number</th>
<th>Action</th>
</tr>
</thead>
<tbody>


<?php 
$i = 1;
$queryy = "SELECT * FROM payment_method";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>

<tr>
<td><?php echo $i; $i++;?></td>
<td><?php echo $roww['methodName']?></td>
<td><?php echo $roww['methodType']?></td>
<td><?php echo $roww['number']?></td>
<td>
<a href="?deleteId=<?php echo $roww['id']?>" onclick="return confirm('Are you Sure to Delete?')" class="btn btn-danger">Delete</a>
</td>
</tr>

<?php } } } ?>



</tbody>

</table>
</div>
</section
<?php include"inc/footer.php"?>