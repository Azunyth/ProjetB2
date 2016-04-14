<?php
	try {
		$dbh = new PDO('mysql:host=localhost;dbname=classroom', 'root', '');
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}

	echo "wesh";
	echo isset($_POST['submit']);
	
	if (isset($_POST['submit'])){
		$msg = htmlspecialchars($_POST['msg']);
		
		echo "wesh";
		
		$req = $dbh->prepare("INSERT INTO wall (content_wall, date_wall, author_wall) VALUES (:msg, :date, :author)");
		$req->execute(array(
            "msg" => $msg, 
            "date" => date("Y-m-d H:i:s"),
            "author" => 1
            ));
			
		header('Location: index.php');     
	}
?>