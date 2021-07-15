<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">All Transfar List</h3>
<div style="width:100%; overflow-x:scroll">
<table id="customers">  

<thead>
<tr>
<th>SL.</th>
<th>Send By</th>
<th>Ammount</th>
<th>Send to</th>
<th>Date</th>
<th>Note</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
$queryy = "SELECT * FROM transiction WHERE  statusId=3";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>



<tr>
<td><?php echo $i; $i++;?></td>
<td>Md Hg Tushar</td>
<td><?php echo $roww['ammount']?></td>
<td>md</td>
<td><?php echo $roww['subTime']?></td>
<td><a href="#">edit Note</a></td>
<td><a href="" class="btn btn-danger">Delete</a></td>
</tr>





<?php } } } ?>
</tbody>
</table>
</div>
</section
<?php include"inc/footer.php"?>