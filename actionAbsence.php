<?php
    /**
     * Created by PhpStorm.
     * User: clement
     * Date: 14/04/2016
     * Time: 14:42
     */
    $db = new PDO('mysql:host=localhost;dbname=classroom', "root", "");

    $name = $_POST['name'];
    $motif = $_POST['motif'];

    $date = date("Y-m-d H:i:s");
    $req2 = $db->prepare("INSERT INTO absences (user_absences, date_absences, motif_absences)
      VALUES (:user_absences, :date_absences, :motif_absences)");
    $req2->bindValue(":user_absences", $name);
    $req2->bindValue(":date_absences", $date);
    $req2->bindValue(":motif_absences", $motif);
    $req2->execute();

    
?>
