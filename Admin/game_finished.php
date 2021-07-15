<?php include"inc/header.php"?>
<section id="main-content">
<div style="width:100%; overflow-x:scroll">
<table id="customers">  
<thead>
<tr>
<th>Game Type</th>
<th>Game Name</th>
<th>Tournament Name</th>
<th>Game Day</th>
<th>Game Time</th>
<th>Betting Option</th>
<th>Status</th>
<th>Total Bet Tk</th>
<th>Total Return Tk</th>
<th>Admin Win</th>
<th>Admin Lose</th>
</tr>
</thead>
<tbody>


<?php 
$queryy = "SELECT * FROM games WHERE statusRan=2";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$gameid = $roww['id'];
?>

<tr>
<td>Cricket</td>
<td><?php echo $roww['countryOne'];?> Vs <?php echo $roww['countryTwo'];?></td>
<td><?php echo $roww['tornamName'];?></td>
<td><?php echo $roww['gameDay'];?></td>
<td><?php echo $roww['gameTime'];?></td>
<td><a href="" class="btn btn-primary">Betting Option</a></td>
<td>Game Finished</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
</tr>






<?php } } } ?>
</tbody>

</table>
</div>
</section
<?php include"inc/footer.php"?>