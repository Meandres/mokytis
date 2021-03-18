<?php $titre="Mokytis";?>

<?php ob_start(); ?>
<?php for(var i=0; i<3; i++){
	echo "<article>";
	echo "Cours " . $i . "<br><p>Blblbllblblblbldblsdfljksdflkjsdlfkjslfkjsdlkjsdlkfjqkjnekljfvnkjnvoskljncozlskdcolzkicolziknc,d</p>";
	echo "</article>";
?>
<?php $contenu=ob_get_clean(); ?>

<?php require 'template.php'; ?>

