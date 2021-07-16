<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Add new Bet ||  <a href="bit_option.php?id=<?php echo $_GET['gameId'];?>" class="btn btn-info">Bet list</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd; }</style>

<form id="addQues">
    <input type="hidden" id="gameId" value="<?php echo $_GET['gameId'];?>">
    <p id="Load"></p>
<table id="customers">
<tr>
<th>Enter Question</th>
<td><input type="text" id="ques" placeholder="Question" required></td>
</tr>

<tr>
<th>Submit</th>
<td><input type="submit" id="sub_addQues" value="Submit"></td>
</tr>
</table>
</form>


<script>

$('#addQues').submit(function(e){
e.preventDefault()
var ques = $('#ques').val();
var gameId = $('#gameId').val();
var sub_addQues = $('#sub_addQues').val();
$.post('Actions/Bet.php' , {ques:ques, gameId:gameId, sub_addQues:sub_addQues}, function(data){
$('#Load').html(data);
})
})
</script>
</div>
</section
<?php include"inc/footer.php"?>