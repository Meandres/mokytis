<?php
require 'Modele/modele.php';
try{
	require 'Vue/vueAccueil.php';
}
catch (Exception $e){
	echo '<html><body>Erreur ! '. $e->getMessage() . '</body></html>';
}

