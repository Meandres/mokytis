<?php
/*
éléments provisoires à changer :
- avec les sessions -> recuperer l'id de l'apprenant et faire la query en fonction de ça

*/
$titre="Mon profil";
ob_start();
if($_POST){
  $user=Apprenant::avecParams($_POST["identifiant"], $_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp']);
  //$user.commitChanges();
}
else{
  $user=Apprenant::avecParams(1, "Mikoto", "Misaka", "railgun", "toma");
}


echo "<form id=\"formApprenant\" action=\"perso.php\" method=\"post\">";
echo "<label for=\"identifiant\">Id : </label><input type=\"text\" id=\"identifiant\" name=\"identifiant\" value=\"". $user->getId() ."\" disabled><br/><br/><br/>";
echo "<label for=\"prenom\">Prenom : </label><input type=\"text\" id=\"prenom\" name=\"prenom\" value=". $user->getPrenom() ." disabled>";
echo "<label for=\"nom\">Nom : </label><input type=\"text\" id=\"nom\" name=\"nom\" value=".$user->getNom()." disabled><br/><br/><br/>";
echo "<label for=\"login\">Login : </label><input type=\"text\" id=\"login\" name=\"login\" value=".$user->getLogin()." disabled>";
echo "<label for=\"mdp\">Mot de passe : </label><input type=\"password\" id=\"mdp\" name=\"mdp\" value=".$user->getMdp()." disabled><br/><br/><br/>";
echo "<button id=\"applyButton\" title=\"valider les modifications effectuées\">Appliquer</button>";
echo "</form>";
echo "<button id=\"modifButton\" title=\"modifier les valeurs\">Modifier</button>";


echo "<script src=\"../JavaScript/pagePerso.js\"></script>";
$contenu=ob_get_clean();
require 'template.php';
 ?>
