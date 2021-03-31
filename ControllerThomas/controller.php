<?php

require('Modele/modele.php');

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
