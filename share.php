<?php

	$user = 'root';

	try{
		$db = new PDO('mysql:host=localhost;dbname=classroom', $user, '');
	}catch (PDOException $e) {
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	    die();
	}
	if(isset($_FILES['file']))
	{ 
	    $dossier = 'upload/';
	    
	    $fichier = basename($_FILES['file']['name']);
	    $extension = strrchr($_FILES['file']['name'], '.');
	    $fileFolder = $dossier.time().$fichier;
	    $filename = basename($fichier, $extension);
	    if(move_uploaded_file($_FILES['file']['tmp_name'],$fileFolder )) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
	    {
	    	$date = date('Y-m-d H:i:s');
	    	$exec = $db->prepare("INSERT INTO files (owner_files, date_files, url_files, name_files) 
	    		VALUES (:owner_files, :date_files, :url_files, :name_files)");
	    	$exec -> bindValue(':owner_files', 1);
			$exec -> bindValue(':date_files', $date);
			$exec -> bindValue(':url_files', $fileFolder);
			$exec -> bindValue(':name_files', $filename);

			$exec -> execute();
	        echo 'Upload effectué avec succès !';
	    }
    else //Sinon (la fonction renvoie FALSE).
    {
        echo 'Echec de l\'upload !';
    }
}
?>