<?php include"inc/header.php"?>
<style>
.col-dng{padding: 0 !important;background: none !important;}
</style>



<section id="main-content">
<br>
<div class="live-match">

<section class="main-section">

<div class="header-time" ><p id="show">Time loading..</p>
<div class="marquee">
<marquee>
<p><strong>Wellcome to our site</strong></p>
</marquee>
</div>
</section>

<section class="menu" id="menu">
<div class="menu-button">
<button id="prev" onclick="prev()"> < </button>
</div> 

<div class="menu-boxes" id="boxes">

<div class="menu-box">
<div class="menu-box-img"><img src="https://alldemo.site/demo-20/img/Star.png" alt=""></div>
<div class="menu-box-title"><a href="index.php">All Games</a></div>
</div>
<?php 
$queryy = "SELECT * FROM game_type WHERE statusId=1";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<div class="menu-box">
<div class="menu-box-img"><img src="<?php echo $roww['gameIcon'];?>" alt=""></div>
<div class="menu-box-title"><a href="index.php"><?php echo $roww['gameName'];?> <span class="col-dng">(0)</span></a></div>
</div>
<?php } }?>
</div>
<div class="menu-button" style="right: 0;">
<button onclick="next()"> > </button>
</div>
</section>
<br/>
<ul>
<li><h3 class="match-header" onclick="allMatchesShow()"><span>Live Matches</span> <p>
<i class="fa fa-angle-down" aria-hidden="true"></i></p></h3></li>
<ul class="match-ul displaya" id="allMatches">
<?php 
$queryy = "SELECT * FROM games WHERE statusId=1 AND showHide=1 AND statusRan=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$gameid = $roww['id'];
?>
<li class="match-li"><span><strong>
       <?php 
$userId = $roww['gameType'];
$clubQry = "SELECT * FROM game_type WHERE id='$userId'";
$clubResult = mysqli_query($con, $clubQry);
if(mysqli_num_rows($clubResult) > 0){
    $clbFetch = mysqli_fetch_array($clubResult);
    ?>
    <img src=" <?php echo $clbFetch['gameIcon'];?>" style="height:15px" alt="">
    <?php
}
?>

<?php echo $roww['countryOne'];?> VS <?php echo $roww['countryTwo'];?> ,
<?php echo $roww['tornamName'];?> || <?php echo $roww['gameDay'];?> , <?php echo $roww['gameTime'];?> <i class="fa fa-angle-down" aria-hidden="true"></i></span></strong>
<ul>
<?php 
$queryya = "SELECT * FROM bett_qus WHERE gameId=$gameid";
$resulyta = mysqli_query($con, $queryya);
if($resulyta){
if(mysqli_num_rows($resulyta) > 0){
while($rowwa = mysqli_fetch_array($resulyta)){
$quesId = $rowwa['id'];
?>
<li>
<div class="match-statistic" id='quesBox<?php echo $quesId?>'>
<p><?php echo $rowwa['ques'];?></p>
<div class="match-statistic-result">
<table>
<tr>
<?php 
$queryya = "SELECT * FROM bett_ans WHERE gameId=$gameid AND quesId=$quesId";
$resulytae = mysqli_query($con, $queryya);
if($resulytae){
if(mysqli_num_rows($resulytae) > 0){
while($rowwae = mysqli_fetch_array($resulytae)){
?>
<td><a href="#" onclick="ans<?php echo $rowwae['id'];?>()"><?php echo $rowwae['answ'];?></a></td>

<section class="modal-box transform" id="modal-box<?php echo $rowwae['id'];?>">
<div class="modal-cont">
<div class="modal-headr" onclick="ans<?php echo $rowwae['id'];?>()"><h3>Place Beat Option</h3> <p><i class="fa fa-times" aria-hidden="true"></i></p></div>
<div class="modal-tor-info"><img src="https://alldemo.site/demo-20/images/Football_Image1.png" alt=""> 
<strong><?php echo $roww['countryOne'];?> VS <?php echo $roww['countryTwo'];?> ,
<?php echo $roww['tornamName'];?> || 16 Jun , 03:00 am <i class="fa fa-angle-down" aria-hidden="true"></i></strong>
<span class="live-box">Live</span></p></div>
<div class="modal-tor-info"> <?php echo $rowwa['ques'];?></div>
<div class="modal-tor-info"> <?php echo $rowwae['answ'];?></div>
<div class="modal-tor-info"> <button class="modal-botton">100</button> <button class="modal-botton">200</button> <button class="modal-botton">300</button></div>
<form id='bitSubmit<?php echo $rowwae['id'];?>'>
    <input type="hidden" id="userId<?php echo $rowwae['id'];?>" value="<?php echo $_SESSION['logedInUserId'];?>">
    <input type="hidden" id="gameId<?php echo $rowwae['id'];?>" value="<?php echo $roww['id'];?>">
    <input type="hidden" id="quesId<?php echo $rowwae['id'];?>" value="<?php echo $rowwa['id'];?>">
    <input type="hidden" id="answId<?php echo $rowwae['id'];?>" value="<?php echo $rowwae['id'];?>">
<div class="modal-tor-info"> <input class="modal-input" type="number" id="ammount<?php echo $rowwae['id'];?>" placeholder="Bit Ammount" required></div>

<div class="modal-tor-info"> Total Stake - 100</div>
<div class="modal-tor-info"> Possible Winning - 2000</div>
<div class="modal-tor-info"> <input class="modal-input" type="submit" id="bit_submit" value="Submit"></div>
</form>
<div>
<p id="Load"></p>
</div>
</div>
</section>
<script>
function ans<?php echo $rowwae['id'];?>(){
var element = document.getElementById("modal-box<?php echo $rowwae['id'];?>");
element.classList.toggle("transform");
}

$('#bitSubmit<?php echo $rowwae['id'];?>').submit(function(e){
e.preventDefault()
var gameId = $('#gameId<?php echo $rowwae['id'];?>').val();
var quesId = $('#quesId<?php echo $rowwae['id'];?>').val();
var answId = $('#answId<?php echo $rowwae['id'];?>').val();
var ammount = $('#ammount<?php echo $rowwae['id'];?>').val();
var bit_submit = $('#bit_submit').val();
var userId = $('#userId<?php echo $rowwae['id'];?>').val();
$.post('Actions/bits.php' , {gameId:gameId, quesId:quesId, 
answId:answId, ammount:ammount, bit_submit:bit_submit, userId:userId}, function(data){
$('#Load').html(data);
})
})
</script>
<?php } } } ?>

</tr>
</table>
</div>
</div>
</li>



<script>
function qusSubmit<?php echo $quesId?>(){

}
</script>
<?php } } } ?>
</ul>
</li>

