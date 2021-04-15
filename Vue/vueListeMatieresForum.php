<?php
ob_start();
?>
<h1>Forum</h1>
<div id="result-container">
  <?php
  foreach ($listeMatieres as $key => $matiere) {
    echo $matiere->afficherApperçu();
  } ?>
</div>
<?php
$contenu=ob_get_clean();
require 'template.php';
?>