<?php
session_start();
    $db = new PDO('mysql:host=localhost;dbname=classroom', "root", "");
    $name = $_SESSION['alias'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Absence</title>
</head>
<body>
<div id="container">
    <form class="form" action="actionAbsence.php" method="post">
        <label>name : <input type="text" name="name" /></label>
        <label>motif : <input type="text" name="motif" /></label>
        <input type="submit" value="Envoyer" class="btn btn-primary"></p>
    </form>
    <div id="listUpload">
    <?php
        $sql = "select user_absences, date_absences, motif_absences from absences where user_absences='".$name."'";
        $req1 = $db->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
        $req1->execute();
        ?>
        <table id="tableUpload">
        <thead>
            <tr class="titre_tr">
                <td>Name</td>
                <td>Motif</td>
                <td>Date</td>
            </tr>
        </thead>
        <tbody>
        <?php
        while($datafile = $req1->fetch())
            {
            ?>
             <tr class="file_tr">
                <td><?php echo $datafile['user_absences'];?></td>
                <td><?php echo $datafile['motif_absences'];?></td>
                <td><?php echo $datafile['date_absences'];?></td>
                
            </tr>
           <?php
        }
    ?>
    </tbody>
    </table>
    </div>
</div>
</body>
</html>
