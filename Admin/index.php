<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Dashbordd</h3>
<table id="customers">  
<tbody>

<tr><th>Admin Profit</th><td> <p class="btn btn-info">--</p></td></tr>
<tr><th>Deposit </td><th> <p class="btn btn-info">
             <?php 
$queryy = "SELECT * FROM transiction WHERE  statusId=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
        echo mysqli_num_rows($resulyt);
}}
?>
</p></td></tr>
<tr><th>Deposit ammount</td><th> <p class="btn btn-info">
            
<?php 
$withrowAm = 0;
$queryy = "SELECT * FROM transiction WHERE  statusId=1 AND statusPo=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
        $withrowAm = $withrowAm + $roww['ammount'];
}}}
echo $withrowAm;
?>
</p></td></tr>

<tr><th>Transfar </td><th> <p class="btn btn-info">
             <?php 
$queryy = "SELECT * FROM transiction WHERE  statusId=3";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
        echo mysqli_num_rows($resulyt);
}}
?>
</p></td></tr>
<tr><th>Transfar ammount</td><th> <p class="btn btn-info">
            
<?php 
$withrowAm = 0;
$queryy = "SELECT * FROM transiction WHERE  statusId=3 AND statusPo=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
        $withrowAm = $withrowAm + $roww['ammount'];
}}}
echo $withrowAm;
?>
</p></td></tr>

<tr><th>Withrow</td><th> <p class="btn btn-info">
             <?php 
$queryy = "SELECT * FROM transiction WHERE  statusId=2";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
        echo mysqli_num_rows($resulyt);
}}
?>
</p></td></tr>
<tr><th>Withrow ammount</td><th> <p class="btn btn-info">
        
<?php 
$withrowAm = 0;
$queryy = "SELECT * FROM transiction WHERE  statusId=2 AND statusPo=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
        $withrowAm = $withrowAm + $roww['ammount'];
}}}
echo $withrowAm;
?>


</p></td></tr>
<tr><th>All User</td><th> <p class="btn btn-info">
         <?php 
$queryy = "SELECT * FROM users ";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
        echo mysqli_num_rows($resulyt);
}}
?>
</p></td></tr>
<tr><th>User Ammount</td><th> <p class="btn btn-info">--</p></td></tr>
<tr><th>Club</td><th> <p class="btn btn-info">
         <?php 
$queryy = "SELECT * FROM clubs ";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
        echo mysqli_num_rows($resulyt);
}}
?>
</p></td></tr>
<tr><th>Club Ammount</td><th> <p class="btn btn-info">--</p></td></tr>





<tr><th>Game</td><th> <p class="btn btn-info">
        <?php 
$queryy = "SELECT * FROM games ";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
        echo mysqli_num_rows($resulyt);
}}
?>
</p></td></tr>




<tr><th>Admin</td><th> <p class="btn btn-info">--</p></td></tr>



</tbody>

</table>
</section
<?php include"inc/footer.php"?>