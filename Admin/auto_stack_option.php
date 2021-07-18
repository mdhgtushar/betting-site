<?php include"inc/header.php"?>


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
if(isset($_GET['deleteAns'])){
    $deleteAns = $_GET['deleteAns'];

    $query = "DELETE FROM bett_ans WHERE id = '$deleteAns'";
    $result = mysqli_query($con, $query);
    if($result){
        $msg =  "Delete Success";
    }else{
        $msg = "Delete Unsuccess";
    }
}
?>
<section id="main-content">



<h3 class="tbl-head">Manage Stack In :<?php echo $_GET['name'];?> 
 <a href="add_stack_qus.php?stackId=<?php echo $_GET['id'];?>&name=<?php echo $_GET['name'];?>" id="addStockQues" class="btn btn-info">Add Question</a></h3>
<br>

<?php

    $stackId = $_GET['id'];
$queryy = "SELECT * FROM bett_qus WHERE stackId='$stackId'";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$quesId = $roww['id'];
?><p id="Load"></p>
<div style="width:100%; overflow-x:scroll">
<h3 class="tbl-head"> <?php echo  $roww['ques']?> || 
<a href="add_stack_ans.php?stackId=<?php echo $_GET['id'];?>&quesId=<?php echo  $roww['id']?>&name=<?php echo $_GET['name'];?>" class="btn btn-primary">Add answer</a>
||  <a href="?id=<?php echo $_GET['id'];?>&quesDel=<?php echo  $roww['id']?>&name=<?php echo $_GET['name'];?>" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a></h3>

<table id="customers">
<thead>
<tr>
<th>Answare</th>
<th>Rate</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    
<?php

$queryya = "SELECT * FROM bett_ans WHERE quesId='$quesId'";
$resulyta = mysqli_query($con, $queryya);
if(mysqli_num_rows($resulyta) > 0){
while($roaww = mysqli_fetch_array($resulyta)){
?>
    <tr>
        <td><?php echo  $roaww['answ'];?></td>
        <td><?php echo  $roaww['betRate'];?></td>
                <td><a class="btn btn-info" href="add_bet_ans.php?stackId&editId=<?php echo  $roaww['id'];?>&id=<?php echo $_GET['id'];?>&name=<?php echo $_GET['name'];?>" >Edit</a></td>

        <td><a class="btn btn-danger" href="?deleteAns=<?php echo  $roaww['id'];?>&id=<?php echo $_GET['id'];?>&name=<?php echo $_GET['name'];?>" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
    </tr>
<?php } } ?>
</tbody>
</table>
</div>
<br>
<?php } } ?>

<script>

$('#addStockQues').click(function(e){
e.preventDefault()
var ques = prompt('Enter Question');
var stackId = '<?php echo $stackId;?>';
var sub_addStockQues = 'submited';
if(ques != null){
$.post('Actions/Bet.php' , {ques:ques, stackId:stackId, sub_addStockQues:sub_addStockQues}, function(data){
$('#Load').html(data);
})
}
})
</script>
</section
<?php } include"inc/footer.php";?>