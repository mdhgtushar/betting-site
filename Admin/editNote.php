<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Add new Club ||  <a href="deposit.php" class="btn btn-info">Club list</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd;}</style>


<?php if(isset($_GET['id'])){
    $id = $_GET['id'];

$queryy = "SELECT * FROM transiction WHERE  id=$id";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
    $note = $roww['note'];
}}



 ?>
<form id="edit_note">

<p id="Load"> </p>
<table id="customers">
<input type="hidden" id="id" value="<?php echo $id;?>">
<tr>
<th>Edit note</th>
<td>
    <textarea id="note" cols="30" rows="10"><?php echo $note;?></textarea>
</td>
</tr>

<tr>
<th>submit</th>
<td><input type="submit" id="editNote" value="Submit"></td>
</tr>


</table>
</form>

<?php }?>

<script>
$('#edit_note').submit(function(e){
e.preventDefault()
var id = $('#id').val();
var note = $('#note').val();
var editNote = $('#editNote').val();
$.post('Actions/note.php' , {note:note, id:id,
editNote:editNote}, function(data){
$('#Load').html(data);
})
})
</script>
</div>
</section
<?php include"inc/footer.php"?>