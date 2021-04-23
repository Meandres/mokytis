<h1>Mes Cours</h1>

<div>
  <?php
  foreach ($listeCours as $key => $cours) {
    echo $cours->afficherApperçu();
  } ?>
</div>

<br class="clearBoth" /><!-- you may or may not need this -->

<?php
$contenu=ob_get_clean();
require 'template.php';

 ?>
