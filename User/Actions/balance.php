<?php

if(isset($_SESSION['logedInUserId'])){

$userId = $_SESSION['logedInUserId'];
$ammount = 0;
$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=1 AND statusPo=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$ammountNew = $roww['ammount'];
$ammount = $ammount + $ammountNew;
}}}


$withdrow = 0;
$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=2 AND statusPo=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$ammountNew = $roww['ammount'];
$withdrow = $withdrow + $ammountNew;
}}}

$withdrowPnd = 0;
$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=2 AND statusPo=0";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$ammountNew = $roww['ammount'];
$withdrowPnd = $withdrowPnd + $ammountNew;
}}}


$betExp =0;
$clubQry = "SELECT * FROM user_bits WHERE userid='$userId' AND statusId!=3";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
while($rowwgau = mysqli_fetch_array($clubResult)){
        $betExp = $betExp + ($rowwgau['ammount']);
}
}





$betWin =0;
$clubQry = "SELECT * FROM user_bits WHERE userId='$userId' AND statusId!=3";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
while($rowwgau = mysqli_fetch_array($clubResult)){
    $ansId = $rowwgau['ansId'];
$clubQry = "SELECT * FROM bett_ans WHERE id='$ansId' AND statusId=1";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
while($rowdwga = mysqli_fetch_array($clubResult)){
    $stausId = $rowdwga['statusId'];
        $betWin = $betWin + ($rowwgau['ammount'] * $rowdwga['betRate']);
}}
$clubQry = "SELECT * FROM bett_ans WHERE id='$ansId' AND statusId=3";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
while($rowdwga = mysqli_fetch_array($clubResult)){
    $stausId = $rowdwga['statusId'];
        $betWin = $betWin + $rowwgau['ammount'];
}}

}
}




$transfarBal = 0;
$queryy = "SELECT * FROM transiction WHERE userid='$userId' AND statusId=3";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$ammountNew = $roww['ammount'];
$transfarBal = $ammountNew + $transfarBal;
}}}




$transfarBalToMe = 0;
$query = "SELECT * FROM users WHERE id='$userId'";
$result = mysqli_query($con, $query);

if($result){
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){

$userId =  $row['userId'];


$queryy = "SELECT * FROM transiction WHERE trnsfUserName='$userId' AND statusId=3";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $ammountNew =  $roww['ammount'];
$transfarBalToMe = $ammountNew + $transfarBalToMe;
}}}
}
}
}






$returnBet = 0;
$userId = $_SESSION['logedInUserId'];
$query = "SELECT * FROM users WHERE id='$userId'";
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result)){
$userId =  $row['userId'];
$queryy = "SELECT * FROM users WHERE sopnsorsUserId='$userId'";
$resulyt = mysqli_query($con, $queryy);

if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$userId = $roww['id'];
$queryya = "SELECT * FROM user_bits WHERE userId='$userId' AND statusId=1";
$resulyta = mysqli_query($con, $queryya);
if(mysqli_num_rows($resulyta) > 0){
while($rowwa = mysqli_fetch_array($resulyta)){
        
$userId = $rowwa['ansId'];
$clubQry = "SELECT * FROM bett_ans WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
$clbFetch = mysqli_fetch_array($clubResult);
    $winLos = $clbFetch['statusId'];
    if($winLos != 3){
        $returnBet = $returnBet + ($rowwa['ammount']*0.02);
    }
}

}}} } }
}
}

$balance = ($ammount + $transfarBalToMe + $betWin + $returnBet) - ($withdrow + $withdrowPnd + $transfarBal + $betExp);
$balanceNow = ($ammount + $transfarBalToMe + $betWin + $returnBet) - ($withdrow + $withdrowPnd + $transfarBal + $betExp);

}



?>