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
	else if($_GET['action']== "login"){
		login();
	}



} else {
	accueil();
}

?>
