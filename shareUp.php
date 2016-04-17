<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>share</title>
</head>
<body>
	<form id="formShare" method="POST" action="share.php" enctype="multipart/form-data" >
		<input type="file" name="file" class="upload"></input>
		<input type="submit" name="envoyer" value="Envoyer le fichier" class="btn btn-primary">
	</form>
	<div id="listUpload">
	<?php 
		include('listUpload.php');
	?>
	</div>
</body>
</html>