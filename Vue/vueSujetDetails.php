<?php
ob_start();
?>
<div id="sujet-container">
  <h2><?php echo $sujet->getTitre(); ?></h2>
  <?php echo "posté par : ".$auteur->getPrenom()." ".$auteur->getNom(); ?> <br>
  <?php echo "le : ".$sujet->getDatePubli(); ?> <br>
  <?php echo $cours->getIntituleCours(); ?> <br>
  <?php echo $matiere->getIntituleMatiere(); ?> <br>
</div>
<div id="result-container">
  <?php
  foreach ($listeReponsesBySujet as $key => $reponse) {
    echo $reponse->afficherApperçu();
  } ?>
</div>
<div class="ajout-container">
   <form action="index.php?action=AjoutReponseForum=<?php echo $_GET['idRepForum'];?>&modif=1" method="post">
     <input type="text" placeholder="ajoutReponse" id="barreReponse" name="answer">
	 <button type="button" id="enboyerReponse">Envoyer</button>
   </form>
</div>
<?php
$contenu=ob_get_clean();
require 'template.php';
?>
