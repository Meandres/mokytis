<?php
date_default_timezone_set('CET');

class ReponsesQCM{
	private $idReponsesQCM, $question, $textReponse, $estJuste;

	//get
	public function getIdReponsesQCM(){ return $this->idReponsesQCM; }

	public function getQuestion(){ return $this->question; }

	public function getTextReponse(){ return $this->textReponse; }

	public function getEstJuste(){ return $this->estJuste; }

	public function estJuste(){ return $this->estJuste==1;}
	//set
	public function setIdReponsesQCM($ID){ $this->idReponsesQCM=$ID; }

	public function setQuestion($Question){ $this->question=$Question; }

	public function setTextReponse($TextReponse){ $this->textReponse=$TextReponse; }

	public function setEstJuste($EstJuste){ $this->estJuste=$EstJuste; }

	//constructeur par défault (peut-être à enlever ?)
	public function __construct(){}

	//constructeur pour une requete dans la base
	protected function remplirBD(array $row){
		$this->idReponsesQCM=$row['idReponsesQCM'];
		$this->question=$row['question'];
		$this->textReponse=$row['textReponse'];
		$this->estJuste=$row['estJuste'];
	}

	//constructeur pour la création d'une reponse de QCM
	protected function remplirParam($ID, $Question, $TextReponse, $EstJuste){
		$this->idReponsesQCM=$ID;
		$this->question=$Question;
		$this->textReponse=$TextReponse;
		$this->estJuste=$EstJuste;
	}

	//fabrique de classe (à partir d'une requete à la base)
	public static function avecBD(array $row){
		$instance=new self();
		$instance->remplirBD($row);
		return $instance;
	}

	//fabrique de classe
	public static function creeReponsesQCM($ID, $Question, $TextReponse, $EstJuste){
		$instance=new self();
		$instance->remplirParam($ID, $Question, $TextReponse, $EstJuste);
		return $instance;
	}
}
?>
