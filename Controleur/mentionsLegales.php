<?php
try{
	require '../Vue/vueMentionsLegales.php';
}
catch (Exception $e){
	echo '<html><body>Erreur ! '. $e->getMessage() . '</body></html>';
}
?>
