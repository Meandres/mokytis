<?php
date_default_timezone_set('CET');

class SujetForum{
	private $idSujetForum, $titre, $contenu, $cours, $matiere, $auteur, $datePubli;

	//get
	public function getIdSujetForum(){ return $this->idSujetForum; }

	public function getTitre(){ return $this->titre; }

	public function getContenu(){ return $this->contenu; }

	public function getCours(){ return $this->cours; }
	
	public function getMatiere(){ return $this->matiere; }

	public function getAuteur(){ return $this->auteur; }
	
	public function getDatePubli(){ return $this->datePubli; }
	
	//set
	public function setIdSujetForum($ID){ $this->idSujetForum=$ID; }
	
	public function setTitre($Titre){ $this->titre=$Titre; }
	
	public function setContenu($Contenu){ $this->contenu=$Contenu; }
	
	public function setCours($Cours){ $this->cours=$Cours; }
	
	public function setMatiere($Matiere){ $this->matiere=$Matiere; }

	public function setAuteur($Auteur){ $this->auteur=$Auteur; }

	public function setDatePubli($DateP){ $this->datePubli=$DateP; }

	//constructeur par défault (peut-être à enlever ?)
	public function __construct(){}
	
	//constructeur pour une requete dans la base
	protected function remplirBD(array $row){
		$this->idSujetForum=$row['idSujetForum'];
		$this->titre=$row['titre'];
		$this->contenu=$row['contenu'];
		$this->cours=$row['cours'];
		$this->matiere=$row['matiere'];
		$this->auteur=$row['auteur'];
		$this->datePubli=$row['datePubli'];
	}

	//constructeur pour la création d'un sujet de forum
	protected function remplirParam($ID, $Titre, $Contenu, $Cours, $Matiere, $Auteur, $DateP){
		$this->idSujetForum=$ID;
		$this->titre=$Titre;
		$this->contenu=$Contenu;
		$this->cours=$Cours;
		$this->matiere=$Matiere;
		$this->auteur=$Auteur;
		$this->datePubli=$DateP;
	}

	public function afficherApperçu(){
		$affichage = "<a class='sujet' href='index.php?action=Sujets&idSujet=".$this->idSujetForum."' ><div class='appercuSujet'><h3>".$this->titre."</h3>".$this->datePubli."<br> ".$this->contenu."</div></a>";
		return $affichage;
	}

	//fabrique de classe (à partir d'une requete à la base)
	public static function avecBD(array $row){
		$instance=new self();
		$instance->remplirBD($row);
		return $instance;
	}

	//fabrique de classe (pour la creation d'un sujet de forum)
	public static function creeSujetForum($ID, $Titre, $Contenu, $Cours, $Matiere, $Auteur){
		$instance=new self();
		$instance->remplirParam($ID, $Titre, $Contenu, $Cours, $Matiere, $Auteur, date('Y-m-d H:i:s'));
		return $instance;
	}

	//fabrique de classe (pour le clonage)
	public static function avecModele($ID, $Titre, $Contenu, $Cours, $Matiere, $Auteur, $DateP){
		$instance=new self();
		$instance->remplirParam($ID, $Titre, $Contenu, $Cours, $Matiere, $Auteur, $DateP);
		return $instance;
	}
}
?>