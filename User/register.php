<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title>sign up</title>
<style>
*{
box-sizing: border-box;
}
body{
background-color: #f9f9f9;
font-family: Arial, Helvetica, sans-serif;
}
.main-section{
margin: 0 auto;

}
.signup-box{
width: 360px;
margin: auto;
background-color: #ffff;
border-radius: 5px;
overflow: hidden;
}
h1{
text-align: center;
padding-top: 15px;
}
form{
margin: 20px;
}
form label{
display: flex;
margin-top: 20px;
font-size: 18px;

}
form input{
width: 100%;
padding: 7px;
border: none;
border: 1px solid #ddd;
outline: none;

}
select{
width: 100%;
padding: 7px;
border: none;
border: 1px solid #ddd;
outline: none;
}
input[type="button"]{
height: 35px;
margin-top: 20px;
border: none;
background-color: #eee;
color: #000;
font-size: 18px;
}
p{
text-align: center;
margin-top: 4px;
font-size: 15px;
color: #000;


}
p a{
color: #999;
}

.col-dng{
    color: red;
}
</style>
</head>
<body>
<section class="main-section">
<div class="signup-box">
<h1>Sign Up</h1>
<p class="col-dng" id="Load"> </p>
<form  id="submitSign">
<label for="">Full Name</label>
<input type="text" placeholder="Name" id="fullName" required>
<label for="">User Id</label>
<input type="text" placeholder="User Name" id="userName" required>
<label for="">Mobile Number</label>
<input type="number" placeholder="Mobile Number" id="mobileNumber" required>
<label for="">Email</label>
<input type="email" placeholder="Email Id" id="email" required>
<label for="">Select Club</label>

<select id="clubId" required>
<option value="0">Select Club</option>
<?php
include"Actions/connect.php";
$queryy = "SELECT * FROM clubs";
$resulty = mysqli_query($con, $queryy);

if($resulty){
if(mysqli_num_rows($resulty) > 0){
while($rowy = mysqli_fetch_array($resulty)){
?>
<option value="<?php echo $rowy['id'];?>"><?php echo $rowy['clubName'];?></option>
<?php
}}}
?>
</select>

<label for="">Sponsor's Username</label>
<input type="text" placeholder="Optional" id="sponsorId">
<label for="">Password</label>
<input type="password" placeholder="password" id="password" required>
<label for="">Confirm Password</label>
<input type="password" placeholder="Confirm Password" id="cpassword" required>
<label for="">Register </label>
<input type="submit" id="register_submit" value="Register Now">
</form>
</div>
<p>Already have an account?<a href="login.php">Login</a></p>

</section>

<script>
     $('#submitSign').submit(function(e){
            e.preventDefault()
            var fullName = $('#fullName').val();
            var mobileNumber = $('#mobileNumber').val();
            var clubId = $('#clubId').val();
            var password = $('#password').val();
            var userName = $('#userName').val();
            var email = $('#email').val();
            var sponsorId = $('#sponsorId').val();
            var cpassword = $('#cpassword').val();
            var register_submit = $('#register_submit').val();
            
            $.post('Actions/authAction.php' , {fullName:fullName, mobileNumber:mobileNumber, clubId:clubId, 
            password:password, userName:userName, email:email,  sponsorId:sponsorId ,cpassword:cpassword,  register_submit:register_submit}, function(data){
                $('#Load').html(data);
            })
            
        })
</script>
</body>
</html>