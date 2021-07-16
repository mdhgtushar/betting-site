<?php include"inc/header.php"?>
<section id="main-content">


<?php 
if(isset($_GET['id'])){


if(isset($_GET['quesDel'])){
    $quesDel = $_GET['quesDel'];

    $query = "DELETE FROM bett_qus WHERE id = '$quesDel'";
    $result = mysqli_query($con, $query);
    if($result){
        $msg =  "Delete Success";
    }else{
        $msg = "Delete Unsuccess";
    }
}





    $gameIda = $_GET['id'];
$queryy = "SELECT * FROM games WHERE id='$gameIda'";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$gameid = $roww['id'];
?>



<h3 class="tbl-head"><?php echo $roww['countryOne'];?> Vs <?php echo $roww['countryTwo'];?> || 
 <a href="add_bet.php?gameId=<?php echo $roww['id'];?>" class="btn btn-info">Add Question</a></h3>
<br>


<?php 

$queryy = "SELECT * FROM bett_qus WHERE gameId='$gameid'";
$resulytg = mysqli_query($con, $queryy);
if($resulytg){
if(mysqli_num_rows($resulytg) > 0){
while($rowwg = mysqli_fetch_array($resulytg)){
$qusid = $rowwg['id'];
?>

<div style="width:100%; overflow-x:scroll">
<h3 class="tbl-head"> <?php echo  $rowwg['ques']?> || 
<a href="add_bet_ans.php?gameId=<?php echo $roww['id'];?>&quesId=<?php echo  $rowwg['id']?>" class="btn btn-primary">Add answer</a> 
 || <a href="add_game.php" class="btn btn-info">Hide</a> || 
<a href="?id=<?php echo $_GET['id'];?>&quesDel=<?php echo  $rowwg['id']?>&" class="btn btn-danger">Delete</a></h3>
<table id="customers">
<thead>
<tr>
<th>Answare</th>
<th>Rate</th>
<th>Place</th>
<th>Bet Ammount</th>
<th>rtrn Amount</th>
<th>Status</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    
<?php 

$queryy = "SELECT * FROM bett_ans WHERE gameId='$gameid' AND quesId='$qusid'";
$resulytga = mysqli_query($con, $queryy);
if($resulytga){
if(mysqli_num_rows($resulytga) > 0){
while($rowwga = mysqli_fetch_array($resulytga)){
$ansid = $rowwga['id'];
?>
<tr>
<td><?php echo $rowwga['answ'];?></td>
<td><?php echo $rowwga['betRate'];?></td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>active</td>
<td><a href="" class="btn btn-success">Win</a></td>
<td><a href="" class="btn btn-info">stop/play</a></td>
<td>
<a href="" class="btn btn-danger">Rtrn</a>
<a href="" class="btn btn-primary">Back</a>
</td>
<td>
<a href="" class="btn btn-primary">Edit</a>
<a href="?delBitOp=<?php echo $rowwga['id'];?>" class="btn btn-danger">Delete</a>
</td>
</tr>

<?php } } } ?>

</tbody>
</table>
</div>
<br>


<?php } } } ?>









<?php } } } } ?>

</section
<?php include"inc/footer.php";?>