<?php } } } ?>


</ul>
<br>
<li><h3 class="match-header" onclick="allMatchesShow2()"><span>Upcomming Matches</span> <p>
<i class="fa fa-angle-down" aria-hidden="true"></i></p></h3></li>
<ul class="match-ul displaya" id="allMatches2">
<?php 
$queryy = "SELECT * FROM games WHERE statusId=2 AND showHide=1 AND statusRan=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$gameid = $roww['id'];
?>
<li class="match-li">
    

<span><strong><?php echo $roww['countryOne'];?> VS <?php echo $roww['countryTwo'];?> ,
<?php echo $roww['tornamName'];?> || 16 Jun , 03:00 am <i class="fa fa-angle-down" aria-hidden="true"></i></strong></span>
<ul>
<?php 
$queryya = "SELECT * FROM bett_qus WHERE gameId=$gameid";
$resulyta = mysqli_query($con, $queryya);
if($resulyta){
if(mysqli_num_rows($resulyta) > 0){
while($rowwa = mysqli_fetch_array($resulyta)){
$quesId = $rowwa['id'];
?>

<li>
<div class="match-statistic">
<p><?php echo $rowwa['ques'];?></p>
<div class="match-statistic-result">
<table>
<tr>
<?php 
$queryya = "SELECT * FROM bett_ans WHERE gameId=$gameid AND quesId=$quesId";
$resulytae = mysqli_query($con, $queryya);
if($resulytae){
if(mysqli_num_rows($resulytae) > 0){
while($rowwae = mysqli_fetch_array($resulytae)){

?>
<td><a href="#" onclick="ans<?php echo $rowwae['id'];?>()"><?php echo $rowwae['answ'];?></a></td>

<section class="modal-box display" id="modal-box<?php echo $rowwae['id'];?>">
<div class="modal-cont">
<div class="modal-headr" onclick="ans<?php echo $rowwae['id'];?>()"><h3>Place Beat Option</h3> <p><i class="fa fa-times" aria-hidden="true"></i></p></div>
<div class="modal-tor-info"><img src="https://alldemo.site/demo-20/images/Football_Image1.png" alt=""> 
<strong><?php echo $roww['countryOne'];?> VS <?php echo $roww['countryTwo'];?> ,
<?php echo $roww['tornamName'];?> || 16 Jun , 03:00 am <i class="fa fa-angle-down" aria-hidden="true"></i></strong>
<span class="live-box">Live</span></p></div>
<div class="modal-tor-info"> <?php echo $rowwa['ques'];?></div>
<div class="modal-tor-info"> <?php echo $rowwae['answ'];?></div>
<div class="modal-tor-info"> <button class="modal-botton">100</button> <button class="modal-botton">200</button> <button class="modal-botton">300</button></div>
<div class="modal-tor-info"> <input class="modal-input" type="number" placeholder="Bit Ammount"></div>
<div class="modal-tor-info"> Total Stake - 100</div>
<div class="modal-tor-info"> Possible Winning - 2000</div>
<div class="modal-tor-info"> <input class="modal-input" type="submit" value="Submit"></div>

<div>

</div>
</div>
</section>
<script>
function ans<?php echo $rowwae['id'];?>(){
var element = document.getElementById("modal-box<?php echo $rowwae['id'];?>");
element.classList.toggle("display");
}
</script>

<?php } } } ?>

</tr>
</table>
</div>
</div>
</li>

<?php } } } ?>
</ul>
</li>

<?php } } } ?>


</ul>
</div>
</section> <br>

<style>
.modal-box{
position: fixed;
    left: 0;
    top: 0;
    height: 100vh;
    overflow-y: scroll;
    padding: 10px;
    width: 300px;
    background-color: #fff;
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
background:#eee;
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
</style>



<script>

function showTime(){
var currentdate = new Date(); 
var hours = currentdate.getHours();
const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var month = currentdate.getMonth();

var ampm = hours >= 12 ? ' pm' : ' am';
hours = hours % 12;
hours = hours ? hours : 12; // the hour '0' should be '12'
var datetime =  currentdate.getDate() + " "
+ months[month]  + " "  
+ hours + ":"  
+ currentdate.getMinutes() + ":" 
+ currentdate.getSeconds() + ampm;

document.getElementById('show').innerHTML = datetime;
}
setInterval('showTime()', 1000)

</script>
<?php include"inc/footer.php";?>