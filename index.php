<html>
    <head>
        <meta charset="utf-8"/>
         <link rel="stylesheet" type="text/css" href="connect.css">
    </head>

<?php
session_start();
include("config.php");
include("user.php");
$db = connect();

?>
    <div id="container">
        <form class="login-form" method="post" action="index.php">
            <div class="header">
            <h1>Login </h1>
            
            </div>

            <div class="content">
                
                <input class="input username" type="text" name="alias" placeholder="alias"> <br>
                <div class="user-icon"></div>
                
                <input class="input password" type="password" name="password" placeholder="password">
                <div class="pass-icon"></div> 
            </div>

            <div class="footer">
            <input class="button" type="submit"/>
            <a type="submit" name="submit" value="Register" class="register" href="register.php">Register</a>
            </div>

        </form>
    </div>
    <?php
    if(isset($_POST['alias']) && isset($_POST['password'])){

        $user = new User($_POST['alias'],$_POST['password']);
        $user->connectUser();
    }
    ?>
</html>
