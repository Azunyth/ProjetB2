<?php
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=classroom', "root", "");

    $newPseudo = $_POST['pseudo'];
    $confPseudo = $_POST['confPseudo'];
    $alias = $_SESSION['alias'];
    $test = true;


    $sql = "select alias_user from user";
    $req1 = $db->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $req1->execute();

    while($datafile = $req1->fetch())
    {
        if($newPseudo == $datafile['alias_user']){
            $test = false;
        }
    }

    if($test == true){
        if($newPseudo == $confPseudo){
            $sql2 = "UPDATE user SET alias_user = :newPseudo WHERE alias_user = :alias";
            $stmt = $db->prepare($sql2);

            $stmt->bindParam(':newPseudo', $newPseudo, PDO::PARAM_STR);
            $stmt->bindParam(':alias', $alias, PDO::PARAM_STR);

            $stmt->execute();

            ?>
            <script> alert("pseudo changé");
                window.location="manageProfil.php";
            </script>
            <?php
        }else{
            ?>
            <script> alert("les pseudo ne corespondent pas");
                window.location="manageProfil.php";
            </script>
            <?php
        }

    }else{
        ?>
        <script> alert("le pseudo n'est pas disponible");
            window.location="manageProfil.php";
        </script>
        <?php
    }
?>