<?php 
session_start();
include"Actions/connect.php";
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
<style>
    .sub-menu{
        margin-left:10px
    }
</style>
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
            <div class="header-logo"><i class="fa fa-bars" aria-hidden="true" style="cursor:pointer;" onclick="sidebar()"></i> <a href="index.php">Admin</a></div>
           
            </div>
            </div>
            <div class="header-nav">
                <ul>
                    <li><a href="deposit.php">Deposit (0)</a></li>
                    <li><a href="withdrow.php">Widthrow (0)</a></li>
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
                    <li><a href="index.php">Dashboard </a></li>
                    <li><a href="allUser.php">All User </a></li>
                    <li class=""><a href="sponsor.php"> Sponsor List </a></li>
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" onclick="menuMsg()"> Message <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="sub-menu display" id="menuMsg">
                            <li><a href="public-messages-sent.php">Public Send Message</a></li>
                            <li><a href="private-messages-sent.php">Private Send Message</a></li>
                            <li><a href="received-message.php">Received Message</a></li>
                            <li><a href="contact-message.php">Contact Message</a></li>

                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" onclick="menuClb()"> Manage Club <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="sub-menu display" id="menuClb">
                            <li><a href="club_list.php">Club List</a></li>
                            <li><a href="">Club Withdrow</a></li>
                            <li><a href="">Received Message</a></li>
                            <li><a href="">Send Message</a></li>
                            <li><a href="">Club Comission</a></li>
                        </ul>
                    </li>

                    <li class=""><a href="game.php"> Game List </a> </li>
                    <li class=""><a href="auto_stack.php"> Auto Stake Manage </a></li>
                    <li class=""> <a href="game_finished.php"> Finished Game List </a></li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" onclick="menuBet()"> All Bet List <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="sub-menu display" id="menuBet">
                            <li><a href="game_bet.php">Game Bet List</a></li>
                            <li><a href="ludu_oddBet.php">Ludu odd Bet List</a></li>
                            <li><a href="ludu_oddRate.php">Ludu odd Rate</a></li>
                            <li><a href="coin.php">Coin Bet List</a></li>
                            <li><a href="coin_rate.php">Coin Rate</a></li>
                        </ul>
                    </li>


                    <li class=""> <a href="deposit.php"> Deposit List </a> </li>
                    <li class=""> <a href="transfar.php"> Transfar List </a> </li>
                    <li class="">  <a href="withdrow.php"> Withdrow List </a> </li>
                    <li class=""> <a href="paymentOption.php"> Payment Options </a>  </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" onclick="menuSet()">Website settions <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="sub-menu display" id="menuSet">
                            <li><a href="font-fontawesome.html">Font Awesome</a></li>
                            <li><a href="font-themify.html">Themefy Icons</a></li>
                        </ul>
                    </li>
                    <li> <a href="widgets.html">  Admin List </a> </li>
                    
                </ul>
            </div>
        </section>
        </section>
        

<script>
function menuMsg() {
var element = document.getElementById("menuMsg");
element.classList.toggle("display");
}
function menuClb() {
var element = document.getElementById("menuClb");
element.classList.toggle("display");
}
function menuBet() {
var element = document.getElementById("menuBet");
element.classList.toggle("display");
}
function menuSet() {
var element = document.getElementById("menuSet");
element.classList.toggle("display");
}
</script>