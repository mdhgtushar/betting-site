<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="container">
        <section id="header">
            <div class="sm-heder">
            <div class="header-logo">Betting</div>
            <div class="header-time"><p id="show">Time loading..</p>


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
            </div>
            </div>
            <div class="header-nav">
                <ul>
                    <?php if(isset( $_SESSION['logedInUserId'])){ ?>
                    <li><a href="profile.php">Profile (00.00tk)</a></li>
                    <li><a href="logout.php">logout</a></li>
                    <?php }else{?>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <?php }?>
                    <?php ?>
                </ul>
            </div>
        </section>
                    <?php if(isset( $_SESSION['logedInUserId'])){ ?>
        <section class="user-menu">
            <div class="header-nav sm-block">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="inbox.php">Inbox</a></li>
                    <li><a href="live_sports.php">Live Sports</a></li>
                    <li><a href="statement.php">My Statement</a></li>
                    <li><a href="sponsor.php">My Sponsor</a></li>
                </ul>
            </div>
        </section> 
        <?php }?>
        