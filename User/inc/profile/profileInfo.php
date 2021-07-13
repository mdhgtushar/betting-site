
<table id="customers">
<?php 
$userId = $_SESSION['logedInUserId'];
$query = "SELECT * FROM users WHERE id='$userId'";
$result = mysqli_query($con, $query);

if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
?>
<tr>
<th>Balance</th>
<td><?php echo $balance; ?>tk</td>
</tr>

<tr>
<th>Full Name</th>
<td><?php echo $row['fullName'];?></td>
</tr>
<tr>
<th>User Name</th>
<td><?php echo $row['userId'];?></td>
</tr>
<tr>
<th>Mobile No.</th>
<td><?php echo $row['mobileNumber'];?></td>
</tr>
<tr>
<th>Email</th>
<td><?php echo $row['email'];?></td>
</tr>
<tr>
<th>Club Name</th>
<td><?php

$clubId =  $row['clubId'];

$queryy = "SELECT * FROM clubs WHERE id='$clubId'";
$resulty = mysqli_query($con, $queryy);

if($resulty){
if(mysqli_num_rows($resulty) > 0){
while($rowy = mysqli_fetch_array($resulty)){
echo $rowy['clubName'];
}}}
?></td>
</tr>
<tr>
<th>Edit info</th>
<td><a href="profile.php?profileEdit">Edit</a></td>
</tr>


<?php
}
}else{
echo"not found any user!";
}
}

?>
</table>
