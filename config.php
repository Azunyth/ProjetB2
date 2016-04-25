<?php
/**
 * Created by PhpStorm.
 * User: ZANOTTILoic
 * Date: 04/11/2015
 * Time: 12:22
 */
function connect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=classroom;charset=utf8','root','');

    } catch(Exception $e){
        die('Erreur :'.$e->getMessage());
    }
    return $db;
}

?>