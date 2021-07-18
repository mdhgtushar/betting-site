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
<div class="menu-box-title"><a href="index.php">All Games  <span class="col-dng">(
                 <?php 
$queryyv = "SELECT * FROM games WHERE showHide=1 AND statusRan=1";
$resulytv = mysqli_query($con, $queryyv);
if($resulytv){
if(mysqli_num_rows($resulytv) > 0){
        echo mysqli_num_rows($resulytv);
}else{ echo "0"; }}
?>
    
    )</span></a></div>
</div>
<?php 
$queryy = "SELECT * FROM game_type WHERE statusId=1";
$resulyt = mysqli_query($con, $queryy);
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<div class="menu-box">
<div class="menu-box-img"><img src="<?php echo $roww['gameIcon'];?>" alt=""></div>
<div class="menu-box-title"><a href="index.php?gameType=<?php echo $gameType = $roww['id'];?>"><?php echo $roww['gameName'];?> <span class="col-dng">(
                 <?php 
$queryyv = "SELECT * FROM games WHERE statusId=1 AND showHide=1 AND statusRan=1 AND gameType='$gameType'";
$resulytv = mysqli_query($con, $queryyv);
if($resulytv){
if(mysqli_num_rows($resulytv) > 0){
        echo mysqli_num_rows($resulytv);
}else{ echo "0"; }}
?>
    
    )</span></a></div>
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
if(isset($_GET['gameType'])){
    $gameType = $_GET['gameType'];
$queryy = "SELECT * FROM games WHERE statusId=1 AND showHide=1 AND statusRan=1 AND gameType=$gameType";
}else{
$queryy = "SELECT * FROM games WHERE statusId=1 AND showHide=1 AND statusRan=1 ";
}
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$gameid = $roww['id'];
?>
<li class="match-li" id="match_box<?php echo $roww['id'];?>"><span><strong>
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
$queryya = "SELECT * FROM bett_qus WHERE gameId=$gameid AND statusId=1";
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
$queryya = "SELECT * FROM bett_ans WHERE gameId=$gameid AND quesId=$quesId AND statusId!=1";
$resulytae = mysqli_query($con, $queryya);
if($resulytae){
if(mysqli_num_rows($resulytae) > 0){
while($rowwae = mysqli_fetch_array($resulytae)){
?>
<td><a href="#" onclick="ans<?php echo $rowwae['id'];?>()">
<?php  

$answare = $rowwae['answ'];
if($answare == "Team 1"){
    echo $roww['countryOne'];
}elseif($answare == "Team 2"){
    echo $roww['countryTwo'];
}else{
echo $answare;
}
?>
<b> - <?php echo $rowwae['betRate'];?></b></a></td>

<section class="modal-box transform" id="modal-box<?php echo $rowwae['id'];?>">
<div class="modal-cont">
<div class="modal-headr" onclick="ans<?php echo $rowwae['id'];?>()"><h3>Place Beat Option</h3> <p><i class="fa fa-times" aria-hidden="true"></i></p></div>
<div class="modal-tor-info"><img src="https://alldemo.site/demo-20/images/Football_Image1.png" alt=""> 
<strong><?php echo $roww['countryOne'];?> VS <?php echo $roww['countryTwo'];?> ,
<?php echo $roww['tornamName'];?> || 16 Jun , 03:00 am <i class="fa fa-angle-down" aria-hidden="true"></i></strong>
<span class="live-box">Live</span></p></div>
<div class="modal-tor-info"> <?php echo $rowwa['ques'];?></div>
<div class="modal-tor-info"> <?php echo $rowwae['answ'];?> </div>
<div class="modal-tor-info"> <button class="modal-botton" onclick="vaiIntut<?php echo $rowwae['id'];?>(100)">100</button>
 <button class="modal-botton"  onclick="vaiIntut<?php echo $rowwae['id'];?>(200)">200</button> 
 <button  onclick="vaiIntut<?php echo $rowwae['id'];?>(500)" class="modal-botton">500</button>
 <button  onclick="vaiIntut<?php echo $rowwae['id'];?>(1000)" class="modal-botton">1000</button>
 <button  onclick="vaiIntut<?php echo $rowwae['id'];?>(5000)" class="modal-botton">5000</button>
</div>
<form id='bitSubmit<?php echo $rowwae['id'];?>'>
    <input type="hidden" id="userId<?php echo $rowwae['id'];?>" value="<?php echo $_SESSION['logedInUserId'];?>">
    <input type="hidden" id="gameId<?php echo $rowwae['id'];?>" value="<?php echo $roww['id'];?>">
    <input type="hidden" id="quesId<?php echo $rowwae['id'];?>" value="<?php echo $rowwa['id'];?>">
    <input type="hidden" id="answId<?php echo $rowwae['id'];?>" value="<?php echo $rowwae['id'];?>">
<div class="modal-tor-info"> <input class="modal-input" type="number" id="ammount<?php echo $rowwae['id'];?>" onkeyup="vaiIntut<?php echo $rowwae['id'];?>(this.value)" placeholder="Bit Ammount" required></div>

<div class="modal-tor-info"> Total Stake - <b  id="totlStk<?php echo $rowwae['id'];?>">..</b></div>
<div class="modal-tor-info"> Possible Winning - <b  id="posbWin<?php echo $rowwae['id'];?>">..</b></div>
<div class="modal-tor-info"> <input class="modal-input" type="submit" id="bit_submit<?php echo $rowwae['id'];?>" onclick="return confirm('Are you sure to place a bet?')" value="Submit"></div>
</form>
<div>
<p id="Load"></p>
</div>
</div>
</section>
<script>
function vaiIntut<?php echo $rowwae['id'];?>(e){
    var ammount = document.getElementById('ammount<?php echo $rowwae['id'];?>').value = e;

    document.getElementById('totlStk<?php echo $rowwae['id'];?>').innerHTML = e;
    document.getElementById('posbWin<?php echo $rowwae['id'];?>').innerHTML = e * ('<?php echo $rowwae['betRate'];?>');
}


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
var bit_submit = $('#bit_submit<?php echo $rowwae['id'];?>').val();
var userId = $('#userId<?php echo $rowwae['id'];?>').val();
$.post('Actions/transAction.php' , {gameId:gameId, quesId:quesId, 
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
if(isset($_GET['gameType'])){
    $gameType = $_GET['gameType'];
$queryy = "SELECT * FROM games WHERE statusId=2 AND showHide=1 AND statusRan=1 AND gameType=$gameType";
}else{
$queryy = "SELECT * FROM games WHERE statusId=2 AND showHide=1 AND statusRan=1 ";
}
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
$gameid = $roww['id'];
?>
<li class="match-li" id="match_box<?php echo $roww['id'];?>"><span><strong>
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
$queryya = "SELECT * FROM bett_qus WHERE gameId=$gameid AND statusId=1";
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
$queryya = "SELECT * FROM bett_ans WHERE gameId=$gameid AND quesId=$quesId AND statusId!=1";
$resulytae = mysqli_query($con, $queryya);
if($resulytae){
if(mysqli_num_rows($resulytae) > 0){
while($rowwae = mysqli_fetch_array($resulytae)){
?>
<td><a href="#" onclick="ans<?php echo $rowwae['id'];?>()">
<?php  

$answare = $rowwae['answ'];
if($answare == "Team 1"){
    echo $roww['countryOne'];
}elseif($answare == "Team 2"){
    echo $roww['countryTwo'];
}else{
echo $answare;
}
?>
 <b> - <?php echo $rowwae['betRate'];?></b></a></td>

<section class="modal-box transform" id="modal-box<?php echo $rowwae['id'];?>">
<div class="modal-cont">
<div class="modal-headr" onclick="ans<?php echo $rowwae['id'];?>()"><h3>Place Beat Option</h3> <p><i class="fa fa-times" aria-hidden="true"></i></p></div>
<div class="modal-tor-info"><img src="https://alldemo.site/demo-20/images/Football_Image1.png" alt=""> 
<strong><?php echo $roww['countryOne'];?> VS <?php echo $roww['countryTwo'];?> ,
<?php echo $roww['tornamName'];?> || 16 Jun , 03:00 am <i class="fa fa-angle-down" aria-hidden="true"></i></strong>
<span class="live-box">Live</span></p></div>
<div class="modal-tor-info"> <?php echo $rowwa['ques'];?></div>
<div class="modal-tor-info"> <?php echo $rowwae['answ'];?> </div>
<div class="modal-tor-info"> <button class="modal-botton" onclick="vaiIntut<?php echo $rowwae['id'];?>(100)">100</button>
 <button class="modal-botton"  onclick="vaiIntut<?php echo $rowwae['id'];?>(200)">200</button> 
 <button  onclick="vaiIntut<?php echo $rowwae['id'];?>(500)" class="modal-botton">500</button>
 <button  onclick="vaiIntut<?php echo $rowwae['id'];?>(1000)" class="modal-botton">1000</button>
 <button  onclick="vaiIntut<?php echo $rowwae['id'];?>(5000)" class="modal-botton">5000</button>
</div>
<form id='bitSubmit<?php echo $rowwae['id'];?>'>
    <input type="hidden" id="userId<?php echo $rowwae['id'];?>" value="<?php echo $_SESSION['logedInUserId'];?>">
    <input type="hidden" id="gameId<?php echo $rowwae['id'];?>" value="<?php echo $roww['id'];?>">
    <input type="hidden" id="quesId<?php echo $rowwae['id'];?>" value="<?php echo $rowwa['id'];?>">
    <input type="hidden" id="answId<?php echo $rowwae['id'];?>" value="<?php echo $rowwae['id'];?>">
<div class="modal-tor-info"> <input class="modal-input" type="number" id="ammount<?php echo $rowwae['id'];?>" onkeyup="vaiIntut<?php echo $rowwae['id'];?>(this.value)" placeholder="Bit Ammount" required></div>

<div class="modal-tor-info"> Total Stake - <b  id="totlStk<?php echo $rowwae['id'];?>">..</b></div>
<div class="modal-tor-info"> Possible Winning - <b  id="posbWin<?php echo $rowwae['id'];?>">..</b></div>
<div class="modal-tor-info"> <input class="modal-input" type="submit" id="bit_submit<?php echo $rowwae['id'];?>" value="Submit"></div>
</form>
<div>
<p id="Load"></p>
</div>
</div>
</section>
<script>
function vaiIntut<?php echo $rowwae['id'];?>(e){
    var ammount = document.getElementById('ammount<?php echo $rowwae['id'];?>').value = e;

    document.getElementById('totlStk<?php echo $rowwae['id'];?>').innerHTML = e;
    document.getElementById('posbWin<?php echo $rowwae['id'];?>').innerHTML = e * ('<?php echo $rowwae['betRate'];?>');
}


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
var bit_submit = $('#bit_submit<?php echo $rowwae['id'];?>').val();
var userId = $('#userId<?php echo $rowwae['id'];?>').val();
$.post('Actions/transAction.php' , {gameId:gameId, quesId:quesId, 
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


<?php } } } ?>
</ul>
</li>
<?php } } } ?>

</ul>
<br>

</ul>
</div>
</section> <br>
    



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