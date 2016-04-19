<?php
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=classroom', "root", "");

    $newEmail = $_POST['email'];
    $confEmail = $_POST['confEmail'];
    $alias = $_SESSION['alias'];
    $test = true;


    $sql = "select email_user from user";
    $req1 = $db->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $req1->execute();

    while($datafile = $req1->fetch())
    {
        if($newEmail == $datafile['email_user']){
            $test = false;
        }
    }

    if($test == true){
        if($newEmail == $confEmail){
            $sql2 = "UPDATE user SET email_user = :newEmail WHERE alias_user = :alias";
            $stmt = $db->prepare($sql2);

            $stmt->bindParam(':newEmail', $newEmail, PDO::PARAM_STR);
            $stmt->bindParam(':alias', $alias, PDO::PARAM_STR);

            $stmt->execute();

            ?>
            <script> alert("email changé");
                window.location="manageProfil.php";
            </script>
            <?php
        }else{
            ?>
                <script> alert("les email ne corespondent pas");
                    window.location="manageProfil.php";
                </script>
            <?php
        }

    }else{
        ?>
        <script> alert("l'email n'est pas disponible");
            window.location="manageProfil.php";
        </script>
        <?php
    }
?>