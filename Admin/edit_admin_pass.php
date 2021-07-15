<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Add new Admin ||  <a href="adminList.php" class="btn btn-info">Admin list</a></h3>
<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd;}</style>
<?php if(isset($_GET['passEditId'])){?>
<form id="editPass">
<input type="hidden" id="userId">
<p id="Load"> </p>
<table id="customers">

<tr>
<th>New Password</th>
<td><input type="text" id="password" placeholder="New password" required></td>
</tr>
<tr>
<th>Confirm Passoword</th>
<td><input type="text" id="cpassword" placeholder="Confirm password" required></td>
</tr>

<tr>
<tr>
<th>Add Admin</th>
<td><input type="submit" id="sub_admin_edit_pass" value="Submit"></td>
</tr>


</table>
</form>
<script>
$('#editPass').submit(function(e){
e.preventDefault()
var userId = $('#userId').val();
var password = $('#password').val();
var cpassword = $('#cpassword').val();
var sub_admin_edit_pass = $('#sub_admin_edit_pass').val();
if(password == cpassword){
$.post('Actions/authAction.php' , {userId:userId , password:password, sub_admin_edit_pass:sub_admin_edit_pass}, function(data){
$('#Load').html(data);
})
}else{
    $('#Load').html('<p class="col-dng">Passoword not mached!</p>');
}
})
</script>

<?php }?>

</div>
</section
<?php include"inc/footer.php"?>