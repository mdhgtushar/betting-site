<?php 
include"inc/header.php";

?>


<section id="main-content">
<br>

<section class="menu" id="menu">
<div class="menu-button">
<button id="prev" onclick="prev()"> < </button>
</div> 

<div class="menu-boxes" id="boxes">

<div class="menu-box">
<div class="menu-box-title"><a href="profile.php?profileInfo">Profile</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="profile.php?Deposit">Deposit Request</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="profile.php?Transfar">Transfer balance</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="profile.php?widthrow">Withdrow Request</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="profile.php?changePass">Change Password</a></div>
</div>
<div class="menu-box">
<div class="menu-box-title"><a href="logout.php">Logout</a></div>
</div>
</div>
<div class="menu-button" style="right: 0;">
<button onclick="next()"> > </button>
</div>
</section>


<?php 

if(isset($_GET['profileInfo'])){
  include"inc/profile/profileInfo.php";
}elseif(isset($_GET['Deposit'])){
   include"inc/profile/deposit.php";
}elseif(isset($_GET['widthrow'])){
   include"inc/profile/widthrow.php";
}elseif(isset($_GET['profileEdit'])){
   include"inc/profile/profileEdit.php";
}elseif(isset($_GET['Transfar'])){
   include"inc/profile/transfarBal.php";
}elseif(isset($_GET['changePass'])){
   include"inc/profile/changePass.php";
}else{
  include"inc/profile/profileInfo.php";
}
?>



</section> <br>
<?php include"inc/footer.php";?>