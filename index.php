<?php
require("ControllerThomas/controller.php");

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



} else {
	accueil();
}

?>
