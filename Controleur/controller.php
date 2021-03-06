<?php

require('Modele/modele.php');
require('Modele/LoginManager.php');
require('Modele/Cours.php');
require('Modele/Matiere.php');
require('Modele/SujetForum.php');
require('Modele/ReponseForum.php');
require('Modele/QCM.php');
require('Modele/QuestionsQCM.php');


function accueil()
{
    // la tu fais les appels au fonction du modele
    $tabCours = getLastCours();
    require('Vue/vueAccueil.php');
}
function profil(){
  $id=4;
  if($_POST){
    $user=getApprenant($id);
    $user->modifChamps($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp']);
    modifBaseApprenant($user);
  }
  else{
    $user=getApprenant($id);
  }
  require('Vue/vuePerso.php');
}

function contact(){
  require("Vue/vueNousContacter.php");
}

function politique(){
  require("Vue/vuePolitiqueViePrivee.php");
}
function mentionsLegales(){
  require("Vue/vueMentionsLegales.php");
}
function listeCours(){
  $listeCours = getAllCours();
  require("Vue/vueListeCours.php");
}
function coursDetails($id){
  $cours = getCoursSimplesId($id);
  $prof = getProfWithId($cours->getProfesseur());
  require("Vue/vueCoursDetails.php");
}

function ajoutModifCours(){
  if(isset($_GET['modif'])){
    modifBaseCours($_GET['idCours'], $_POST['intituleCours'], $_POST['dureeEstimee'], $_POST['contenu']);
  }
  $cours=getCoursSimplesId($_GET['idCours']);
  require("Vue/vueAjoutModifCours.php");
}

function listeMatieresForum(){
  $listeMatieres = getAllMatieres();
  require("Vue/vueListeMatieresForum.php");
}

function listeSujetsForumByMatiere($id){
  $listeSujetsByMatiere = getAllSujetsByMatiere($id);
  require("Vue/vueListeSujetsForum.php");
}

function listeReponsesBySujet($id){
  $sujet = getSujet($id);
  $matiere = getMatiere($sujet->getMatiere());
  $cours = getCoursId($sujet->getCours());
  $auteur = getApprenant($sujet->getAuteur());
  $listeReponsesBySujet = getAllReponsesBySujet($id);
  require("Vue/vueSujetDetails.php");
}

function pageQCM($idCours){
  $qcm = getQCM($idCours);
  require("Vue/vueQCM.php");
}
function mesCours(){
  $listeCours = listeMesCours();
  require("Vue/vueMesCours.php");
}
function modifQCM($idCours){
  $questions=getQuestionsReponsesQCM($idCours);
  require("Vue/vueModifQCM.php");
}

// Connexion de l'utilisateur
function login(){
  /*si aucune variable session existe, cela signifie que l'utilisateur
  n'est pas connect??, sinon c'est que l'utilisateur souhaite se d??connecter, on supprime donc
  la variable session et on redirige sur l'accueil*/
  if(!isset($_SESSION["newsession"])){
    // Si il existe la variable en post de username, ??a veut dire que le chargement de la page est faite
    // apr??s la validation du formulaire et il faut alors traiter les donn??es du formulaire
    // sinon on charge la page du formulaire
    if (isset($_POST["username"])) {
      $lm = new LoginManager();
      $test = $lm->loginUser($_POST["username"],$_POST["password"]);
      //si la connexion est faire alors on redirige sur l'accueil sinon on reste sur la page login
      if($test == true){
          header('Location: index.php?action=accueil');
      }else{
        require("Vue/login.php");
      }

    }else{
      require("Vue/login.php");
    }
  }else{
    unset($_SESSION["newsession"]);
    unset($_SESSION['prof']);
    header('Location: index.php?action=accueil');
  }
}
