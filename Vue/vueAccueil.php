<?php
$titre="Mokytis";

ob_start();
?>
<div class="imageBox">

	<div class="encardrement">
		<h3> Apprentissage en ligne </h3>
		<p> Grâce à notre platforme, apprendre ne vous aura jamais été aussi simple. Avec nos nombreux enseignants qui mettent à votre disposition des cours
		les plus à jour possible et avec un système de validation de vos connaissances, obtenez votre certifications Mokytis dans de nombreux domaine. La
		communauté actives de Mokytis vous permettra à l'aide du forum communautaire mit à la disposition des utilisateurs de répondre à vos questions
		sur les différents cours.</p>
	</div>
	<img class="center-fit" src="Ressources/image.png" alt="">
</div>

<?php
//getAll
?>
<h1> Nos catégories </h1>
Blabmalbalbalbla
<table>
	<tr>
		<td>Maths</td><td>Anglais</td><td>C++</td><td>C#</td><td>Python</td>
	</tr>
	<tr>
		<td>Design</td><td>Java</td><td>Unity</td><td></td>
	</tr>
</table>

<h1>Nos derniers cours</h1>
<div class="lastCours">
	<?php
	foreach ($tabCours as $key => $cours) {
		echo $cours->afficherApperçu();
	}
?>
</div>
<br class="clearBoth" /><!-- you may or may not need this -->



<h1>nos meilleures topic </h1>


<?php



$contenu=ob_get_clean();
require 'template.php';
?>
