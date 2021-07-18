

        <div style="width:100%; overflow-x:scroll">
<table id="customers">
<tr>
<th>SN.</th>
<th>From</th>
<th>To</th>
<th>Ammount</th>
<th>TrXID</th>
<th>Through</th>
<th>Status</th>
<th>Note</th>
<th>Requested at</th>
</tr>
<?php 
$userId = $_SESSION['logedInUserId'];
$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=1 ";
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
<td><?php echo $roww['note']?></td>
<td><?php echo $roww['subTime']?></td>
</tr>

<?php
}}}


?>
</table>
    
</div>