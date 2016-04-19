<?php
session_start();

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
    <link rel="stylesheet" type="text/css" href="menu.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container-fluid">
		<div class="row headerBar">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
						<span class="icon icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-left text-uppercase">
						<li><a href="index.php">Home</a></li>
						<li><a href="#feature">Description</a></li>
						<li><a href="#pricing">Team</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
					
				</div>
			</nav>
		</div>
        <div class="row menu-left">
			<div class="col-md-2 menu_left">
					<div id="menu">
					
					<li><a href="profil.php">Profil</a>
						<ul>
						  <li><a href="profil.php">Gestion de compte</a></li>
						  <li><a href="unconnect.php">Deconnexion</a></li>
						</ul>
					</li>
					
					</div>
				
				<a class="clickLien" href="ShareUp.php">Upload</a>
				<a class="clickLien" href="absence.php">Absences</a>
				<a class="clickLien" href="page1.php">Page 1 </a>
				<a class="clickLien" href="page1.php">Page 1 </a>
			</div>
			<div class="col-md-10" id="corps" style="overflow-y:scroll; overflow-x:hidden; height:100%">
				<div style="height:20px;"></div>
				<div class="row">
					<div class="col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4"><h1 style="text-align:center;">Fil d'actualité</h1></div>
				</div>
				<form action="action.php" method="post">
					<div class="row" style="text-align:center;">
						<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<textarea name="msg" rows="4" cols="50" placeholder="Decrit au monde a quel point tu es con.."></textarea>
						</div>
					</div>
					<div class="row" style="text-align:right;">
						<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input class="btn btn-primary" name="submit" type="submit" value="submit">
						</div>
					</div>
				</form>
				<?php		
				foreach($dbh->query('SELECT * FROM wall w left outer join user u ON u.id_user = w.author_wall ORDER BY date_wall DESC') as $row) {
				?>
					<div class="row">
						<div class=""></div>
						<div class="col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<p><?php			
								// if (preg_match('/^.*\.(jpg|jpeg|png|gif)$/i', $row['content_wall']))
									
								$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}((jpg|jpeg|png|gif)S*)?/";
								
								if (preg_match($reg_exUrl, $row['content_wall'])) {
									// $row['content_wall'] = "<img src=" .$row['content_wall'] . ">";
									$row['content_wall'] = "<img src=" .$row['content_wall']." style=max-width:100%; max-height:100%;>";
								}
								echo $row['alias_user'] . " a publié le " . $row['date_wall'] . " :<br>". $row['content_wall']
							?></p> 
						</div>
					</div>
				<?php
				}
				$dbh = null;
				?>
            </div>
        </div>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/share.js"></script>
  </body>
</html>