<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Edit Game ||  <a href="game.php" class="btn btn-info">Game list</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd;}</style>
<?php if(isset($_GET['id'])){
    
    
$gameId = $_GET['id'];
$query = "SELECT * FROM games WHERE id='$gameId'";
$result = mysqli_query($con, $query);
if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
    
?>
<form id="editGame">
    <input type="hidden" id="gameId" value="<?php echo $_GET['id'];?>">
<p id="Load"> </p>
<table id="customers">
<tr>
<th>Select Game Type</th>
<td>
<select id="gameType" required>
<option value="0">Select</option>
<?php 
$queryy = "SELECT * FROM game_type WHERE statusId=1";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<option value="<?php echo $roww['id'];?>"><?php echo $roww['gameName'];?></option>
<?php } }?>
</select>
</td>
</tr>
<tr>
<th>Country One*</th>
<td><input type="text" id="countryOne" placeholder="Country One" value="<?php echo $row['countryOne'];?>" required></td>
</tr>
<tr>
<th>Country Two</th>
<td><input type="text" id="countryTwo" placeholder="Country Two" value="<?php echo $row['countryTwo'];?>" required></td>
</tr>
<tr>
<th>Tournament Name</th>
<td><input type="text" id="tornamName" placeholder="Tournament Name" value="<?php echo $row['tornamName'];?>" required></td>
</tr>
<tr>
<th>Game Day*</th>
<td><input type="date" id="gameDay" placeholder="Game day" value="<?php echo $row['gameDay'];?>" required></td>
</tr>
<tr>
<th>Game Time*</th>
<td><input type="time" id="gameTime" placeholder="Game Time" value="<?php echo $row['gameTime'];?>" required></td>
</tr>
<tr>
<th>Select Game Status</th>
<td>
<select id="statusId" selected required>
<option value="0">Select Status</option>
<option value="1">Live</option>
<option value="2">Upcomming</option>
</select>
</td>
</tr>
<tr>
<th>Add Game</th>
<td><input type="submit" id="sub_editGame" value="Submit"></td>
</tr>


</table>
</form>
<?php } }else{  echo"not found any Game!"; } } }?>


<script>
$('#editGame').submit(function(e){
e.preventDefault()
var gameType = $('#gameType').val();
var countryOne = $('#countryOne').val();
var countryTwo = $('#countryTwo').val();
var tornamName = $('#tornamName').val();
var gameDay = $('#gameDay').val();
var gameTime = $('#gameTime').val();
var gameId = $('#gameId').val();
var statusId = $('#statusId').val();
var sub_editGame = $('#sub_editGame').val();
$.post('Actions/game.php' , {gameType:gameType, countryOne:countryOne, 
countryTwo:countryTwo, tornamName:tornamName, gameDay:gameDay, gameTime:gameTime,gameId:gameId, statusId:statusId, sub_editGame:sub_editGame}, function(data){
$('#Load').html(data);
})
})
</script>
</div>
</section
<?php include"inc/footer.php"?>