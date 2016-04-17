<?php 

	$user = 'root';

	try{
		$db = new PDO('mysql:host=localhost;dbname=classroom', 'root', '');
		$sql = "select name_files,date_files,owner_files from files";
    	$req1 = $db->prepare($sql, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
    	$req1->execute();
    	$result = $req1->fetchAll();
    	foreach($result as $row){
        	$name_files = $row['name_files'];
        	$date_files = $row['date_files'];
        	$owner_files = $row['owner_files'];
        	echo $name_files.' '.$date_files .'<br>';
    	}
	}catch (PDOException $e) {
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	    die();
	}
	
?>