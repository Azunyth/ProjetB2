<?php
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=classroom', "root", "");
    $name = $_SESSION['alias'];

    $sql = "select * from user where alias_user ='".$name."'";
    $req1 = $db->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    $req1->execute();

    while($datafile = $req1->fetch())
    {
        echo $datafile['firstname_user']." ".$datafile['lastname_user']."<br>";
        echo "Email :".$datafile['email_user']."<br>";
        echo "Alias :".$datafile['alias_user']."<br>";
        echo "Birthday :".$datafile['birthday_user']."<br>";
    }
?>