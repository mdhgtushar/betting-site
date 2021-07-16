

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
$i = 1;
$queryy = "SELECT * FROM user_bits WHERE userid='$userId' AND statusId=1 ORDER BY id desc";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<tr>
<td><?php echo $i++;?></td>
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
?>
</td>
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
}
?>
</td>
<td><?php echo $roww['ammount']?></td>
<td>
    <?php 
$userId = $roww['ansId'];
$clubQry = "SELECT * FROM bett_ans WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
$clbFetch = mysqli_fetch_array($clubResult);
echo $clbFetch['betRate'];
}
?>
</td>
<td><?php echo $roww['winAmmount']?></td>
<td><?php echo $roww['note']?></td>
<td>
    <?php
    $winAm = $roww['winAmmount'] ;
    $winLos = $roww['winAmmount'] - $roww['ammount'];
    if($winAm == ""){
        echo "--";
    }elseif($winLos > 1){
        echo "<b style='color:green'>Win</b>";
    }elseif($winLos < 1){
        echo "<b style='color:red'>Lose</b>";
    }
     
    
    
    ?></td>
</tr>

<?php
}}}


?>
</table>

</div>