
<h3 class="h3style">Your transction (out)</h3>
<div style="width:100%; overflow-x:scroll">
<table id="customers">
<tr>
<th>SN.</th>
<th>Note</th>
<th>username</th>
<th>Ammount</th>
<th>Date and Time</th>
</tr>
<?php 
$userId = $_SESSION['logedInUserId'];

$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=3 ORDER BY id desc";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<tr>
<td>1</td>
<td><?php echo $roww['note']?></td>
<td><?php echo $roww['trnsfUserName']?></td>
<td><?php echo $roww['ammount']?></td>
<td><?php echo $roww['subTime']?></td>
</tr>
<?php
}}}
?>
</table>
</div>
<h3 class="h3style">Your transction (in)</h3>
<div style="width:100%; overflow-x:scroll">
<table id="customers">
<tr>
<th>SN.</th>
<th>Note</th>
<th>Sender Name</th>
<th>Ammount</th>
<th>Date and Time</th>
</tr>
<?php 
$userId = $_SESSION['logedInUserId'];


$query = "SELECT * FROM users WHERE id='$userId'";
$result = mysqli_query($con, $query);

if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

$userId =  $row['userId'];


$queryy = "SELECT * FROM transiction WHERE trnsfUserName='$userId' AND statusId=3 ORDER BY id desc";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<tr>
<td>1</td>
<td><?php echo $roww['note']?></td>
    
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
</td>
<td><?php echo $roww['ammount']?></td>
<td><?php echo $roww['subTime']?></td>
</tr>
<?php
}}}
}
}else{
echo"not found any user!";
}
}
?>
</table>
</div>