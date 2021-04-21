<?php
$titre="Mokytis";

ob_start();

echo "<h1>".$qcm->getIntituleQCM()."</h1>";
echo "<div class='difficulte'>Difficulté du test : ".$qcm->getDifficulte()."</div>";
?>
<input type="hidden" id="idQcm" value='<?php echo $qcm->getIdQCM()?>'>
<div class="question-container">
  <h2 id="titreQcm">Le QCM</h2>
  <div id="question">
    
  </div>
  <button id="buttonQuestion" type="button" name="button">Commencer le test</button>
</div>


<?php
$contenu=ob_get_clean();
require 'template.php';

 ?>
