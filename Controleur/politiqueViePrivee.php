<?php
try{
	require '../Vue/vuePolitiqueViePrivee.php';
}
catch (Exception $e){
	echo '<html><body>Erreur ! '. $e->getMessage() . '</body></html>';
}
?>
