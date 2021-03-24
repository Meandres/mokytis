<?php
$titre="Mokytis";

ob_start();
echo '<p><a href="Controleur/perso.php">Pages Perso</a></p>';
$contenu=ob_get_clean();
require 'template.php';
?>
