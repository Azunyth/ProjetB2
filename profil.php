<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>share</title>
</head>
<body>
<div class="container-fluid">
    <?php include('header.php'); ?>
    <div class="row menu-left">
        <div class="col-md-2 menu_left">
            <div id="menu">
            <li><a href="#" class="clickLien profil">Profil</a>
                <ul>
                    <li><a href="profil.php">Gestion de compte</a></li>
                    <li><a href="unconnect.php">Deconnexion</a></li>
                </ul>
            </li>
            </div>
            <a class="clickLien" href="shareUp.php">Upload</a>
            <a class="clickLien" href="absence.php">Absences</a>
            <a class="clickLien" href="page1.php">Page 1 </a>
            <a class="clickLien" href="page1.php">Page 1 </a>
        </div>
            <div class="col-md-10" id="corps">
                <div id="listUpload">
                <?php
                $db = new PDO('mysql:host=localhost;dbname=classroom', "root", "");
                $name = $_SESSION['alias'];

                $sql = "select * from user where alias_user ='".$name."'";
                $req1 = $db->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
                $req1->execute();
                ?>
                <table id="tableUpload">
                    <thead>
                        <tr class="titre_tr">
                            <td>Nom</td>
                            <td>prenom</td>
                            <td>Email</td>
                            <td>Alias</td>
                            <td>Birthday</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($datafile = $req1->fetch())
                        {?>
                        <tr class="file_tr">
                            <td><?php echo $datafile['lastname_user'];?></td>
                            <td><?php echo $datafile['firstname_user'];?></td>
                            <td><?php echo $datafile['email_user'];?></td>
                            <td><?php echo $datafile['alias_user'];?></td>
                            <td><?php echo $datafile['birthday_user'];?></td>
                            
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>