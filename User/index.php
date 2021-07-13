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
                <div class="menu-box-title"><a href="">All Games</a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Football_Image1.png" alt=""></div>
                <div class="menu-box-title"><a href="">Football <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Cricket_Image1.png" alt=""></div>
                <div class="menu-box-title"><a href="">Cricket <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/tennis.png" alt=""></div>
                <div class="menu-box-title"><a href="">Tennis <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/badminton.png" alt=""></div>
                <div class="menu-box-title"><a href="">Badminton <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/virtual.png" alt=""></div>
                <div class="menu-box-title"><a href="">Virtual <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/hockey.png" alt=""></div>
                <div class="menu-box-title"><a href="">Hockey <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Table_Tennis.png" alt=""></div>
                <div class="menu-box-title"><a href="">Table Tennis <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Besball.png" alt=""></div>
                <div class="menu-box-title"><a href="">Besball <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Boxing.png" alt=""></div>
                <div class="menu-box-title"><a href="">Boxing <span class="col-dng">(0)</span></a></div>
            </div>
            <div class="menu-box">
                <div class="menu-box-img"><img src="https://alldemo.site/demo-20/images/Voliball.png" alt=""></div>
                <div class="menu-box-title"><a href="">Voliball <span class="col-dng">(0)</span></a></div>
            </div>
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
$queryy = "SELECT * FROM games WHERE statusId=1";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
    $gameid = $roww['id'];
?>
                            <li class="match-li"><span><strong><?php echo $roww['countryOne'];?> VS <?php echo $roww['countryTwo'];?> ,
                             <?php echo $roww['tornamName'];?> || 16 Jun , 03:00 am <i class="fa fa-angle-down" aria-hidden="true"></i></span></strong>
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
                                                <td onclick="modal()"><a href="#"><input type="button" id="ans" onclick="console.log(this.value)" value="<?php echo $rowwae['answ']; echo ' , '.$quesId;?>"></a></td>
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
                    <ul class="match-ul display" id="allMatches2">
                                                  <?php 
$queryy = "SELECT * FROM games WHERE statusId=2";
$resulyt = mysqli_query($con, $queryy);
if($resulyt){
if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
    $gameid = $roww['id'];
?>
                            <li class="match-li"><span><strong><?php echo $roww['countryOne'];?> VS <?php echo $roww['countryTwo'];?> ,
                             <?php echo $roww['tornamName'];?> || 16 Jun , 03:00 am <i class="fa fa-angle-down" aria-hidden="true"></i></span></strong>
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
                                                <td><a href="#"><?php echo $rowwae['answ'];?></a></td>
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
        text-align: center;
        top:0;
        left: 0;
        right: 0;
        margin:10px 5px;
        display: flex;
        justify-content:center;
        z-index: 200;
            }
            .modal-cont{
                width:400px;
                height:500px;
                background:#fff;
                overflow: scroll;
                text-align:left;
            }
            .modal-headr{
                display: flex;
                justify-content:space-between;
                padding:10px;
                background:#eee;
                border-bottom:2px solid #ddd;
            }
            .live-box{
                background:red;
                color:#fff;
                border-radius:30px;
                padding: 2px 10px;
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

<section class="modal-box display" id="modal-box">
    <div class="modal-cont">
           <div class="modal-headr"><h3>Place Beat Option</h3> <p onclick="modal()"><i class="fa fa-times" aria-hidden="true"></i></p></div>
            <div class="modal-tor-info"><img src="https://alldemo.site/demo-20/images/Football_Image1.png" alt=""> <p>Tokyo Verdy VS Fagiano Okayama , Japan Emperor Cup || 16 Jun , 03:00 am <span class="live-box">Live</span></p></div>
            <div class="modal-tor-info"> <p>Toss win ..?</p></div>
            <div class="modal-tor-info"> <p>Bangladesh</p></div>
            <div class="modal-tor-info"> <button class="modal-botton">100</button> <button class="modal-botton">200</button> <button class="modal-botton">300</button></div>
            <div class="modal-tor-info"> <input class="modal-input" type="number" placeholder="Bit Ammount"></div>
            <div class="modal-tor-info"> <p>Total Stake</p><p>100</p></div>
            <div class="modal-tor-info"> <p>Possible Winning</p><p>2000</p></div>
            <div class="modal-tor-info"> <input class="modal-input" type="submit" value="Submit"></div>

            <div>
                
            </div>
        </div>
</section>



                <script>
                    
     function modal() {
   var element = document.getElementById("modal-box");
   element.classList.toggle("display");
}
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