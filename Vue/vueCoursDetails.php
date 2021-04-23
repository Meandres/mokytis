<?php
ob_start();
?>
<h1><?php echo $cours->getIntituleCours(); ?></h1>
<div class="cours-container">

  <div class="info-cours">
    <?php echo "réalisé par : ".$prof[0]." ".$prof[1]; ?> <br>
    <?php echo "date d'ajout : ".$cours->getDateAjout(); ?> <br>
    <?php echo "temps estimé du cours : ".$cours->getDureeEstimee()." minutes"?> <br>

  </div>
  <div class="cours-ecrit">
    <?php echo $cours->getContenu()?>
    </div>
    <div class="container-button">
        <?php
        if(isset($_SESSION['prof'])){?>
          <a href="index.php?action=ajoutModifCours&idCours=<?php echo $cours->getIdCours();?>">
           <button id="bModif" name="buttonModif">Modifier le cours</button>
         </a>
       <?php }else{ ?>
          <a href="index.php?action=qcm&idCours=<?php echo $cours->getIdCours();?>">
            <button id="bQCM" name="buttonQCM"> Faire le test</button>
          </a>
        <?php
        }
       ?>
    </div>
</div>
<?php
$contenu=ob_get_clean();
require 'template.php';

 ?>
