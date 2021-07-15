<?php include"inc/header.php"?>
<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd;}</style>
<section id="main-content">
<?php if(isset($_GET['passEditId'])){?>
<input type="hidden" id="userId" value="<?php echo $_GET['passEditId'];?>" required>
<h3 class="tbl-head">Edit Password ||  <a href="allUser.php" class="btn btn-info">User List</a></h3>
<form id="changePass">
<p id="Load"> </p>
<table id="customers">
<tr>
<th>New password</th>
<td><input type="text" id="password" placeholder="New password" required></td>
</tr>

<tr>
<th>Confirm password</th>
<td><input type="text" id="cpassword" placeholder="Confirm password"required></td>
</tr>
<tr>
<th>Submit</th>
<td><input type="submit" id="passEditSub" required></td>
</tr>
</table>

</form>


<script>
$('#changePass').submit(function(e){
e.preventDefault()
var password = $('#password').val();
var cpassword = $('#cpassword').val();
var userId = $('#userId').val();
var passEditSub = $('#passEditSub').val();
if(password == cpassword){
$.post('Actions/authAction.php' , {password:password, userId:userId,  passEditSub:passEditSub}, function(data){
$('#Load').html(data);
})
}else{
    $('#Load').html("password Not matched");
}
})
</script>



<?php }elseif(isset($_GET['id'])){?>
<h3 class="tbl-head">Edit User ||  <a href="allUser.php" class="btn btn-info">User List</a></h3>
<form id="editProfile">
<p id="Load"> </p>
<table id="customers">
<?php 
$userId = $_GET['id'];
$query = "SELECT * FROM users WHERE id='$userId'";
$result = mysqli_query($con, $query);
if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
?>
<tr>
<th>Full Name</th>
<td><input type="text" id="fullName" placeholder="Full Name" value="<?php echo $row['fullName'];?>" required></td>
</tr>
<tr>
<th>User Name</th>
<td><?php echo $row['userId'];?></td>
</tr>
<tr>
<th>Mobile No.</th>
<td><input type="text" id="mobileNumber" placeholder="Full Name" value="<?php echo $row['mobileNumber'];?>" required></td>
</tr>
<tr>
<th>Email</th>
<td><input type="email" id="email" placeholder="Full Name" value="<?php echo $row['email'];?>" required></td>
</tr>
<tr>
<th>Club Name</th>
<td>
<select id="clubId" required>
<option value="0">Select Club</option>
<?php
$queryy = "SELECT * FROM clubs";
$resulty = mysqli_query($con, $queryy);

if($resulty){
if(mysqli_num_rows($resulty) > 0){
while($rowy = mysqli_fetch_array($resulty)){
?>
<option value="<?php echo $rowy['id'];?>"><?php echo $rowy['clubName'];?></option>
<?php
}}}
?>
</select>
</td>
</tr>
<tr>
<th>Edit info</th>
<td><input type="submit" id="editPro_submit" value="Save Changes"></td>
</tr>


<?php } }else{  echo"not found any user!"; } } ?>
</table>
</form>

<script>
$('#editProfile').submit(function(e){
e.preventDefault()
var fullName = $('#fullName').val();
var mobileNumber = $('#mobileNumber').val();
var email = $('#email').val();
var clubId = $('#clubId').val();
var editPro_submit = $('#editPro_submit').val();

$.post('Actions/authAction.php' , {fullName:fullName, mobileNumber:mobileNumber,  email:email, clubId:clubId,editPro_submit:editPro_submit}, function(data){
$('#Load').html(data);
})
})
</script>

<?php }?>

</section
<?php include"inc/footer.php"?>