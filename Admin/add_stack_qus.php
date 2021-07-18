<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Add new Question ||  <a href="auto_stack_option.php?id=<?php echo $_GET['stackId'];?>&name=<?php echo $_GET['name'];?>" class="btn btn-info">Back</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd; }</style>

<form id="addStockQues">
    <input type="hidden" id="stackId" value="<?php echo $_GET['stackId'];?>">
    <p id="Load"></p>
<table id="customers">
<tr>
<th>Enter Question</th>
<td><input type="text" id="ques" placeholder="Question" required></td>
</tr>

<tr>
<th>Submit</th>
<td><input type="submit" id="sub_addStockQues" value="Submit"></td>
</tr>
</table>
</form>


<script>

$('#addStockQues').submit(function(e){
e.preventDefault()
var ques = $('#ques').val();
var stackId = $('#stackId').val();
var sub_addStockQues = $('#sub_addStockQues').val();
$.post('Actions/Bet.php' , {ques:ques, stackId:stackId, sub_addStockQues:sub_addStockQues}, function(data){
$('#Load').html(data);
})
})
</script>
</div>
</section
<?php include"inc/footer.php"?>