<?php
ob_start();
?>
<h1>Ajouter des questions</h1>
<div id=quPrecedentes>
  <?php foreach($questions as $key => $question){ ?>
    <div>
      <form id="q<?php echo $key++; ?>">
        <input type="text" name="intitule" value="<?php echo $question[0]->getTextQuestion(); ?>" size="<?php echo strlen($question[0]->getTextQuestion()); ?>" disabled><br/>
        <input type="text" name="dif" value="<?php echo $question[0]->getDifficulte(); ?>" disabled><br/>
        <?php for($i=1; $i<count($question); $i++){
          if($question[$i]->getEstJuste()==1){ ?>
            <input type="radio" name="reponses" id="r<?php echo $i;?>" disabled checked>
          <?php }
          else{ ?>
            <input type="radio" name="reponses" id="r<?php echo $i;?>" disabled>
          <?php } ?>
            <label for="r<?php echo $i;?>"><?php echo $question[$i]->getTextReponse(); ?></label><br/>
      <?php  } ?>
    </form>
  </div>
  <br/>
<?php  } ?>
</div>
<br/><br/><br/>
<form>
  <input type="text" id="idQCM" name="idQCM" value="<?php echo $questions[0][0]->getQCM();?>" hidden>
  <input type="text" placeholder="Intitulé de la question" id="intituleNew" name="intitule"><br/>
  <input type="texte" placeholder="difficulté de la question" id="difficulteNew" name="difficulte"><br/>
  <input type="text" placeholder="réponse 1" id="r1New" name="r1"><br/>
  <input type="text" placeholder="réponse 2" id="r2New" name="r2"><br/>
  <input type="text" placeholder="réponse 3" id="r3New" name="r3"><br/>
  <input type="text" placeholder="réponse 4" id="r4New" name="r4"><br/>
  <label for="correcte">Réponse correcte</label>
  <input type="number" id="correcte" name="correcte" min="1" max="4"><br/>
</form>

<button id="buttonAjout">Enregistrer</button>

<script src="JavaScript/creerQCM.js"></script>
<?php
$contenu=ob_get_clean();
require 'template.php';

 ?>
