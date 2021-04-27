<?php
require("Controleur/controller.php");
session_start();
if (isset($_GET['action'])){
	if($_GET['action']== "accueil"){
		accueil();
	}
	else if($_GET['action']== "profil"){
		profil();
	}
	else if($_GET['action']== "contact"){
		contact();
	}
	else if($_GET['action']== "politique"){
		politique();
	}
	else if($_GET['action']== "mentionsLegales"){
		mentionsLegales();
	}
	else if($_GET['action']=="ajoutModifCours"){
		ajoutModifCours();
	}
	else if($_GET['action']== "login"){
		login();
	}
	else if($_GET['action']== "listeCours"){
		listeCours();
	}
	else if($_GET['action']== "coursDetails" && isset($_GET['idCours'])){
		coursDetails($_GET['idCours']);
	}
	else if($_GET['action']== "listeMatieresForum"){
		listeMatieresForum();
	}
	else if($_GET['action']== "matiereSujets" && isset($_GET['idMatiere'])){
		listeSujetsForumByMatiere($_GET['idMatiere']);
	}
	else if($_GET['action']== "sujetDetails" && isset($_GET['idSujet'])){
		sujetDetails($_GET['idSujet']);
	}
	else if($_GET['action']=="qcm" && isset($_GET['idCours'])){
		pageQCM($_GET['idCours']);
	}
<<<<<<< HEAD
	else if($_GET['action']=="modifQCM" && isset($_GET['idCours'])){
		modifQCM($_GET['idCours']);
=======
	else if($_GET['action']=="mesCours"){
		mesCours();
>>>>>>> d3900ae5681bb0de58470d15c4bcd448dc6ccdf8
	}
} else {
	accueil();
}

?>
