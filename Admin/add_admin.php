<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Add new Admin ||  <a href="adminList.php" class="btn btn-info">Admin list</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd;}</style>
<form id="addgame">

<p id="Load"> </p>
<table id="customers">

<tr>
<th>Admin Name</th>
<td><input type="text" id="adminName" placeholder="Admin Name" required></td>
</tr>
<tr>
<th>Admin Email</th>
<td><input type="email" id="emailId" placeholder="Admin Email" required></td>
</tr>
<tr>
<th>Admin Password</th>
<td><input type="text" id="password" placeholder="Admin password" required></td>
</tr>
<tr>
<th>Confirm Password</th>
<td><input type="text" id="cpassword" placeholder="Admin password" required></td>
</tr>
<tr>
<tr>
<th>Add Admin</th>
<td><input type="submit" id="sub_admin" value="Submit"></td>
</tr>


</table>
</form>



<script>
$('#addgame').submit(function(e){
e.preventDefault()
var adminName = $('#adminName').val();
var emailId = $('#emailId').val();
var password = $('#password').val();
var cpassword = $('#cpassword').val();
var sub_admin = $('#sub_admin').val();
if(password == cpassword){
$.post('Actions/authAction.php' , {adminName:adminName, emailId:emailId, password:password, sub_admin:sub_admin}, function(data){
$('#Load').html(data);
})
}else{
    $('#Load').html('<p class="col-dng">Passoword not mached!</p>');
}
})
</script>
</div>
</section
<?php include"inc/footer.php"?>