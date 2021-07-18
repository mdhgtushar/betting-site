<?php include"inc/header.php"?>
<section id="main-content">
<div style="width:100%; overflow-x:scroll">
<table id="customers">  
<thead>
<tr>
<th>Sl.</th>
<th>Bet By</th>
<th>Date & Time</th>
<th>Match</th>
<th>Question</th>
<th>Answer</th>
<th>Ammount</th>
<th>Return Rate</th>
<th>Total Win</th>
<th>Return Amount(won) [0.02% fee]</th>
<th>Sponsor Fee (0.02%)</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php 

if(isset($_POST['Status_change'])){
$statusId = mysqli_real_escape_string($con,$_POST['statusId']);
$userId = mysqli_real_escape_string($con,$_POST['userId']);
$query = "UPDATE user_bits
SET statusId = '$statusId'
WHERE id='$userId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'> Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}
}

$i = 1;
$queryy = "SELECT * FROM user_bits ORDER BY id DESC";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$gameid = $roww['id'];
?>

<tr>
<td><?php echo $i; $i++;?></td>
<td>Bangladesh Vs India</td>
<td>T20 match</td>
<td>
<?php 
$userId = $roww['gameId'];
$clubQry = "SELECT * FROM games WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
$clbFetch = mysqli_fetch_array($clubResult);
echo $clbFetch['countryOne'];
echo " VS ";
echo $clbFetch['countryTwo'];
}
?></td>
<td>
    <?php 
$userId = $roww['quesId'];
$clubQry = "SELECT * FROM bett_qus WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
$clbFetch = mysqli_fetch_array($clubResult);
echo $clbFetch['ques'];
}
?>
</td>
<td>
    
<?php 
$userId = $roww['ansId'];
$clubQry = "SELECT * FROM bett_ans WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
$clbFetch = mysqli_fetch_array($clubResult);
echo $clbFetch['answ'];
$returnRate = $clbFetch['betRate'];
    $winLos = $clbFetch['statusId'];
}
?>
</td>
<td><?php echo $roww['ammount']?></td>
<td><?php echo $returnRate;?></td>
<td>   <?php echo $roww['ammount'] * $returnRate;?></td>
<td>     <?php echo ($roww['ammount'] * $returnRate) - (($roww['ammount'] * $returnRate)*0.02);?></td>
<td>    <?php echo ($roww['ammount'] * $returnRate)*0.02;?></td>
<td>
    <?php
  $statusId = $roww['statusId'];
if($statusId == 3){
        echo "<p style='color:red'>Canceled</p>";
}else{
    if($winLos == 1){
        echo "<p style='color:green'>Win</p>";
    }elseif($winLos == 2){
        echo "<p style='color:red'>Lose</p>";
    }elseif($winLos == 0){
        echo "<p style='color:gray'>Panding</p>";
    }else{
        echo "--";
    }
}
     
    
    
    ?></td>
<td>   
    <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $roww['id']?>">
        <input type="hidden" name="statusId" value="3">
        <input type="submit" class="btn btn-danger" name="Status_change" value="Cancel">
    </form>
</td>
</tr>


<?php } } } ?>

</tbody>
</table>
</div>
</section
<?php include"inc/footer.php"?>