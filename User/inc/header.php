<?php 
session_start();
include"Actions/connect.php";
if(!isset($_SESSION['logedInUserId'])){
echo '<script>window.location.href = "login.php";</script>';
}

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

$balance = ($ammount + $transfarBalToMe) - ($withdrow + $withdrowPnd + $transfarBal);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="container">
        <section id="header">
            <div class="sm-heder">
            <div class="header-logo"><i class="fa fa-bars" aria-hidden="true" style="cursor:pointer;" onclick="sidebar()"></i> <a href="index.php">BETTING</a></div>
           
            </div>
            </div>
            <div class="header-nav">
                <ul>
                    <?php if(isset( $_SESSION['logedInUserId'])){ ?>
                    <li><a href="profile.php">Profile (<?php echo $balance; ?>tk)</a></li>
                    <li><a href="profile.php?Deposit">Deposit</a></li>
                    <?php }else{?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <?php }?>
                    <?php ?>
                </ul>
            </div>
        </section>
        

        <section class="sidebar transform" id="sidebar">
                        <section class="user-menu">
            <div class="header-nav sm-block">
                <div style="overflow:hidden;">
                <p style="float:right;padding:10px;background:#eee;margin:5px 0;cursor:pointer"  onclick="sidebar()"><i class="fa fa-times" aria-hidden="true"></i></p>
                </div>
                 <ul>
                    <?php if(isset( $_SESSION['logedInUserId'])){ ?>
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="inbox.php">Inbox</a></li> -->
                    <li><a href="live_sports.php">Live Sports</a></li>
                    <li><a href="statement.php">My Statement</a></li>
                    <li><a href="sponsor.php">My Sponsor</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php }else{?>
                     <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                     <?php }?>
                </ul>
            </div>
        </section>
        </section>
        