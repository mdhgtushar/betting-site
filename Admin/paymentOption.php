<?php include"inc/header.php"?>
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
$queryy = "SELECT * FROM payment_method WHERE  statusId=2";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>

<tr>
<td>1</td>
<td><?php echo $roww['methodName']?></td>
<td><?php echo $roww['methodType']?></td>
<td><td><?php echo $roww['number']?></td></td>
<td>
<a href="#" class="btn btn-primary">Edit</a>
<a href="#" class="btn btn-danger">Delete</a>
</td>
</tr>

<?php } } } ?>



</tbody>

</table>
</div>
</section
<?php include"inc/footer.php"?>