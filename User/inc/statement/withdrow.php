
<?php

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
</tr>
<?php 
$userId = $_SESSION['logedInUserId'];

$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=2 ORDER BY id desc";
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
<td><?php
 $statusPo = $roww['statusPo'];
 if($statusPo == 0){
         echo "<span style='color:gray'>panding<span>";

         ?>
         <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $roww['id']?>">
        <input type="hidden" name="statusId" value="2">
        <input type="submit" style="color:red" name="Status_change" value="Cancel">
    </form>
         
         <?php
 }elseif($statusPo == 1){
        echo "<span style='color:green'>Accepted<span>";
 }elseif($statusPo == 2){
        echo "<span style='color:red'>Canceled<span>";
 }
 
 
 ?>
 
</td>
<td><?php echo $roww['note']?></td>
<td><?php echo $roww['subTime']?></td>

</tr>

<?php
}}}


?>
</table>
    
</div>