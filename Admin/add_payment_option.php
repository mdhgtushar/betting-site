<?php include"inc/header.php"?>
<section id="main-content">
    <h3 class="tbl-head">Add new ||  <a href="paymentOption.php" class="btn btn-info">Payment Opntions</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd;}</style>
<form id="addgame">
  
    <p id="Load"> </p>
<table id="customers">

<tr>
<th>Method Name</th>
<td><input type="text" id="countryTwo" placeholder="Method name" required></td>
</tr>
<tr>
<th>Method Type</th>
<td><input type="text" id="tornamName" placeholder="Method typr (e.g personal)" required></td>
</tr>
<tr>
<th>Payment Number</th>
<td><input type="number" id="gameDay" placeholder="Payment Number" required></td>
</tr>
<tr>
<th>Add payment</th>
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