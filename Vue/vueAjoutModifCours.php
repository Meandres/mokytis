<?php
$titre="Ajouter/Modifier un cours";

ob_start();
?>
<form id="formCours" action="index.php?action=ajoutModifCours&idCours=<?php echo $_GET['idCours'];?>&modif=1" method="post">
  <label for="intituleCours">Intutilé du Cours :</label>
  <input type="text" id="intituleCours" name="intituleCours" size="100" value="<?php echo $cours->getIntituleCours(); ?>">
  <br/><br/>
  <label for="dureeEstimee">Duree Estimée (en heures) : </label>
  <input type="number" id="dureeEstimee" name="dureeEstimee" value="<?php echo $cours->getDureeEstimee(); ?>">
  <br/><br/>
  <label for="contenu">Contenu :</label><br/>
  <textarea id="contenu" name="contenu" rows="30" cols="100"><?php echo $cours->getContenu(); ?>
  </textarea>
  <br/>
  <button id="applyButton" title="valider les modifications effectuées">Modifier</button>
</form>
<?php

$contenu=ob_get_clean();
require 'template.php';
?>
