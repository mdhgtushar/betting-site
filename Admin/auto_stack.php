<?php include"inc/header.php";

if(isset($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];

    $query = "DELETE FROM auto_stack WHERE id = '$deleteId'";
    $result = mysqli_query($con, $query);
    if($result){
        $msg =  "Delete Success";
    }else{
        $msg = "Delete Unsuccess";
    }
}
?>
<section id="main-content">
<h3 class="tbl-head">Manage Auto Stack <a href="add_bet.php" id="addCategory" class="btn btn-info">Add Category</a></h3>
<div style="width:100%; overflow-x:scroll">
<p id="Load"></p>
<table id="customers">  
<thead>
<tr>
<th>SL.</th>
<th>Game Type</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$i = 1;
$queryy = "SELECT * FROM auto_stack";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<tr>
<td>1</td>
<td><?php echo $roww['stackType'];?></td>
<td>
<a href="auto_stack_option.php?id=<?php echo $roww['id'];?>&name=<?php echo $roww['stackType'];?>" class="btn btn-success">Stack Option</a></th>
<th>
<a href="?deleteId=<?php echo $roww['id'];?>" onclick="return confirm('Are You Sure to Delete')" class="btn btn-danger">Delete</a>
</td>
</tr>

<?php }}?>
</tbody>

<script>
     $('#addCategory').click(function(e){
            e.preventDefault()
            var stackType = prompt('Enter Category Name');
            if(stackType != ""){
            $.post('Actions/Bet.php' , {stackType:stackType}, function(data){
                $('#Load').html(data);
            })
            }
        })
</script>
</table>
</div>
</section
<?php include"inc/footer.php"?>