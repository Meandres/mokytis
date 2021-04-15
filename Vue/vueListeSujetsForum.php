<?php
ob_start();
?>
<h1>Forum</h1>
<div id="result-container">
  <?php
  foreach ($listeSujetsByMatiere as $key => $sujet) {
    echo $sujet->afficherApperçu();
  } ?>
</div>
<?php
$contenu=ob_get_clean();
require 'template.php';
?>