<?php
/*Todo :
  -revoir la gestion des erreurs (peut-être avec des vues spécifiques donc pas dans ce fichier-ci).
*/
require 'Apprenant.php';
require 'ReponsesQCM.php';
require 'conf.php';

/*
Fonction réalisant l'ouverture de la connection à la base de données.
Entrée : paramètres de connection contenus dans le fichier conf.php
Sortie : objet PDO
*/

function ouvrirConnexion(){
  try{
      $dbConn=new PDO('mysql:host=localhost;dbname=mokytis', "root", "root");
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
  $requeteAp="select mdp, idAppr from APPRENANT where login=\"".$username."\";";
  $records=$dbConn->query($requeteAp)->fetch();
  if(isset($records['mdp'])){
    $result = $records['idAppr'];
  }else{
    $result = -1;
  }
  return $result;
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

function getProfWithId($id){
  $dbConn = ouvrirConnexion();
  $requete = "select nom,prenom from PROFESSEUR where idProf=".$id.";";
  $tab = $dbConn->query($requete)->fetch();
  return $tab;
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
  $requete="select * from COURSSIMPLES order by dateAjout DESC limit 6;";
  $lesCours=$dbConn->query($requete)->fetchAll();
  $tabCours = [];
  foreach ($lesCours as $key => $cours) {
    $tabCours[] = Cours::avecBD($cours);
  }
  return $tabCours;
}
function getAllCours(){
  $dbConn = ouvrirConnexion();
  $requete = "select * from COURSSIMPLES;";
  $lesCours=$dbConn->query($requete)->fetchAll();
  $tabCours = [];
  foreach ($lesCours as $key => $cours) {
    $tabCours[] = Cours::avecBD($cours);
  }
  return $tabCours;
}
function getCoursId($id){
  $dbConn = ouvrirConnexion();
  $requete = "select * from COURSSIMPLES where idCours=".$id.";";
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
function getAllMatieres(){
  $dbConn = ouvrirConnexion();
  $requete = "select * from MATIERE;";
  $lesMatieres=$dbConn->query($requete)->fetchAll();
  $tabMatieres = [];
  foreach ($lesMatieres as $key => $matiere) {
    $tabMatieres[] = Matiere::avecBD($matiere);
  }
  return $tabMatieres;
}
function getAllSujetsByMatiere($id){
  $dbConn = ouvrirConnexion();
  $requete = "select * from SUJETFORUM where matiere=".$id.";";
  $lesSujetsByMatiere=$dbConn->query($requete)->fetchAll();
  $tabSujetsByMatiere = [];
  foreach ($lesSujetsByMatiere as $key => $sujet) {
    $tabSujetsByMatiere[] = SujetForum::avecBD($sujet);
  }
  return $tabSujetsByMatiere;
}

// partie quizz
function getQCM($id){
  $dbConn = ouvrirConnexion();
  $requete = "select * from QCM where cours=".$id.";";
  $qcm = $dbConn->query($requete)->fetch();
  $qcm = QCM::avecBD($qcm);
  return $qcm;
}

function listeMesCours(){
  $dbConn = ouvrirConnexion();
  $requete = "select * from COURSSIMPLES where exists(
    select * from SUIT where apprenant=".$_SESSION['newsession']." and cours = COURSSIMPLES.idCours );";
  $lesCours = $dbConn->query($requete)->fetchAll();
  $tabCours = [];
  foreach ($lesCours as $key => $cours) {
    $tabCours[] = Cours::avecBD($cours);
  }
  return $tabCours;
}

function insererQuestion($idQCM, $intituleQu, $diff, $r1, $r2, $r3, $r4, $correcte){
  $dbConn=ouvrirConnexion();
  $reussi=true;
  $idQu=$dbConn->query("select MAX(idQuestion) from QUESTIONSQCM;")->fetch()[0];
  $idQu+=1;
  $idRe=$dbConn->query("select MAX(idReponsesQCM) from REPONSESQCM;")->fetch()[0];
  $idRe+=1;
  $reussi=$reussi & $dbConn->prepare("insert into QUESTIONSQCM VALUES(".$idQu.", ".$idQCM.", '".$diff."', '".$intituleQu."');")->execute();
  $reponses=array($r1, $r2, $r3, $r4);
  foreach ($reponses as $key=>$rep) {
    $vraie=0;
    if($key==$correcte){ $vraie=1; }
    $reussi=$reussi & $dbConn->prepare("insert into REPONSESQCM VALUES(".(int)($idRe+$key).", ".$idQu.", '".$rep."', ".$vraie.");")->execute();
  }
  return $reussi;
}

function getQuestionsReponsesQCM($id){
  $dbConn=ouvrirConnexion();
  $requete="select * from QUESTIONSQCM where qcm=(select idQCM from QCM where cours=".$id.");";
  $records=$dbConn->query($requete)->fetchAll();
  $questions=[];
  foreach($records as $key => $question){
    $qr=[];
    $qr[0]=QuestionsQCM::avecBD($question);
    $requete="select * from REPONSESQCM where question=".$qr[0]->getIdQuestion().";";
    $res=$dbConn->query($requete)->fetchAll();
    foreach($res as $reponse){
      array_push($qr, ReponsesQCM::avecBD($reponse));
    }
    $questions[$key]=$qr;
  }
  return $questions;
}














?>
