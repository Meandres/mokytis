<?php
date_default_timezone_set('CET');

class ReponseForum{
	private $idRepForum, $contenu, $sujet, $auteur, $datePubli;

	//get
	public function getIdRepForum(){ return $this->idRepForum; }

	public function getContenu(){ return $this->contenu; }

	public function getSujet(){ return $this->sujet; }

	public function getAuteur(){ return $this->auteur; }

	public function getDatePubli(){ return $this->datePubli; }

	//set
	public function setIdRepForum($ID){ $this->idRepForum=$ID; }

	public function setContenu($Contenu){ $this->contenu=$Contenu; }

	public function setCours($Sujet){ $this->sujet=$Sujet; }

	public function setAuteur($Auteur){ $this->auteur=$Auteur; }

	public function setDatePubli($DateP){ $this->datePubli=$DateP; }

	//constructeur par défault (peut-être à enlever ?)
	public function __construct(){}

	//constructeur pour une requete dans la base
	protected function remplirBD(array $row){
		$this->idRepForum=$row['idRepForum'];
		$this->contenu=$row['contenu'];
		$this->sujet=$row['sujet'];
		$this->auteur=$row['auteur'];
		$this->datePubli=$row['datePubli'];
	}

	//constructeur pour la création d'une reponse a un sujet du forum
	protected function remplirParam($ID, $Contenu, $Sujet, $Auteur, $DateP){
		$this->idRepForum=$ID;
		$this->contenu=$Contenu;
		$this->sujet=$Sujet;
		$this->auteur=$Auteur;
		$this->datePubli=$DateP;
	}

	public function afficherApperçu(){
		$affichage = "<a class='reponse'><div class='appercuSujet'><h3>".$this->contenu."</h3>".$this->datePubli."<br> ".$this->auteur."</div></a>";
		return $affichage;
	}

	//fabrique de classe (à partir d'une requete à la base)
	public static function avecBD(array $row){
		$instance=new self();
		$instance->remplirBD($row);
		return $instance;
	}

	//fabrique de classe (pour la creation d'une reponse a un sujet du forum)
	public static function creeSujetForum($ID, $Contenu, $Sujet, $Auteur){
		$instance=new self();
		$instance->remplirParam($ID, $Contenu, $Sujet, $Auteur, date('Y-m-d H:i:s'));
		return $instance;
	}

	//fabrique de classe (pour le clonage)
	public static function avecModele($ID, $Contenu, $Sujet, $Auteur, $DateP){
		$instance=new self();
		$instance->remplirParam($ID, $Contenu, $Sujet, $Auteur, $DateP);
		return $instance;
	}
}
?>
