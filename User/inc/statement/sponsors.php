
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
<th>Sponsor name</th>
<th>Ammount</th>
<th>Time</th>
</tr>
<?php 

$userId = $_SESSION['logedInUserId'];
$query = "SELECT * FROM users WHERE id='$userId'";
$result = mysqli_query($con, $query);
$i=1;
if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
$userId =  $row['userId'];
$queryy = "SELECT * FROM users WHERE sopnsorsUserId='$userId'";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$userId = $roww['id'];
$queryya = "SELECT * FROM user_bits WHERE userId='$userId' AND statusId=1";
$resulyta = mysqli_query($con, $queryya);
$returnBet = 0;
if(mysqli_num_rows($resulyta) > 0){
while($rowwa = mysqli_fetch_array($resulyta)){
        
$userId = $rowwa['ansId'];
$clubQry = "SELECT * FROM bett_ans WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
$clbFetch = mysqli_fetch_array($clubResult);
    $winLos = $clbFetch['statusId'];
    if($winLos != 3){
        $returnBet =  ($rowwa['ammount']*0.02);
    }
}

?>
<tr>
<td><?php echo $i++;?></td>
<td><?php echo $roww['userId']?></td>
<td><?php echo $returnBet;?></td>
<td><?php echo $rowwa['subTime']?></td>
</tr>

<?php
}}} } }
}
}else{
echo"not found any sponsor!";
}
}

?>
</table>
    
</div>