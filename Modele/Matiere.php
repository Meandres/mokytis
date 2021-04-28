<?php
date_default_timezone_set('CET');

//Création de la classe cours
class Matiere{
	private $idMatiere, $intituleMatiere;

	//get
	public function getIdMatiere(){
		return $this->idMatiere;
	}

	public function getIntituleMatiere(){
		return $this->intituleMatiere;
	}

	//set
	public function setIdMatiere($ID){
		$this->idMatiere=$ID;
	}

	public function setIntituleMatiere($Intitule){
		$this->intituleMatiere=$Intitule;
	}

	//constructeur par défault (peut-être à enlever ?)
	public function __construct(){}

	//constructeur pour une requete dans la base
	protected function remplirBD(array $row){
		$this->idMatiere=$row['idMatiere'];
		$this->intituleMatiere=$row['intituleMatiere'];
	}

	//constructeur pour la création de compte
	protected function remplirParam($IdMatiere, $IntituleMatiere){
		$this->idMatiere=$IdMatiere;
		$this->intituleMatiere=$IntituleMatiere;
	}

	public function afficherApperçu(){
		$affichage = "<a class='matiere' href='index.php?action=matiereSujets&idMatiere=".$this->idMatiere."' ><div class='appercuMatiere'><h3>".$this->intituleMatiere."</h3></div></a>";
		return $affichage;
	}

	//fabrique de classe (à partir d'une requete à la base)
	public static function avecBD(array $row){
		$instance=new self();
		$instance->remplirBD($row);
		return $instance;
	}

	//fabrique de classe (pour la creation d'un cours)
	public static function creeMatiere($IdMatiere, $IntituleMatiere){
		$instance=new self();
		$instance->remplirParam($IdMatiere, $IntituleMatiere);
		return $instance;
	}
}

?>
