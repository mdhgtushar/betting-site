

        <div style="width:100%; overflow-x:scroll">
<table id="customers">
<tr>
<th>SN.</th>
<th>To</th>
<th>Ammount</th>
<th>Through</th>
<th>Status</th>
<th>Note</th>
<th>Requested at</th>
<th>Accepted/Canceled at</th>
<th>Cancel</th>
</tr>
<?php 
$userId = $_SESSION['logedInUserId'];

$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=2";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<tr>
<td>1</td>
<td><?php echo $roww['valueTo']?></td>
<td><?php echo $roww['ammount']?></td>
<td><?php echo $roww['method']?></td>
<td><?php echo $roww['statusId']?></td>
<td><?php echo $roww['note']?></td>
<td><?php echo $roww['subTime']?></td>
<td><?php echo $roww['subTime']?></td>
<td><a href="">Cancel</a></td>
</tr>

<?php
}}}


?>
</table>
    
</div>