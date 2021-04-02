<?php

require('Modele/modele.php');
require('Modele/LoginManager.php');

function accueil()
{
    // la tu fais les appelles au fonction du modele
    require('Vue/vueAccueil.php');
}
function profil(){
  $id=4;
  if($_POST){
    $user=getApprenant($id);
    $user->modifChamps($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp']);
    modifBaseApprenant($user);
    //commit();
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
