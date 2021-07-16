<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Add new ans ||  <a href="bit_option.php?id=<?php echo $_GET['gameId'];?>" class="btn btn-info">Bet list</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd; }</style>

<form id="addAns">
    <input type="hidden" id="gameId" value="<?php echo $_GET['gameId'];?>">
    <input type="hidden" id="quesId" value="<?php echo $_GET['quesId'];?>">
    <p id="Load"></p>
<table id="customers">
<tr>
<th>Enter Answare</th>
<td><input type="text" id="ansr" placeholder="Answare" required></td>
</tr>
<tr>
<th>Enter Rate</th>
<td><input type="text" id="rate" placeholder="Rate" required></td>
</tr>
<tr>
<th>Submit</th>
<td><input type="submit" id="sub_addAns"></td>
</tr>
</table>
</form>


<script>

$('#addAns').submit(function(e){
e.preventDefault()
var gameId = $('#gameId').val();
var quesId = $('#quesId').val();
var ansr = $('#ansr').val();
var rate = $('#rate').val();
var sub_addAns = $('#sub_addAns').val();
$.post('Actions/Bet.php' , {ansr:ansr, rate:rate, quesId:quesId, gameId:gameId, sub_addAns:sub_addAns}, function(data){
$('#Load').html(data);
})
})
</script>
</div>
</section
<?php include"inc/footer.php"?>