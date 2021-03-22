<?php
$titre="Mokytis";

ob_start();

for($i=0; $i<3; $i++){
	echo "<article>";
	echo "Cours " . $i . "<br><p>Blblbllblblblbldblsdfljksdflkjsdlfkjslfkjsdlkjsdlkfjqkjnekljfvnkjnvoskljncozlskdcolzkicolziknc,d</p>";
	echo "</article>";
}
$contenu=ob_get_clean();
require 'template.php';
?>
