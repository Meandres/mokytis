
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="Style/orangeIsTheNewBlack.css" media="screen">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<title><?php $titre ?></title>
</head>
<body>
	<div id="global">
	<header>
		<h1><img src="Ressources/logo.jpeg" alt="Logo" width="50" height="50"> Mokytis</h1>
		<div id="header">
		  <nav>
		    <a href="index.php?action=accueil">Accueil</a>
		    <a href="index.php?action=forum">Forum</a>
		    <a href="index.php?action=profil">Mon profil</a>
				<button type="button" name="button" id="profil"> profil</button>
		  </nav>
		</div>
	</header>
	<div id="profilContainer">
		<ul>
			<?php
			/* Si l'utilisateur est connecté on affiche un lien Déconnecter sinon
			on affiche un lien Connexion
			*/
      if (isset($_SESSION["newsession"])) {
        echo "<li><a href='index.php?action=login'>Déconnexion</a></li>";
      }else{

        echo "<li><a href='index.php?action=login'>Connexion</a></li>";
      }
       ?>
			<li>test1</li>
			<li>teskst1</li>
			<li>cjsk</li>
			<li>fd</li>
		</ul>
	</div>
	<div id="contenu">
		<?php echo $contenu ?>
	</div>
	<footer>
		<div id="footer">
		<p style="padding-top: 5px;">@ 2021 Mokytis. Tous droits réservés.
		<select class="themeButton" style="background-color: lightgrey; padding: 2px;">
			<option value="ClaBlack">Classic Black</option>
			<option value="NeoBlue">Neo Blue</option>
		</select><br/><br/><br/>
		<span class="footer_links" style="padding-bottom: 20px;">
			<a href="index.php?action=contact">Nous contacter</a>
		  	<a href="index.php?action=politique">Politique de protection de la vie privée</a>
		  	<a href="index.php?action=mentionsLegales">Conditions et mentions Légales</a>
		  </span>
		</p>
		</div>
	</footer>
	</div>
</body>
<script src="Javascript/javascript.js"></script>


</html>
