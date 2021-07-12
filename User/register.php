<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    </style>
</head>
<body>
    <section class="main-section">
    <div class="signup-box">
        <h1>Sign Up</h1>
        <form action="Actions/authAction.php" method="post">
            <label for="">Full Name</label>
            <input type="text" placeholder="Name" name="fullName">
            <label for="">Mobile Number</label>
            <input type="number" placeholder="Mobile Number" name="mobileNumber">
            <label for="">Select Club</label>
                <select name="clubId" id="Club">
                <option value="Club">Select Club</option>
                <option value="green club">GREEN CLUB</option>
                <option value="green club">GREEN CLUB</option>
            </select>
            
            <label for="">Password</label>
            <input type="password" placeholder="password" name="password">
            <label for="">User Id</label>
            <input type="text" placeholder="User Name" name="userName">
            <label for="">Email</label>
            <input type="email" placeholder="Email Id" name="email">
            <label for="">Sponsor's Username</label>
            <input type="text" placeholder="Optional" name="sponsorId">
            <label for="">Confirm Password</label>
            <input type="password" placeholder="Confirm Password" name="cpassword">
            <label for="">Register </label>
            <input type="submit" name="register_submit" value="Register Now">
        </form>
    </div>
    <p>Already have an account?<a href="login.php">Login</a></p>
    
</section>
</body>
</html>