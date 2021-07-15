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
<th>Bet Sell Price</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php 
$i = 1;
$queryy = "SELECT * FROM user_bits";
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
}
?>
</td>
<td><?php echo $roww['ammount']?></td>
<td>0</td>
<td>    0</td>
<td>    0</td>
<td>    0</td>
<td>    0</td>
<td>    <a href="" class="btn btn-danger">Cancel</a></td>
</tr>


<?php } } } ?>

</tbody>
</table>
</div>
</section
<?php include"inc/footer.php"?>