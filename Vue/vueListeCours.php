<?php
ob_start();
?>
<h1>Les Cours</h1>
<div class="search-container">
   <form action="/action_page.php">
     <input type="text" placeholder="recherche" id="researchBar"name="search">
   </form>
</div>
<div id="result-container">
  <?php
  foreach ($listeCours as $key => $cours) {
    echo $cours->afficherApperçu();
  } ?>
</div>
<div class="createClass-container">
   <form>
	 <button type="button" id="createClass" onclick=window.location.href='vueAjoutModifCours.php'>Creer un cours</button>
   </form>
</div>
<br class="clearBoth" /><!-- you may or may not need this -->

<?php
$contenu=ob_get_clean();
require 'template.php';

 ?>
