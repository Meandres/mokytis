<?php
session_start();

require("../Modele/modele.php");


if (isset($_POST['modification'])) {
  $dbConn = ouvrirConnexion();
  if($_POST['modification'] == "ajout"){
    $requete = "insert into SUIT values (".$_SESSION['newsession'].",".$_POST['idCours'].");";
  }else if($_POST['modification'] == "suppression"){
    $requete = "delete from SUIT where apprenant=".$_SESSION['newsession']." and cours=".$_POST['idCours'].";";
  }
  $dbConn->prepare($requete)->execute();
  echo "success";
}

?>
