<?php
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=classroom', "root", "");
    $pass = $_POST['pass'];
    $newPass = $_POST['newPass'];
    $newPassConf = $_POST['newPassConf'];

    $name = $_SESSION['alias'];

    $sql = "select password_user from user where alias_user ='".$name."'";
    $req1 = $db->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $req1->execute();

    while($datafile = $req1->fetch())
    {
        $oldPass = $datafile['password_user'];
    }

    if($pass == $oldPass){
        if($newPass == $newPassConf){
            $sql2 = "UPDATE user SET password_user = :newPass WHERE alias_user = :alias";
            $stmt = $db->prepare($sql2);

            $stmt->bindParam(':newPass', $newPass, PDO::PARAM_STR);
            $stmt->bindParam(':alias', $name, PDO::PARAM_STR);

            $stmt->execute();

            header('Location: profil.php');
        }else{
            ?>
            <script> alert("les nouvaux mots de passe ne corresponde pas");
                window.location="changeMdp.php";
            </script>
            <?php
        }
    }else{
        ?>
        <script> alert("mot de passe incorecte");
            window.location="changeMdp.php";
        </script>
        <?php
    }

?>