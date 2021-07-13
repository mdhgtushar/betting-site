<?php include"inc/header.php"?>


<section id="main-content">
<br>

        <section class="menu" id="menu">
            <div class="menu-button">
                <button id="prev" onclick="prev()"> < </button>
            </div> 
           
            <div class="menu-boxes" id="boxes">

<div class="menu-box">
<div class="menu-box-title"><a href="inbox.php?allMessages">All Messages</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="inbox.php?myMessages">My Message</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="inbox.php?newMessage">Send Message</a></div>
</div>
</div>
            <div class="menu-button" style="right: 0;">
                <button onclick="next()"> > </button>
            </div>
</section>

<?php 

if(isset($_GET['allMessages'])){
  include"inc/inbox/allMessages.php";
}elseif(isset($_GET['myMessages'])){
   include"inc/inbox/myMessages.php";
}elseif(isset($_GET['newMessage'])){
   include"inc/inbox/newMessage.php";
}else{
  include"inc/inbox/allMessages.php";
}
?>



</section> <br>
<?php include"inc/footer.php";?>