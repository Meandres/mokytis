
<!doctype html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="Style/style.css" media="screen">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
        function changeTheme() {
            var theme = document.getElementsByTagName('link')[0];
            if (theme.getAttribute('href') == 'Style/style.css') {
                theme.setAttribute('href', 'Style/orangeIsTheNewBlack.css');
            } else {
                theme.setAttribute('href', 'Style/style.css');
            }
        }
    </script>

	<title><?php $titre ?></title>
</head>
<body>
	<div id="global">
	<header>
		<div class="logo">
			<h1><img id="logoImg" src="Ressources/logo.jpeg" alt="Logo" width="50" height="50"> Mokytis</h1>
		</div>
		<div id="header">
		  <nav>
		    <a href="index.php?action=accueil">Accueil</a>
		    <a href="index.php?action=listeMatieresForum">Forum</a>
				<a href="index.php?action=listeCours">Cours</a>
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
		  <div class="push"></div>
	</div>
	<footer class="footer">
		<div class="droits">
			@ 2021 Mokytis. Tous droits réservés.
		</div>
		<div class="themeSelection">
			choix du style :
			<button onclick="changeTheme()">Changer le theme</button>
		</div>
		<div class="footer_links">
			<a href="index.php?action=contact">Nous contacter</a>
			<a href="index.php?action=politique">Politique de protection de la vie privée</a>
			<a href="index.php?action=mentionsLegales">Conditions et mentions Légales</a>
		</div>
	</footer>
	</div>
</body>
<script src="Javascript/javascript.js"></script>


</html>
