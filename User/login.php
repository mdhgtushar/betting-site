<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
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
        .login-box{
            max-width: 360px;
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
            border: 2px solid #ddd;
            outline: none;

        }
        input[type="submit"]{
            height: 35px;
            margin-top: 20px;
            border: none;
            background-color: #eee;
            color: #000;
            font-size: 18px;
            cursor: pointer;
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
            color:red;
        }
    </style>
</head>
<body>
    <section class="main-section">
    <div class="login-box">
        <h1>Log In</h1>
        <p class="col-dng">
            Username or Password is incorrect
        </p>
        <form action="Actions/authAction.php" method="post">
            <label for="">User Id</label>
            <input type="text" name="userName" placeholder="User Name">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="login_submit" value="Login">
        </form>
    </div>
    <p>Not have an account?<a href="register.php">Sign Up</a></p>
</section>
</body>
</html>