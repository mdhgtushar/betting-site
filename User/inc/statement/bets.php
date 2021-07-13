

        <div style="width:100%; overflow-x:scroll">
<table id="customers">
<tr>
<th>SN.</th>
<th>Match</th>
<th>Question</th>
<th>Answer</th>
<th>Ammount</th>
<th>Rate</th>
<th>Ammount Won</th>
<th>Notes</th>
<th>Win/Lose</th>
</tr>
<?php 
$userId = $_SESSION['logedInUserId'];

$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=1";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<tr>
<td>1</td>
<td><?php echo $roww['valueFrom']?></td>
<td><?php echo $roww['valueTo']?></td>
<td><?php echo $roww['ammount']?></td>
<td><?php echo $roww['trnNum']?></td>
<td><?php echo $roww['method']?></td>
<td><?php echo $roww['statusId']?></td>
<td><?php echo $roww['note']?></td>
<td><?php echo $roww['subTime']?></td>
</tr>

<?php
}}}


?>
</table>
    
</div>