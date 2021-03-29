<?php
$titre="Mokytis";

ob_start();
?>
<div class="imgBox">
	<img class="center-fit" src="../Ressources/imagePresentation.png" alt="">
	<div class="encardrement">
		<h3> Mokytis </h3>
		<p> Apprendre les cours en ligne, blabliblou c'est cool la vie et les sushis aussi </p>
	</div>
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

fdjklsjlsd

<h1>nos meilleures topic </h1>


<?php



$contenu=ob_get_clean();
require 'templateMain.php';
?>
