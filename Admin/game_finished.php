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
<th>Admin Win/Lose</th>
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
<td><a href="bit_option.php?id=<?php echo $roww['id'];?>"  class="btn btn-primary">Betting Option</a></td>
<td>Game Finished</td>
<td>
    <?php
    
$totalBet = 0;
$queryy = "SELECT * FROM user_bits WHERE gameId='$gameid' AND statusId!=3";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$ammountNew = $roww['ammount'];
$totalBet = $totalBet + $ammountNew;
}}}
echo $totalBet;
    ?>
</td>
<td>

 <?php
    
$returnBet = 0;
$queryy = "SELECT * FROM user_bits WHERE gameId='$gameid' AND statusId=1";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$userId = $roww['ansId'];
$clubQry = "SELECT * FROM bett_ans WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
$clbFetch = mysqli_fetch_array($clubResult);
    $winLos = $clbFetch['statusId'];
    if($winLos == 1){
        $returnBet = $returnBet + ($roww['ammount'] * $clbFetch['betRate']);
    }
}

}}
echo $returnBet;
?>

</td>
<td><?php echo ($totalBet - $returnBet);?></td>
</tr>






<?php } } } ?>
</tbody>

</table>
</div>
</section
<?php include"inc/footer.php"?>