<?php
	try {
		$dbh = new PDO('mysql:host=localhost;dbname=classroom', 'root', '');
	} catch (PDOException $e) {
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
		<div style="height:20px;"></div>
		<div class="row">
			<div class="col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"><h1 style="text-align:center;">Fil d'actualité</h1></div>
		</div>
		<?php		
		foreach($dbh->query('SELECT * FROM wall w left outer join user u ON u.id_user = w.author_wall ORDER BY date_wall') as $row) {
		?>
			<div class="row">
				<div class=""></div>
				<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-offset-6 col-sm-offset-6 col-md-offset-6 col-lg-offset-6">
					<p><?php echo $row['alias_user'] . " :\n". $row['content_wall'] . "\n"; ?></p>
				</div>
			</div>
		<?php
		}
		$dbh = null;
		?>
		
		<div class="row" style="text-align:center;">
			<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<textarea rows="4" cols="50" placeholder="Décrit au monde à quel point tu es con.."></textarea> 
			</div>
		</div>
		<div class="row" style="text-align:right;">
			<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6"><input class="btn btn-primary" type="submit" value="Submit"></div>
		</div>

	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>