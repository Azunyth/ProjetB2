<?php 
function filtre_texte($texte)
    {

        $texte = str_replace("|:-)", "<img src='smileys/01.gif' border='0'>", $texte);
        $texte = str_replace(";-)", "<img src='smileys/02.gif' border='0'>", $texte);
        $texte = str_replace(":-))", "<img src='smileys/03.gif' border='0'>", $texte);
        $texte = str_replace(":-)", "<img src='smileys/04.png' border='0' style='max-width: 20px; max-height: 20px;'>", $texte);
        $texte = str_replace(":-o", "<img src='smileys/05.gif' border='0'>", $texte);
        $texte = str_replace(":o)", "<img src='smileys/06.gif' border='0' >", $texte);
        $texte = str_replace(":-((", "<img src='smileys/07.gif' border='0'>", $texte);
        $texte = str_replace(":-(", "<img src='smileys/08.gif' border='0'>", $texte);
        $texte = str_replace("8-)", "<img src='smileys/09.gif' border='0'>", $texte);
        $texte = str_replace(":-p", "<img src='smileys/10.gif' border='0'>", $texte);
        $texte = str_replace(";-(", "<img src='smileys/11.gif' border='0'>", $texte);
        return $texte;
        }
session_start();
var_dump($_SESSION['alias']);
if(isset($_SESSION['alias'])){

    $text = $_POST['text'];
    $text = filtre_texte($text);
    
    $fp = fopen("log.html", 'a');
    fwrite($fp, "<div class='msgln'>(".date("H:i:s").") <b>".$_SESSION['alias']."</b>: ".$text."<br></div>");
    fclose($fp);
}
?>