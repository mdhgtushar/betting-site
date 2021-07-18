<?php 
session_start();
include"Actions/connect.php";
include"Actions/balance.php";
if(!isset($_SESSION['logedInUserId'])){
echo '<script>window.location.href = "login.php";</script>';
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
                <p class="sidebar_cut"  onclick="sidebar()"><i class="fa fa-times" aria-hidden="true"></i></p>
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
        
<?php



$queryy = "SELECT * FROM site_color WHERE id=1";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color1 =  $roww['color'];
}}

$queryy = "SELECT * FROM site_color WHERE id=2";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color2 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=3";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color3 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=4";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color4 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=5";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color5 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=6";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color6 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=7";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color7 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=8";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color8 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=9";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color9 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=10";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color10 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=11";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color11 =  $roww['color'];
}}
$queryy = "SELECT * FROM site_color WHERE id=12";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
   $color12 =  $roww['color'];
}}
?>
        <style>
            *{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: Arial, Helvetica, sans-serif;
text-decoration: none;
list-style-type: none;
}
body{
background: <?php echo $color1;?>;
color: <?php echo $color3;?>;
}
.container{
max-width: 1200px;
margin: 0 auto;
background: <?php echo $color1;?>;
padding: 0 20px;
}
#header{
display: flex;
justify-content: space-between;
align-items: center;
border-bottom: 1px solid #dddd;
background:<?php echo $color2;?>;
padding:0 10px;
}
.sm-heder{
    padding: 10px 0;
}
.header-logo{ font-size: 25px;}
.header-logo i{ color:<?php echo $color3;?>}
.header-logo a{ color:<?php echo $color3;?>}
.header-nav{}
.header-time{ color:<?php echo $color3;?>}
.header-nav ul{}
.header-nav ul li{ display: inline-block;}
.header-nav ul li a{display: block; padding: 5px 10px;
     background: <?php echo $color5;?>;color: <?php echo $color4;?>;
     transition: .5s;}
.header-nav ul li a:hover{
    background-color: #ddd;
    color: #333;
}
.sm-block ul li, .sm-block ul li a{
display: block;
margin-bottom: 2px;
}
.sidebar{
    position: fixed;
    left: 0;
    top:0;
    height: 100vh;
    overflow-y: scroll;
    padding: 10px;
    width: 300px;
    background-color: #fff;
    z-index: 1000;
    transition: .3s;
}
.marquee{
color: <?php echo $color6;?>;
background: <?php echo $color7;?>;
border-left: 2px solid #000;
border-right: 2px solid #000;
font-size: 15px;
border-bottom: 1px solid #0000;
padding:5px;
display: flex;
}
#footer{
display: flex;
justify-content: space-between;
align-items: center;
height: 200px;
border-top: 1px solid #dddd;
border-bottom: 1px solid #dddd;
text-align: center;
background: <?php echo $color2;?>;
padding: 0 30px ;
}
.footer-info{
max-width: 300px;
}
.footer-menu{}
.footer-menu ul{}
.footer-menu ul li{}
.footer-menu ul li a{ padding: 5px 10px; 
     background: <?php echo $color5;?>;color: <?php echo $color4;?>;
    display: block; margin: 5px;}
.footer-text{
max-width: 300px;color: red;
}
#main-content{
min-height: calc(100vh - 350px);
padding:5px;
}

.live-match h3{
padding: 10px;
background: <?php echo $color9;?>;
color: <?php echo $color8;?>;
cursor: pointer;
}
.match-header{
display: flex;
justify-content: space-between;
}
.match-ul{
border: 1px solid #ddd;
margin: 5px 0;
}
.match-ul .match-li span{
padding: 10px;
background:<?php echo $color2;?>;
color:<?php echo $color3;?>;
display: block;
}
.match-ul .match-li ul li{
padding: 10px;
margin: 5px 0 ;
}
.match-statistic-result{
background: #ddd;
margin: 5px 0;
}
.match-statistic-result a{
padding: 5px 10px;
background: <?php echo $color10;?>; 
display: inline-block;
color: <?php echo $color11;?>;
}
.match-statistic-result a b{
color: <?php echo $color12;?>;
}
.match-statistic-result p{
padding:  10px;
}
.display{
display: none!important;
}
.transform{
    transform: translate(-300px);
}
.user-menu{padding: 5px 0;border-bottom: 1px solid #ddd;}
.menu{display: flex;align-items: center; border-bottom: 1px solid #dddd;
    overflow: hidden;position: relative;}
.menu-box{display: flex;align-items: center; text-align: center; border: 1px solid #ddd; padding: 5px 10px;transition: .5s;
     margin: 5px;margin-left: 0;
     background: <?php echo $color5;?>;color: <?php echo $color4;?>;
    }
.menu-box-img{float: left;}
.menu-box-img img{height: 20px;}
.menu-box-title{float: left;padding: 0 5px;width: max-content;}
.menu-box-title a{color: <?php echo $color4;?>;}
.scrollbarhide::-webkit-scrollbar {
  display: none;
}
.col-suc{
    color: green;
    padding: 20px;
    background: #eee;
    overflow: hidden;
    margin: 10px 0;
}
.col-dng{
    color: red;
    padding: 20px;
    background: #eee;
    overflow: hidden;
    margin: 10px 0;
}
.menu-button {
    position: absolute;
    z-index: 100;
}

   #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  color: #fff;
}

#customers tr:nth-child(even){background-color: <?php echo $color2;?>;color:#000}

#customers tr:hover {background-color: #000;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
}
.menu-button button{
    padding: 10px;
    border: none;
    cursor: pointer;
}
.menu-boxes{
    display: flex;
    transform: translate(30px);
    transition: .3s;
}

.sidebar_cut{
    float:right;padding:10px;
     background: <?php echo $color5;?>;color: <?php echo $color4;?>;
    margin:5px 0;
    cursor:pointer
}


.modal-box{
position: fixed;
    left: 0;
    top: 0;
    height: 100vh;
    overflow-y: scroll;
    padding: 10px;
    width: 300px;
    background-color:<?php echo $color1;?>;
    z-index: 1000;
    transition: .3s;
}
}
.modal-cont{
max-width: 500px;;
height:auto;
background:#fff;
text-align:left;
}
.modal-headr{
display: flex;
justify-content:space-between;
    background-color:<?php echo $color9;?>;
   color:<?php echo $color8;?>;
border-bottom:2px solid #ddd;
}
.live-box{
background: red !important;;
color:#fff;
border-radius:30px;
padding: 2px 10px!important;
display: inline!important;
}
.com-box{
background:green;
color:#fff;
border-radius:30px;
padding: 2px 10px;
}
.modal-tor-info img{
float: left;
height:30px;
padding:5px
}
.modal-tor-info{
padding:10px;
border-bottom:1px solid #ddd;
overflow: hidden;
}
.modal-botton{
background:#eee;
border:1px solid #ddd;
padding:5px 10px;
float: left;
overflow: hidden;
cursor:pointer;
margin: 0 5px;
border-radius:30px;
}
.modal-input{
padding:10px;
border:1px solid #ddd;
outline:0;
}




@media screen and (max-width: 480px) {
 

#footer{
display: block;
padding: 30px 0;
height: initial;
color:<?php echo $color3;?>;
}
.footer-info, .footer-text, .footer-menu{
    max-width: initial;
    padding: 20px 0;
}
.container{
    padding: 0px;
}
}
        </style>