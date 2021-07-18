<?php include"inc/header.php"?>
<section id="main-content">


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd; }</style>



<?php
if(isset($_GET['editId'])){
?>
<?php 
$editId = $_GET['editId'];
$queryy = "SELECT * FROM bett_ans WHERE id='$editId'";
$resulytga = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulytga) > 0){
while($rowwga = mysqli_fetch_array($resulytga)){
$ansid = $rowwga['id'];
?>
<h3 class="tbl-head">Edit ans || <?php 
if(isset($_GET['stackId'])){
    ?>
     <a href="auto_stack_option.php?id=<?php echo $_GET['id'];?>&name=<?php echo $_GET['name'];?>" class="btn btn-info">Bet list</a>
     <?php }else{?>
     <a href="bit_option.php?id=<?php echo $_GET['id'];?>" class="btn btn-info">Bet list</a>
     <?php }?>

    </h3>
<form id="updateAns">
    <input type="hidden" id="editId" value="<?php echo $_GET['editId'];?>">
    <p id="Load"></p>
<table id="customers">
<tr>
<th>Enter Answare</th>
<td><input type="text" id="ansr" value="<?php echo $rowwga['answ'];?>" placeholder="Answare" required></td>
</tr>
<tr>
<th>Enter Rate</th>
<td><input type="text" id="rate" value="<?php echo $rowwga['betRate'];?>" placeholder="Rate" required></td>
</tr>
<tr>
<th>Submit</th>
<td><input type="submit" id="update_addAns"></td>
</tr>
</table>
</form>
<?php } } ?>


<?php }else{ ?>
<h3 class="tbl-head">Add new ans ||  <a href="bit_option.php?id=<?php echo $_GET['gameId'];?>" class="btn btn-info">Bet list</a></h3>
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


<?php } ?>

<script>

$('#updateAns').submit(function(e){
e.preventDefault()
var editId = $('#editId').val();
var ansr = $('#ansr').val();
var rate = $('#rate').val();
var update_addAns = $('#update_addAns').val();
$.post('Actions/Bet.php' , {ansr:ansr, rate:rate, editId:editId, update_addAns:update_addAns}, function(data){
$('#Load').html(data);
})
})

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