<?php 

session_start();
if(!isset($_SESSION['alias']) && !isset($_SESSION['pass'])){
	header('Location: connexion.php');
	alert('authentication failed !');
}else {
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
            	<form class="form" method="POST" action="share.php" enctype="multipart/form-data" >
					<input type="file" name="file" class="upload"></input>
					<input type="submit" name="envoyer" value="Envoyer le fichier" class="btn btn-primary">
				</form>
				<div id="listUpload">
				<?php
				$db = new PDO('mysql:host=localhost;dbname=classroom', 'root', '');
				$sql = "select name_files,date_files,owner_files from files";
			    $req1 = $db->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
			    $req1->execute();

				?>
				<table id="tableUpload">
					<thead>
					    <tr class="titre_tr">
						    <td>Name of file</td>
						    <td>Upload by</td>
						    <td>Date of upload</td>
					    </tr>
					</thead>
					<tbody>
					    <?php
					    while($datafile = $req1->fetch())
					    {?>
					    <tr class="file_tr">
						    <td><?php echo $datafile['name_files'];?></td>
						    <td><?php echo $datafile['owner_files'];?></td>
						    <td><?php echo $datafile['date_files'];?></td>
						    
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
<?php 
}
?>