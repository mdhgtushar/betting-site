<?php include"inc/header.php"?>
<section id="main-content">


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


if(isset($_GET['delBitOp'])){
    $quesDel = $_GET['delBitOp'];

    $query = "DELETE FROM bett_ans WHERE id = '$quesDel'";
    $result = mysqli_query($con, $query);
    if($result){
        $msg =  "Delete Success";
    }else{
        $msg = "Delete Unsuccess";
    }
}


if(isset($_POST['Status_change'])){
$statusId = mysqli_real_escape_string($con,$_POST['statusId']);
$userId = mysqli_real_escape_string($con,$_POST['userId']);
$query = "UPDATE bett_ans
SET statusId = '$statusId'
WHERE id='$userId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'> Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}
}

if(isset($_POST['Status_changeQus'])){
$statusId = mysqli_real_escape_string($con,$_POST['statusId']);
$userId = mysqli_real_escape_string($con,$_POST['userId']);
$query = "UPDATE bett_qus
SET statusId = '$statusId'
WHERE id='$userId' ";
$result = mysqli_query($con, $query);
if($result){
echo "<p class='col-suc'> Update successful</p>";
}else{
echo "<p class='col-dng'>Something Wrong</p>";
}
}



    $gameIda = $_GET['id'];
$queryy = "SELECT * FROM games WHERE id='$gameIda'";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$gameid = $roww['id'];
?>






<h3 class="tbl-head"><?php echo $roww['countryOne'];?> Vs <?php echo $roww['countryTwo'];?> || 
 <a href="add_bet.php?gameId=<?php echo $roww['id'];?>" class="btn btn-info">Add Question</a></h3>
<br>

<h3 class="tbl-head" onclick="stackOptshow()">Select Update Stack</h3>
<div class="header-nav sm-block display" id="stackOpt">
                <div style="overflow:hidden;"></div>
                 <ul>
<?php 
$i = 1;
$queryy = "SELECT * FROM auto_stack";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($rowwstack = mysqli_fetch_array($resulyt)){
?>
                    <li><a href="Actions/stackImport.php?id=<?php echo $rowwstack['id'];?>&gameId=<?php echo $_GET['id'];?>" onclick="return confirm('Are you sure to Import this stack?')"><?php echo $rowwstack['stackType'];?></a></li>

<?php }}?>
                </ul>
            </div>
<br>
<?php 

$queryy = "SELECT * FROM bett_qus WHERE gameId='$gameid'";
$resulytg = mysqli_query($con, $queryy);
if($resulytg){
if(mysqli_num_rows($resulytg) > 0){
while($rowwg = mysqli_fetch_array($resulytg)){
$qusid = $rowwg['id'];
$statusId = $rowwg['statusId'];
?>

<div style="width:100%; overflow-x:scroll">
<h3 class="tbl-head"> <?php echo  $rowwg['ques']?> || 
<a href="add_bet_ans.php?gameId=<?php echo $roww['id'];?>&quesId=<?php echo  $rowwg['id']?>" class="btn btn-primary">Add answer</a> 
 ||
 <?php if($statusId == 1){?>
   <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $rowwg['id']?>">
        <input type="hidden" name="statusId" value="2">
        <input type="submit" class="btn btn-info" name="Status_changeQus" value="Hide">
    </form>
    <?php }else{?>
   <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $rowwg['id']?>">
        <input type="hidden" name="statusId" value="1">
        <input type="submit" class="btn btn-success" name="Status_changeQus" value="Show">
    </form>
    <?php }?>
    <br>
  || 
<a href="?id=<?php echo $_GET['id'];?>&quesDel=<?php echo  $rowwg['id']?>&" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a></h3>

<table id="customers">
<thead>
<tr>
<th>Answare</th>
<th>Rate</th>
<th>Place</th>
<th>Bet Ammount</th>
<th>rtrn Amount</th>
<th>Status</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    
<?php 

$queryy = "SELECT * FROM bett_ans WHERE gameId='$gameid' AND quesId='$qusid'";
$resulytga = mysqli_query($con, $queryy);
if($resulytga){
if(mysqli_num_rows($resulytga) > 0){
while($rowwga = mysqli_fetch_array($resulytga)){
$ansid = $rowwga['id'];
?>
<tr>
<td><?php echo $rowwga['answ'];?></td>
<td><?php echo $rowwga['betRate'];?></td>
<td>0</td>
<td>
         <?php
     $returnBet =0;
$userId = $rowwga['id'];
$clubQry = "SELECT * FROM user_bits WHERE ansId='$userId' AND statusId!=3";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
while($rowwgau = mysqli_fetch_array($clubResult)){
        $returnBet = $returnBet + ($rowwgau['ammount']);
    
}
}

echo $returnBet;
?>
</td>
<td>
     <?php
     $returnBet =0;
$userId = $rowwga['id'];
$clubQry = "SELECT * FROM user_bits WHERE ansId='$userId' AND statusId!=3";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
while($rowwgau = mysqli_fetch_array($clubResult)){
        $returnBet = $returnBet + ($rowwgau['ammount'] * $rowwga['betRate']);
    
}
}

echo $returnBet;
?>
</td>
<td>
       <?php
    $winLos = $rowwga['statusId'];
    if($winLos == 1){
        echo "<b style='color:green'>Win</b>";
    }elseif($winLos == 2){
        echo "<b style='color:red'>Lose</b>";
    }elseif($winLos == 0){
        echo "<b style='color:gray'>Active</b>";
    }elseif($winLos == 3){
        echo "<b style='color:red'>Returned</b>";
    }else{
        echo "--";
    }
    ?> 
</td>
<td>
    <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $rowwga['id']?>">
        <input type="hidden" name="statusId" value="1">
        <input type="submit" class="btn btn-success" name="Status_change" value="Win">
    </form>
</td>
<td>
     <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $rowwga['id']?>">
        <input type="hidden" name="statusId" value="2">
        <input type="submit" class="btn btn-danger" name="Status_change" value="Lose">
    </form>
</td>
<td>
     <form action="" method="post">
        <input type="hidden" name="userId" value="<?php echo $rowwga['id']?>">
        <input type="hidden" name="statusId" value="3">
        <input type="submit" class="btn btn-danger" name="Status_change" value="Rtrn">
    </form>
</td>
<td>
<a href="add_bet_ans.php?editId=<?php echo $rowwga['id'];?>&id=<?php echo $_GET['id'];?>" class="btn btn-primary">Edit</a>
<a href="?delBitOp=<?php echo $rowwga['id'];?>&id=<?php echo $_GET['id'];?>" onclick="return confirm('Are You Sure To Delete')" class="btn btn-danger">Delete</a>
</td>
</tr>

<?php } } } ?>

</tbody>
</table>
</div>
<br>


<?php } } } ?>









<?php } } } } ?>
<script>
    
      function stackOptshow() {
   var element = document.getElementById("stackOpt");
   element.classList.toggle("display");
}
</script>
</section
<?php include"inc/footer.php";?>