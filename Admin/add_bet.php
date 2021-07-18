<?php include"inc/header.php";



?>
<section id="main-content">
<h3 class="tbl-head">Add new Bet ||  <a href="bit_option.php?id=<?php echo $_GET['gameId'];?>" class="btn btn-info">Bet list</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd; }</style>


<?php if(isset($_GET['count'])){ ?>

<form action="" method="get">
    <input type="hidden" name="gameId" value="<?php echo $_GET['gameId'];?>">
    <p id="Load"></p>
<table id="customers">
<tr>
<th>Enter Question</th>
<td><input type="text" name="Ques" placeholder="Question" value="<?php echo $_GET['Ques'];?>" required></td>
</tr>
<?php $count = $_GET['count']; for($i=1; $i <= $count; $i++){?>
<tr>
<th>Enter Answer <?php echo $i;?></th>
<td><input type="text" name="answ[]" placeholder="Answare" required></td>
</tr>
<tr>
<th>Enter Rate <?php echo $i;?></th>
<td><input type="text" name="betRate[]" placeholder="Rate" required></td>
</tr>

<?php }?>
<tr>
<th>Submit</th>
<td><input type="submit" value="Submit"></td>
</tr>
</table>
</form>


<?php }else{ ?>

<form action="" method="get">
    <input type="hidden" name="gameId" value="<?php echo $_GET['gameId'];?>">
    <p id="Load"></p>
<table id="customers">
<tr>
<th>Enter Question</th>
<td><input type="text" name="Ques" placeholder="Question" required></td>
</tr>

<tr>
<th>Number of answare</th>
<td>
    <select name="count">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="3">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
</td>
</tr>
<tr>
<th>Submit</th>
<td><input type="submit" value="Submit"></td>
</tr>
</table>
</form>

<?php }?>

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