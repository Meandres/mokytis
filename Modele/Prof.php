<?php
date_default_timezone_set('CET');

class Apprenant{
  private $idProf, $nom, $prenom, $login, $mdp;

  public function getId(){
    return $this->idAppr;
  }
  public function getNom(){
    return $this->nom;
  }
  public function getPrenom(){
    return $this->prenom;
  }
  public function getLogin(){
    return $this->login;
  }
  public function getMdp(){
    return $this->mdp;
  }
  public function setId($ID){
    $this->id=$ID;
  }
  public function setNom($Nom){
    $this->nom=$Nom;
  }
  public function setPrenom($Prenom){
    $this->prenom=$Prenom;
  }
  public function setLogin($Login){
    $this->login=$Login;
  }
  public function setMdp($Mdp){
    $this->mdp=$Mdp;
  }

  public function modifChamps($Nom, $Prenom, $Login, $Mdp){
    $this->nom=$Nom;
    $this->prenom=$Prenom;
    $this->login=$Login;
    $this->mdp=$Mdp;
  }
  //constructeur par défault (peut-être à enlever ?)
  public function __construct(){}
  //constructeur pour une requete dans la base
  protected function remplirBD(array $row){
    $this->idProf=$row['idProf'];
    $this->nom=$row['nom'];
    $this->prenom=$row['prenom'];
    $this->login=$row['login'];
    $this->mdp=$row['mdp'];
  }
  //constructeur pour la création de compte
  protected function remplirParam($Id, $Nom, $Prenom, $Login, $Mdp){
    $this->idProf=$Id;
    $this->nom=$Nom;
    $this->prenom=$Prenom;
    $this->login=$Login;
    $this->mdp=$Mdp;
  }
  //fabrique de classe (à partir d'une requete à la base)
  public static function avecBD(array $row){
    $instance=new self();
    $instance->remplirBD($row);
    return $instance;
  }
  //fabrique de classe (pour la creation de compte)
  public static function creeCompte($Id, $Nom, $Prenom, $Login, $Mdp){
    $instance=new self();
    $instance->remplirParam($Id, $Nom, $Prenom, $Login, $Mdp);
    return $instance;
  }
  //fabrique de classe (pour le clonage)
  public static function avecModele($Id, $Nom, $Prenom, $Login, $Mdp){
    $instance=new self();
    $instance->remplirParam($Id, $Nom, $Prenom, $Login, $Mdp);
    return $instance;
  }
}

 ?>
