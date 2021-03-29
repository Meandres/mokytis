<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="Style/style.css"/>
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<title><?php $titre ?></title>
</head>
<body>
	<div id="global">
	<header>
		<h1> LOGO </h1>
		<div id="header">
		  <nav>
		    <a href="#">Accueil</a>
		    <a href="#">Forum</a>
		    <a href="#">Cours</a>
				<button type="button" name="button" id="profil"> profil</button>
		  </nav>
		</div>
	</header>
	<div id="profilContainer">
		<ul>
			<li>option</li>
			<li>test1</li>
			<li>test1</li>
		</ul>
	</div>
	<div id="contenu">
		<?php echo $contenu ?>
	</div>
	</div>
</body>
<script src="Javascript/javascript.js"></script>
</html>
