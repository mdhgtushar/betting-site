<?php include"inc/header.php"?>
<style>
  .h3style{
        padding: 10px;
    background: #eee;
    margin: 8px 0;
  }
</style>

<section id="main-content">
<br>

        <section class="menu" id="menu">
            <div class="menu-button">
                <button id="prev" onclick="prev()"> < </button>
            </div> 
           
            <div class="menu-boxes" id="boxes">

<div class="menu-box">
<div class="menu-box-title"><a href="statement.php?bets">Bets</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="statement.php?deposit">Deposits</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="statement.php?withdrow">Withdrowals</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="statement.php?transiction">Transiction</a></div>
</div>
</div>

<div class="menu-button" style="right: 0;">
                <button onclick="next()"> > </button>
            </div>
</section>

<?php
if(isset($_GET['bets'])){
  include "inc/statement/bets.php";
}elseif(isset($_GET['deposit'])){
  include "inc/statement/deposit.php";
}elseif(isset($_GET['withdrow'])){
  include "inc/statement/withdrow.php";
}elseif(isset($_GET['transiction'])){
  include "inc/statement/transiction.php";
}else{
  include "inc/statement/bets.php";
}
?>



</section> <br>
<?php include"inc/footer.php";?>