<?php
date_default_timezone_set('CET');

class QCM{
	private $idQCM, $intituleQCM, $difficulte, $matiere;

	//get
	public function getIdQCM(){ return $this->idQCM; }

	public function getIntituleQCM(){ return $this->intituleQCM; }

	public function getDifficulte(){ return $this->difficulte; }

	public function getMatiere(){ return $this->matiere; }
	
	//set
	public function setIdQCM($ID){ $this->idQCM=$ID; }
	
	public function setIntituleQCM($Intitule){ $this->intituleQCM=$Intitule; }
	
	public function setDifficulte($Difficulte){ $this->difficulte=$Difficulte; }
	
	public function setMatiere($Matiere){ $this->matiere=$Matiere; }

	//constructeur par défault (peut-être à enlever ?)
	public function __construct(){}
	
	//constructeur pour une requete dans la base
	protected function remplirBD(array $row){
		$this->idQCM=$row['idQCM'];
		$this->intituleQCM=$row['intituleQCM'];
		$this->difficulte=$row['difficulte'];
		$this->matiere=$row['matiere'];
	}

	//constructeur pour la création d'un QCM
	protected function remplirParam($ID, $Intitule, $Difficulte, $Matiere){
		$this->idQCM=$ID;
		$this->intituleQCM=$Intitule;
		$this->difficulte=$Difficulte;
		$this->matiere=$Matiere;
	}

	//fabrique de classe (à partir d'une requete à la base)
	public static function avecBD(array $row){
		$instance=new self();
		$instance->remplirBD($row);
		return $instance;
	}

	//fabrique de classe
	public static function creeQCM($ID, $Intitule, $Difficulte, $Matiere){
		$instance=new self();
		$instance->remplirParam($ID, $Intitule, $Difficulte, $Matiere);
		return $instance;
	}
}
?>