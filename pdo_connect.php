<?php
$db = new PDO('mysql:host=localhost;dbname=classroom', 'root', 'root');

if (!empty($_POST)) {

    if (!empty($_POST['alias']) && (!empty($_POST['pass']))) {

        $alias = trim($_POST['alias']);
        $alias = htmlspecialchars($alias, ENT_QUOTES);
        $alias = stripslashes($alias);

        $pass = trim($_POST['pass']);
        $pass = htmlspecialchars($pass, ENT_QUOTES);
        $pass = stripslashes($pass);

        $results = $db->prepare('SELECT alias_user, password_user
				   FROM user');
        $results->execute(array('alias_user'=>$alias,'password_user'=>$pass));
        $donnees = $results->fetch(PDO::FETCH_ASSOC);


        if ($donnees['password_user'] != $pass) {
            echo "<span class='error'>Bad password or alias, please check that and try again my lord.</span>";
        }
        else {
            $_SESSION['id_user']	=	$donnees['id_user'];
            $_SESSION['lastname']		=	$donnees['lastname'];
            $_SESSION['firstname']		=	$donnees['firstname'];
            $_SESSION['email']	=	$donnees['email'];
            $_SESSION['alias'] 		= 	$donnees['alias'];
            echo 'vous etes connecte';

            // Pour après : redir("index.php");

        }
    } else {
        echo "<span class='error'>Please, fill in all the credentials</span>";
    }
}
?>