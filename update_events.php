<?php

/* VALUES */
$id=$_POST['id'];
$title=$_POST['title'];
$start=$_POST['start'];
$end=$_POST['end'];

// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=classroom', 'root', '');
} catch(Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}

$sql = "UPDATE calendar SET title_calendar=?, start_calendar=?, end_calendar=? WHERE id_calendar=?";
$q = $bdd->prepare($sql);
$q->execute(array($title,$start,$end,$id));

?>