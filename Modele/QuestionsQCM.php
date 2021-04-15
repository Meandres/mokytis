<?php
date_default_timezone_set('CET');

class QuestionsQCM{
	private $idQuestion, $qcm, $difficulte, $textQuestion;

	//get
	public function getIdQuestion(){ return $this->idQuestion; }

	public function getQCM(){ return $this->qcm; }

	public function getDifficulte(){ return $this->difficulte; }

	public function getTextQuestion(){ return $this->textQuestion; }
	
	//set
	public function setIdQuestion($ID){ $this->idQuestion=$ID; }
	
	public function setQCM($QCM){ $this->qcm=$QCM; }
	
	public function setDifficulte($Difficulte){ $this->difficulte=$Difficulte; }
	
	public function setTextQuestion($TextQuestion){ $this->textQuestion=$TextQuestion; }

	//constructeur par défault (peut-être à enlever ?)
	public function __construct(){}
	
	//constructeur pour une requete dans la base
	protected function remplirBD(array $row){
		$this->idQuestion=$row['idQuestion'];
		$this->qcm=$row['qcm'];
		$this->difficulte=$row['difficulte'];
		$this->textQuestion=$row['textQuestion'];
	}

	//constructeur pour la création d'une question de QCM
	protected function remplirParam($ID, $QCM, $Difficulte, $TextQuestion){
		$this->idQuestion=$ID;
		$this->qcm=$QCM;
		$this->difficulte=$Difficulte;
		$this->textQuestion=$TextQuestion;
	}

	//fabrique de classe (à partir d'une requete à la base)
	public static function avecBD(array $row){
		$instance=new self();
		$instance->remplirBD($row);
		return $instance;
	}

	//fabrique de classe
	public static function creeQuestionsQCM($ID, $QCM, $Difficulte, $TextQuestion){
		$instance=new self();
		$instance->remplirParam($ID, $QCM, $Difficulte, $TextQuestion);
		return $instance;
	}
}
?>