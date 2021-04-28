<?php
ob_start();
?>
<h2><?php echo $sujet->getTitre(); ?></h2>
<div id="sujet-container">
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
/*
ob_start();
?>
<div id="sujet-container">
  <div class="info-sujet">
    <?php echo "postÃ© par : ".$sujetForum->getAuteur(); ?> <br>
    <?php echo "le : ".$sujetForum->getDatePubli(); ?> <br>
    <?php echo $sujetForum->getCours(); ?> <br>
	<?php echo $sujetForum->getMatiere(); ?> <br>
  </div>
  <div class="reponses-container">
  <?php
  foreach ($listeReponses as $key => $reponseForum) {
    echo $reponseForum->afficherReponse();
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
*/
?>
