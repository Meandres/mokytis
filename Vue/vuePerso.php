<?php
/*
éléments provisoires à changer :
- avec les sessions -> recuperer l'id de l'apprenant et faire la query en fonction de ça

*/
$titre="Mon profil";
ob_start();
//$id=1; #en attendant d'avoir les sessions
//$user=getApprenant($id);
$user=Apprenant::avecParams(1, "Misaka", "Mikoto", "railgun", "toma");
echo "<p>Apprenant : ".$user->getNom() ." ".$user->getPrenom()."</p>";


$contenu=ob_get_clean();
require 'template.php';
 ?>
