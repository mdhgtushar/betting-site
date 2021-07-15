<?php include"inc/header.php"?>
<section id="main-content">
    <h3 class="tbl-head">Add new Game ||  <a href="game.php" class="btn btn-info">Game list</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd;}</style>
<form id="addgame">
  
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
<td><input type="text" id="countryOne" placeholder="Country One" required></td>
</tr>
<tr>
<th>Country Two</th>
<td><input type="text" id="countryTwo" placeholder="Country Two" required></td>
</tr>
<tr>
<th>Tournament Name</th>
<td><input type="text" id="tornamName" placeholder="Tournament Name" required></td>
</tr>
<tr>
<th>Game Day*</th>
<td><input type="date" id="gameDay" placeholder="Game day" required></td>
</tr>
<tr>
<th>Game Time*</th>
<td><input type="time" id="gameTime" placeholder="Game Time" required></td>
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
<td><input type="submit" id="sub_addGame" value="Submit"></td>
</tr>


</table>
</form>



<script>
     $('#addgame').submit(function(e){
            e.preventDefault()
            var gameType = $('#gameType').val();
            var countryOne = $('#countryOne').val();
            var countryTwo = $('#countryTwo').val();
            var tornamName = $('#tornamName').val();
            var gameDay = $('#gameDay').val();
            var gameTime = $('#gameTime').val();
            var statusId = $('#statusId').val();
            var sub_addGame = $('#sub_addGame').val();
            $.post('Actions/game.php' , {gameType:gameType, countryOne:countryOne, 
            countryTwo:countryTwo, tornamName:tornamName, gameDay:gameDay, gameTime:gameTime, statusId:statusId, sub_addGame:sub_addGame}, function(data){
                $('#Load').html(data);
            })
        })
</script>
</div>
</section
<?php include"inc/footer.php"?>