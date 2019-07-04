<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../styles/main.css" rel="stylesheet"/>
        <script src="../script/jquery-1.10.2.min.js"></script>
        <script src="../script/main.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login_Registration</title>
    </head>
    <body>
        <div id="box">
                <button id="login_btn">LOGIN</button>
                <button id="signup_btn">SIGN UP</button>
                <div id="footer">ALL RIGHTS RESERVED "MAGEBIT" 2016</div>
            <div id="main"></div>
            <form method="post">    
                <div id="loginform"> 
                        <div id="logo">         
                            <img id="logo" src="../images/logo.png" alt="logo"/>
                        </div>
                    <h1>LOGIN</h1>
                       <hr>
                    <input type="text" name="username" placeholder="Username *"/><br>
                    <input type="password" name="password" placeholder="Password *"/><br>
                    <p><button type="submit" class="btn" name="login_user">LOGIN</button><p><a href="forgot.php" class="pull-right"> Forgot?</a></p></p>
            </form>
                </div>
            <form method="post">   
            <div id="signupform">
                        <div id="logo2">         
                            <img id="logo2" src="../images/logo.png" alt="logo"/>
                        </div>
                 <h1>SIGN UP</h1>
                <hr>
                <input  type="text" name="username" placeholder="Name *"/><br>
                <input type="email" name="email" placeholder="Email *"/><br>
                <input type="password" name="password" placeholder="Password *"/><br>
                <button type="submit" class="btn" name="reg_user">SIGN UP</button>
            </form>
                </div>
                <div id="login_msg">Have an account? <hr><br><span id="small_text">Lorem ipsum dolor, sit amet 
                    consectetur adipisicing elit.</span>
                </div>
                <div id="signup_msg">Don't have an account? <hr><br><span id="small_text">Lorem ipsum dolor sit amet,
                    <br>consectetur adipiscing elit, sed do<br>eiusmod tempor
                    incididunt ut labore et<br> dolore magna aliqua.</span><br><br>
                </div>
                <!-- <div id="footer">ALL RIGHTS RESERVED "MAGEBIT" 2016</div> -->
        </div>
        
    </body>
</html>