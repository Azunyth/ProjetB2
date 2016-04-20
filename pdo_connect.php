<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=classroom', 'root', '');

if (!empty($_POST)) {

    if (!empty($_POST['alias']) && (!empty($_POST['pass']))) {
        var_dump($_POST['alias']);
        var_dump($_POST['pass']);
        $alias = trim($_POST['alias']);
        $alias = htmlspecialchars($alias, ENT_QUOTES);
        $alias = stripslashes($alias);

        $pass = trim($_POST['pass']);
        $pass = htmlspecialchars($pass, ENT_QUOTES);
        $pass = stripslashes($pass);

        $results = $db->prepare('SELECT alias_user, password_user
				   FROM user WHERE alias_user = "'.$alias.'" AND password_user = "'.$pass.'"');
        $results->execute();
        $donnees = $results->fetch(PDO::FETCH_ASSOC);
        var_dump($donnees);


        if ($donnees['password_user'] != $pass) {
            echo "<span class='error'>Bad password or alias, please check that and try again my lord.</span>";
        }
        else {
            $_SESSION['password']	=	$donnees['password_user'];
            $_SESSION['alias'] 		= 	$donnees['alias_user'];

           header('Location: index.php');

        }
    } else {
        echo "<span class='error'>Please, fill in all the credentials</span>";
    }
} 
?>