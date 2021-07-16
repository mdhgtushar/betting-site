<?php 
include"inc/header.php";

if(isset($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];

    $query = "DELETE FROM games WHERE id = '$deleteId'";
    $result = mysqli_query($con, $query);
    if($result){
        $msg =  "Delete Success";
    }else{
        $msg = "Delete Unsuccess";
    }
}

if(isset($_POST['live_upcom'])){
$statusId = mysqli_real_escape_string($con,$_POST['statusId']);
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);
$query = "UPDATE games
SET statusId = '$statusId'
WHERE id='$gameId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'> Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}
}

if(isset($_POST['game_finished'])){
$statusId = mysqli_real_escape_string($con,$_POST['statusId']);
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);
$query = "UPDATE games
SET statusRan = '$statusId'
WHERE id='$gameId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'> Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}
}
if(isset($_POST['show_hide'])){
$statusId = mysqli_real_escape_string($con,$_POST['statusId']);
$gameId = mysqli_real_escape_string($con,$_POST['gameId']);
$query = "UPDATE games
SET showHide = '$statusId'
WHERE id='$gameId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'> Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}
}
?>
<section id="main-content">
<h3 class="tbl-head">All Games ||  <a href="add_game.php" class="btn btn-info">Add New Game</a></h3>
<div style="width:100%; overflow-x:scroll">
<table id="customers">  
<thead>
<tr>
<th>Game Type</th>
<th>Game Name</th>
<th>Tournament Name</th>
<th>Game Day</th>
<th>Game Time</th>
<th>Live Score</th>
<th>Betting Option</th>
<th>Status</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$queryy = "SELECT * FROM games WHERE statusRan=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$gameid = $roww['id'];
?>

<tr>
<td>
         <?php 
$userId = $roww['gameType'];
$clubQry = "SELECT * FROM game_type WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
    $clbFetch = mysqli_fetch_array($clubResult);
    echo $clbFetch['gameName'];
}
?>

</td>
<td><?php echo $roww['countryOne'];?> Vs <?php echo $roww['countryTwo'];?></td>
<td><?php echo $roww['tornamName'];?></td>
<td><?php echo $roww['gameDay'];?></td>
<td><?php echo $roww['gameTime'];?></td>
<td><a href="" class="btn btn-danger">Live score</a></td>
<td><a href="bit_option.php?id=<?php echo $roww['id'];?>" class="btn btn-primary">Betting Option</a></td>

<td>
<form action="" method="post">
<?php
$statusPo = $roww['statusId'];
if($statusPo == 1){
$statusPosub = 2;
echo "<span style='color:red'>Live<span>";
}elseif($statusPo == 2){
$statusPosub = 1;
echo "Upcomming";
}else{
$statusPosub = 1;
}
?>
<input type="hidden" name="gameId" value="<?php echo $roww['id']?>">
<input type="hidden" name="statusId" value="<?php echo $statusPosub;?>">
<input type="submit" class="btn btn-info" name="live_upcom" value="Live/Upcomming">
</form>
</td>
<td><a href="" class="btn btn-success">Pause Game</a></td>
<td>
<form action="" method="post">
<?php
$statusPo = $roww['statusRan'];
if($statusPo == 1){
$statusPosub = 2;
}elseif($statusPo == 2){
$statusPosub = 1;
}else{
$statusPosub = 1;
}
?>
<input type="hidden" name="gameId" value="<?php echo $roww['id']?>">
<input type="hidden" name="statusId" value="<?php echo $statusPosub;?>">
<input type="submit" class="btn btn-info" name="game_finished" value="Game Finished">
</form>
</td>
<td>
<form action="" method="post">
<?php
$statusPo = $roww['showHide'];
if($statusPo == 1){
$statusPosub = 0;
$btnTxt = "Hide Game";
$btnCls = "btn btn-info";
}elseif($statusPo == 0){
$statusPosub = 1;
$btnTxt = "Show Game";
$btnCls = "btn btn-success";
}else{
$statusPosub = 0;
}
?>
<input type="hidden" name="gameId" value="<?php echo $roww['id']?>">
<input type="hidden" name="statusId" value="<?php echo $statusPosub;?>">
<input type="submit" class="<?php echo $btnCls;?>" name="show_hide" value="<?php echo $btnTxt;?>">
</form>
</td>
<td><a href="edit_game.php?id=<?php echo $roww['id']?>" class="btn btn-primary">edit</a></td>
<td><a href="?deleteId=<?php echo $roww['id']?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a>
</td>
</tr>



<?php } } } ?>
</tbody>
</table>
</div>
</section
<?php include"inc/footer.php"?>