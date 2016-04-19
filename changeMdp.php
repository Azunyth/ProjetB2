<?php
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=classroom', "root", "");
    $name = $_SESSION['alias'];
?>

<form class="form" action="changeMdpAction.php" method="post">
    <label>ancien password : <input type="text" name="pass" /></label>
    <label>nouveau password : <input type="text" name="newPass" /></label>
    <label>confirmer password : <input type="text" name="newPassConf" /></label>

    <input type="submit" value="Envoyer" class="btn btn-primary"></p>
</form>
