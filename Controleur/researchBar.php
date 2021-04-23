<?php
require("../Modele/modele.php");
require("../Modele/Cours.php");

if(isset($_POST['cours'])){

  $cours = $_POST['cours'];
  $db = ouvrirConnexion();
  $requete = "select * from COURSSIMPLES where intituleCours LIKE '".$cours."%';";
  $result = $db->query($requete)->fetchAll();
  $tabCours = [] ;
  foreach ($result as $key => $cours) {
    $cours1 = Cours::avecBD($cours);
    echo $cours1->afficherApperçu();
  }

}

 ?>
