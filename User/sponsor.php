<?php 
include"inc/header.php";

?>


<section id="main-content">
<br>

           <h2>Your Sponsors</h2>
<div style="width:100%; overflow-x:scroll">
<table id="customers">
<tr>
<th>SN.</th>
<th>Joining Date</th>
<th>Recent Bet Date</th>
<th>Name</th>
<th>Userneme</th>
<th>Total bet</th>
<th>Commition earned</th>
</tr>
<?php 
$userId = $_SESSION['logedInUserId'];
$query = "SELECT * FROM users WHERE id='$userId'";
$result = mysqli_query($con, $query);

if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

$userId =  $row['userId'];


$queryy = "SELECT * FROM users WHERE sopnsorsUserId='$userId'";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<tr>
<td>1</td>
<td>12 Jul 2021</td>
<td>12 Jul 2021</td>
<td><?php echo $roww['fullName']?></td>
<td><?php echo $roww['userId']?></td>
<td>20</td>
<td>200tk</td>
</tr>

<?php
}}}
}
}else{
echo"not found any user!";
}
}

?>
</table>
    
</div>




</section> <br>
<?php include"inc/footer.php";?>