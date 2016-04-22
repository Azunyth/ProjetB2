<?php

$title=$_POST['title'];
$start=$_POST['start'];
$end=$_POST['end'];

// connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=classroom', 'root', '');
} catch(Exception $e) {
    exit('Impossible de se connecter à la base de données.');
}

$sql = "INSERT INTO calendar (title_calendar, start_calendar, end_calendar) VALUES (:title_calendar, :start_calendar, :end_calendar)";
$q = $bdd->prepare($sql);
$q->execute(array(':title_calendar'=>$title, ':start_calendar'=>$start, ':end_calendar'=>$end));
?>