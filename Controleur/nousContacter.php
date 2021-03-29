<?php
try{
	require '../Vue/vueNousContacter.php';
}
catch (Exception $e){
	echo '<html><body>Erreur ! '. $e->getMessage() . '</body></html>';
}
?>
