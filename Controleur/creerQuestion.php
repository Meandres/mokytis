<?php
require("../Modele/modele.php");
require("../Modele/QuestionsQCM.php");
#require("../Modele/ReponsesQCM.php");

//if( isset($_POST['qu']) && isset($_POST['diff']) isset($_POST['r1']) && isset($_POST['r2']) && isset($_POST['r3']) && isset($_POST['r4'])){

  $idQCM = $_POST['idQCM'];
  $intituleQu = $_POST['qu'];
  $r1=$_POST['r1'];
  $r2=$_POST['r2'];
  $r3=$_POST['r3'];
  $r4=$_POST['r4'];
  $diff=$_POST['diff'];
  $correcte=$_POST['correcte'];
  $succes=insererQuestion($idQCM, $intituleQu, $diff, $r1, $r2, $r3, $r4, $correcte);
  if($succes==true){
    echo '<input type="text" name="intitule" value="'.$intituleQu.'" size="'.strlen($intituleQu).'" disabled><br/>';
    echo '<input type="text" name="dif" value="'.$diff.'"disabled><br/>';
    $reponses=array($r1, $r2, $r3, $r4);
    foreach ($reponses as $key=>$rep) {
      if($key == $correcte)
        echo '<input type="radio" name="reponses" id="r'.$key.'" disabled checked>';
      else
        echo '<input type="radio" name="reponses" id="r'.$key.'" disabled>';
      echo '<label for="r'.$key.'">'.$rep.'</label><br/>';
    }
  }
//}

 ?>
