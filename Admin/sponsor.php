<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Sponsor List</h3>
<div style="width:100%; overflow-x:scroll">
<table id="customers">
<thead>
<tr>
<th>SL.</th>
<th>User Name</th>
<th>Sponsor Name</th>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
$queryy = "SELECT * FROM users WHERE sopnsorsUserId!='' ";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $roww['userId'];?></td>
<td><?php echo $roww['sopnsorsUserId'];?></td>
</tr>
<?php } } ?>

</tbody>
</table>
</div>
</section
<?php include"inc/footer.php"?>