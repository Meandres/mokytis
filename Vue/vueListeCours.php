<?php
ob_start();
?>
<h1>Les Cours</h1>
<div class="search-container">
   <form action="/action_page.php">
     <input type="text" placeholder="recherche" id="reacherchBar"name="search">
   </form>
</div>
<div id="result-container">
  <?php
  foreach ($listeCours as $key => $cours) {
    echo $cours->afficherApperçu();
  } ?>
</div>
<?php
$contenu=ob_get_clean();
require 'template.php';

 ?>
