<?php
$db = new PDO('mysql:host=localhost;dbname=classroom', 'root', 'root');

if (!empty($_POST)) {

    if (!empty($_POST['alias']) && (!empty($_POST['pass']) && (!empty($_POST['firstname'])) && (!empty($_POST['lastname'])) && (!empty($_POST['email'])) && (!empty($_POST['DOB'])))) {

        $alias = trim($_POST['alias']);
        $alias = htmlspecialchars($alias, ENT_QUOTES);
        $alias = stripslashes($alias);

        $pass = trim($_POST['pass']);
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
        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            header("url=register.php");
            echo "bad email";
        } else {

        }
        $birthday = trim($_POST['DOB']);
        $birthday = htmlspecialchars($birthday, ENT_QUOTES);
        $birthday = stripslashes($birthday);
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birthday))
        {
            $query = $db->prepare('INSERT INTO user (id_user, firstname_user, password_user, lastname_user,
        birthday_user, alias_user, email_user)
        VALUES (" ", :firstname, :pass, :lastname, :birthday, :alias, :email)');
            $query->bindValue(':alias', $alias, PDO::PARAM_STR);
            $query->bindValue(':pass', $pass, PDO::PARAM_INT);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $query->bindValue(':birthday', $birthday, PDO::PARAM_STR);
            $query->execute();
            header("refresh:3;url=connexion.php");
            echo "Registration complete ! Please wait, you're going to be redirected to the connexion area.";
        }else{
            echo "bad birthday format : please use : YYYY-MM-DD.";
        }
        } else {
            echo "<span class='error'>Please, fill in all the credentials</span>";
        }
}
        ?>