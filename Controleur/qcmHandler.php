<?php
require("../Modele/modele.php");
require("../Modele/QuestionsQCM.php");
require("../Modele/ReponsesQCM.php");

if(isset($_POST['question']) && isset($_POST['idQcm'])){
  $numQuestion = $_POST['question']-1;
  $dbConn = ouvrirConnexion();
  $requete = "select * from QUESTIONSQCM where qcm=".$_POST['idQcm'].";";
  $questions = $dbConn->query($requete)->fetchAll();
  if(count($questions) > $numQuestion ){
    $question =  QuestionsQCM::avecBD($questions[$numQuestion]);
    echo "<div class='enonce'>".$question->getTextQuestion()."<br> difficulté : ".$question->getDifficulte()."</div>";

    $requete = "select * from REPONSESQCM where question=".$question->getIdQuestion().";";
    $reponses = $dbConn->query($requete)->fetchAll();
    foreach ($reponses as $key => $reponse) {
      $rep = ReponsesQCM::avecBD($reponse);
      echo "
      <div class='comboBox'>
        <input class='questionCheckbox' type='checkbox' id=".$rep->getIdReponsesQCM()." name=".$rep->getIdReponsesQCM().">
        <label for=".$rep->getIdReponsesQCM().">".$rep->getTextReponse()."</label>
      </div>";
    }
  }else{
    echo "fini@:";
     $requete = "select * from QUESTIONSQCM where qcm=".$_POST['idQcm'].";";
     $questions = $dbConn->query($requete)->fetchAll();
     foreach ($questions as $key => $question) {
       $que = QuestionsQCM::avecBD($question);
       $requete = "select * from REPONSESQCM where question=".$que->getIdQuestion().";";
       $reponses = $dbConn->query($requete)->fetchAll();
       foreach ($reponses as $key1 => $reponse) {
         $rep = ReponsesQCM::avecBD($reponse);
         if($rep->getEstJuste() == 1){
           if($rep->getIdReponsesQCM() == $_POST['listeReponse'][$key]){
             echo "<div class='good'>".$que->getTextQuestion()."</div>";
           }else{
             echo "<div class='wrong'>".$que->getTextQuestion()."<br> la reponse était : "
             .$rep->getTextReponse()."</div>";
           }
         }
       }
     }
  }
}
?>
