<?php

require('Modele/modele.php');
require('Modele/LoginManager.php');

function accueil()
{
    // la tu fais les appelles au fonction du modele
    require('Vue/vueAccueil.php');
}
function profil(){
  if($_POST){
    $user=Apprenant::avecParams($_POST["identifiant"], $_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp']);
    //$user.commitChanges();
  }
  else{
    $user=Apprenant::avecParams(1, "Mikoto", "Misaka", "railgun", "toma");
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

// La partie session
function login(){
  if(!isset($_SESSION["newsession"])){
    if (isset($_POST["username"])) {
      $lm = new LoginManager();
      $test = $lm->loginUser($_POST["username"],$_POST["password"]);
      if($test == true){
          echo"<p>connecté<p>";
          header('Location: index.php?action=accueil');
      }else{
        echo"<p>mot de passe ou login incorrect<p>";
        echo $_POST["username"]."mp".$_POST["password"];
        require("Vue/login.php");
      }
    }else{
      require("Vue/login.php");
    }
  }else{
    echo"<p>deco<p>";
    unset($_SESSION["newsession"]);
    header('Location: index.php?action=accueil');
  }
}
