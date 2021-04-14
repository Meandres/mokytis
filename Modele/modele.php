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

function verifCredentialsApprenant($username, $password){
  $dbConn=ouvrirConnexion();
  $requeteAp="select mdp from APPRENANT where login=\"".$username."\";";
  $records=$dbConn->query($requeteAp);
  $passAp=$records->fetch();
  return ($passAp!=false);
}
function verifCredentialsProf($username, $password){
  $dbConn=ouvrirConnexion();
  $requetePr="select mdp from PROFESSEUR where login=\"".$username."\";";
  $records=$dbConn->query($requetePr);
  $passPr=$records->fetch();
  return ($passPr!=false);
}

function getIdAppr($username, $password){
  $dbConn=ouvrirConnexion();
  $requete="select idAppr from APPRENANT where login=".$username." and mdp=".$password.";";
  $id=$dbConn->query($requete)->fetch();
  return $id;
}
/*
Fonction modifiant dans la base les modifications de l'utilisateur sur ses informations personelles
Entree : utilisateur à inserer
*/
function modifBaseApprenant($user){
  $dbConn=ouvrirConnexion();
  $requete="update APPRENANT set nom=\"".$user->getNom()."\", prenom=\"".$user->getPrenom()."\", login=\"".$user->getLogin()."\", mdp=\"".$user->getMdp(). "\" where idAppr=".$user->getId().";";
  $dbConn->prepare($requete)->execute();
}

// cours

function getLastCours(){
  $dbConn = ouvrirConnexion();
  $requete="select * from COURS order by dateAjout DESC limit 5;";
  $lesCours=$dbConn->query($requete)->fetchAll();
  $tabCours = [];
  foreach ($lesCours as $key => $cours) {
    $tabCours[] = Cours::avecBD($cours);
  }
  return $tabCours;
}
function getAllCours(){
  $dbConn = ouvrirConnexion();
  $requete = "select * from COURS;";
  $lesCours=$dbConn->query($requete)->fetchAll();
  $tabCours = [];
  foreach ($lesCours as $key => $cours) {
    $tabCours[] = Cours::avecBD($cours);
  }
  return $tabCours;
}
function getCoursId($id){
  $dbConn = ouvrirConnexion();
  $requete = "select * from COURS where idCours=".$id.";";
  $cours1 = $dbConn->query($requete)->fetch();
  $cours = Cours::avecBD($cours1);
  return $cours;
}
function getCoursSimplesId($id){
  $dbConn = ouvrirConnexion();
  $requete = "select * from COURSSIMPLES where idCours=".$id.";";
  $cours1 = $dbConn->query($requete)->fetch();
  $cours = Cours::avecBDSimple($cours1);
  return $cours;
}
function modifBaseCours($id, $intitule, $duree, $contenu){
  $dbConn=ouvrirConnexion();
  $requete="update COURSSIMPLES set intituleCours='".$intitule."', dureeEstimee='".$duree."', contenu='".$contenu."' where idCours=".$id.";";
  $dbConn->prepare($requete)->execute();
}


?>
