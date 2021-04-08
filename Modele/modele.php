<?php
/*Todo :
  -revoir la gestion des erreurs (peut-être avec des vues spécifiques donc pas dans ce fichier-ci).
*/
require 'Apprenant.php';
require 'conf.php';

/*
Fonction réalisant l'ouverture de la connection à la base de données.
Entrée : paramètres de connection contenus dans le fichier conf.php
Sortie : objet PDO
*/

function ouvrirConnexion(){
  try{
      $dbConn=new PDO('mysql:host=localhost; dbname=mokytis', "root", "root");
      return $dbConn;
  }catch(PDOException $e){
    print "Erreur !: ".$e->getMessage() ."<br/>";
    return null;
  }
}
/*
PDO::exec() mais avec la gestion d'erreur en plus
*/
function execute($dbConn, $requete){
  try{
    $res=$dbConn->exec($requete);
    return $res;
  }catch (PDOException $e){
    echo "Erreur !: ".$e->getMessage()."<br/>";
    return null;
  }
}
/*
PDO::query() mais avec la gestion d'erreur en plus
*/
function query($dbConn, $requete){
  try{
    $res=$dbConn->query($requete);
  }catch(PDOException $e){
    echo "Erreur !; ".$e->getMessage()."<br/>";
    return null;
  }
}
/*
Fonction permettant de récuperer les informations d'un apprenant
Entrée : ID de l'apprenant
Sortie : Objet instanciée depuis Apprenant()
*/
function getApprenant($id){
  $dbConn=ouvrirConnexion();
  $requete="select * from APPRENANT where idAppr=".$id.";";
  $records=$dbConn->query($requete);
  $ap=Apprenant::avecBD($records->fetch());
  return $ap;
}

function getIdAppr($username, $password){
  $dbConn=ouvrirConnexion();
  $requete="select idAppr from APPRENANT where login=".$username." and mdp=".$password.";";
  $id=$dbConn->query($requete)->fetch();
  return $id;
}


function modifBaseApprenant($user){
  $dbConn=ouvrirConnexion();
  $requete="update APPRENANT set nom=\"".$user->getNom()."\", prenom=\"".$user->getPrenom()."\", login=\"".$user->getLogin()."\", mdp=\"".$user->getMdp(). "\" where idAppr=".$user->getId().";";
  $dbConn->prepare($requete)->execute();
}

// cours

function getLastCours(){
  $dbConn = ouvrirConnexion();
  $requete="select * from COURS;";
  $lesCours=$dbConn->query($requete)->fetchAll();
  $tabCours = [];
  foreach ($lesCours as $key => $cours) {
    $tabCours[] = Cours::avecBD($cours);
  }
  return $tabCours;
}


 ?>
