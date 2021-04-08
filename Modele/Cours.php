<?php
date_default_timezone_set('CET');

//Création de la classe cours
class Cours{
	private $idCours, $intituleCours, $professeur, $accepte, $dateAjout, $dureeEstimee;

	//get
	public function getIdCours(){
		return $this->idCours;
	}

	public function getIntituleCours(){
		return $this->intituleCours;
	}

	public function getProfesseur(){
		return $this->professeur;
	}

	public function getAccepte(){
		return $this->accepte;
	}

	public function getDateAjout(){
		return $this->dateAjout;
	}

	public function getDureeEstimee(){
		return $this->dureeEstimee;
	}

	//set
	public function setIdCours($ID){
		$this->idCours=$ID;
	}

	public function setIntituleCours($Intitule){
		$this->intituleCours=$Intitule;
	}

	public function setProfesseur($Prof){
		$this->professeur=$Prof;
	}

	public function setAccepte($Accepted){
		$this->accepte=$Accepted;
	}

	public function setDateAjout($DateAjoute){
		$this->dateAjout=$DateAjoute;
	}

	public function setDureeEstimee($Duree){
		$this->dureeEstimee=$Duree;
	}

	//constructeur par défault (peut-être à enlever ?)
	public function __construct(){}

	//constructeur pour une requete dans la base
	protected function remplirBD(array $row){
		$this->idCours=$row['idCours'];
		$this->intituleCours=$row['intituleCours'];
		$this->professeur=$row['professeur'];
		$this->accepte=$row['accepte'];
		$this->dateAjout=$row['dateAjout'];
		$this->dureeEstimee=$row['dureeEstimee'];
	}

	//constructeur pour la création de compte
	protected function remplirParam($IdCours, $IntituleCours, $Professeur, $Accepte, $DateAjout, $DureeEstimee){
		$this->idCours=$IdCours;
		$this->intituleCours=$IntituleCours;
		$this->professeur=$Professeur;
		$this->accepte=$Accepte;
		$this->dateAjout=$DateAjout;
		$this->dureeEstimee=$DureeEstimee;
	}

	public function afficherApperçu(){
		$contenu = "<div class='appercuCours'><h3>".$this->intituleCours."</h3>".$this->dateAjout."<br> ".$this->dureeEstimee."</div>";
		return $contenu;
	}

	//fabrique de classe (à partir d'une requete à la base)
	public static function avecBD(array $row){
		$instance=new self();
		$instance->remplirBD($row);
		return $instance;
	}

	//fabrique de classe (pour la creation d'un cours)
	public static function creeCours($IdCours, $IntituleCours, $Professeur, $DateAjout, $DureeEstimee){
		$instance=new self();
		$instance->remplirParam($IdCours, $IntituleCours, $Professeur, false, date('Y-m-d H:i:s'), $dureeEstimee);
		return $instance;
	}

	//fabrique de classe (pour le clonage)
	public static function avecModele($IdCours, $IntituleCours, $Professeur, $Accepte, $DateAjout, $DureeEstimee){
		$instance=new self();
		$instance->remplirParam($IdCours, $IntituleCours, $Professeur, $Accepte, $DateAjout, $DureeEstimee);
		return $instance;
	}


}

?>
