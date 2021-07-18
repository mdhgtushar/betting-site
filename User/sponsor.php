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
<td><?php echo $roww['createTime']?></td>
<td><?php echo $roww['fullName']?></td>
<td><?php echo $roww['userId']?></td>
<td>
    <?php 
    $sponUsrId = $roww['id'];
    $queryya = "SELECT * FROM user_bits WHERE userId='$sponUsrId' AND statusId=1";
$resulyta = mysqli_query($con, $queryya);
if(mysqli_num_rows($resulyta) > 0){
while($rowwa = mysqli_fetch_array($resulyta)){
$userId = $rowwa['ansId'];
$clubQry = "SELECT * FROM bett_ans WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
   echo mysqli_num_rows($clubResult);
}else{ echo "0";}
} }else{ echo "0";}
?>
</td>
<td>
    <?php 
    $sponUsrId = $roww['id'];
    $queryya = "SELECT * FROM user_bits WHERE userId='$sponUsrId' AND statusId=1";
$resulyta = mysqli_query($con, $queryya);
$returnBet = 0;
if(mysqli_num_rows($resulyta) > 0){
while($rowwa = mysqli_fetch_array($resulyta)){
        
$userId = $rowwa['ansId'];
$clubQry = "SELECT * FROM bett_ans WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
$clbFetch = mysqli_fetch_array($clubResult);
    $winLos = $clbFetch['statusId'];
    if($winLos != 3){
        $returnBet =  ($rowwa['ammount']*0.02);
    }
}
} }
echo $returnBet;
?>
</td>
</tr>

<?php
}}}
}
}else{
echo"not found any sponsor!";
}
}

?>
</table>
    
</div>




</section> <br>
<?php include"inc/footer.php";?>