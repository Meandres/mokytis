<?php
$titre="Mokytis";

ob_start();

echo "<h2>".$qcm->getIntituleQCM()."</h2>";
echo "<h3>".$qcm->getDifficulte()."</h3>";
?>
<input type="hidden" id="idQcm" value='<?php echo $qcm->getIdQCM()?>'>
<div class="question-container">
  <h2 id="titreQcm">Le QCM</h2>
  <div id="question">
    ALLER
  </div>
  <button id="buttonQuestion" type="button" name="button">Commencer le test</button>
</div>


<?php
$contenu=ob_get_clean();
require 'template.php';

 ?>
