<?php
include 'Modele/modele.php';
try{
	require 'Vue/vuePerso.php';
}
catch (Exception $e){
	echo '<html><body>Erreur ! '. $e->getMessage() . '</body></html>';
}
?>
