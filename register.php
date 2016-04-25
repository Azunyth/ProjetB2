<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Exercice_php_1</title>
        <?php
        session_start();
        include("config.php");
        include("user.php");
        $db = connect();
        ?>
        <link rel="stylesheet" type="text/css" href="registration.css">
    </head>

    <body>
        <h1 class="register-title">Enregistrez-vous</h1>
        <form class="register" method="post" action="register.php">

            <label for="firstname">Prenom</label>
            <input class="register-input" type="text" name="firstname"> <br>
            ​
            <label for="password">Password</label>
            <input class="register-input" type="password" name="password"><br>

            <label for="lastname">Nom</label>
            <input class="register-input" type="text" name="lastname"> <br>
            ​
            <label for="alias">Alias</label>
            <input class="register-input" type="text" name="alias"> <br>

            <label for="email">Email</label>
            <input class="register-input" type="text" name="email"> <br>

            <label for="birthday">Birthday</label>
            <input class="register-input" type="date" name="birthday" placeholder="Date of Birth : YYYY-MM-DD "> <br>
            ​
            <input class="register-button" type="submit"/>
            ​
        </form>

        <?php

        if(isset($_POST['lastname']) && isset($_POST['firstname']) 
            && isset($_POST['alias']) && isset($_POST['password']) 
            && isset($_POST['email']) && isset($_POST['birthday']))
        {
        $alias = trim($_POST['alias']);
        $alias = htmlspecialchars($alias, ENT_QUOTES);
        $alias = stripslashes($alias);

        $pass = trim($_POST['password']);
        $pass = htmlspecialchars($pass, ENT_QUOTES);
        $pass = stripslashes($pass);

        $firstname = trim($_POST['firstname']);
        $firstname = htmlspecialchars($firstname, ENT_QUOTES);
        $firstname = stripslashes($firstname);

        $lastname = trim($_POST['lastname']);
        $lastname = htmlspecialchars($lastname, ENT_QUOTES);
        $lastname = stripslashes($lastname);

        $email = trim($_POST['email']);
        $email = htmlspecialchars($email, ENT_QUOTES);
        $email = stripslashes($email);

        $birthday = trim($_POST['birthday']);
        $birthday = htmlspecialchars($birthday, ENT_QUOTES);
        $birthday = stripslashes($birthday);
            if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                header("url=register.php");
                ?>
                <script type="text/javascript">
                    alert('bad email');
                </script>
                <?php
            }else
            {

                if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birthday))
                {
                    $user = new User($alias, $pass, $firstname,$lastname,$email,$birthday);
                    $user->createUser();
                }else
                {
                    echo "bad birthday";
                }
            }
        }
       
        ?>
    </body>
</html>
