<?php
date_default_timezone_set('CET');

class Apprenant{
  private $id, $nom, $prenom, $login, $mdp, $dateInscription, $dateDerniereConnexion;

  public function getId(){
    return $this->id;
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
  public function getDateInscription(){
    return $this->dateInscription;
  }
  public function getDateDerniereConnexion(){
    return $this->dateDerniereConnexion;
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
  public function setDateInscritption($date){
    $this->dateInscription=$date;
  }
  public function setDateDerniereConnexion($date){
    $this->dateDerniereConnexion=$date;
  }
  //constructeur par défault (peut-être à enlever ?)
  public function __construct(){}
  //constructeur pour une requete dans la base
  protected function remplirBD(array $row){
    $this->id=$row['id'];
    $this->nom=$row['nom'];
    $this->prenom=$row['prenom'];
    $this->login=$row['login'];
    $this->mdp=$row['mdp'];
    $this->dateInscription=$row['dateInscription'];
    $this->dateDerniereConnexion=$row['dateDerniereConnexion'];
  }
  //constructeur pour la création de compte
  protected function remplirParam($Id, $Nom, $Prenom, $Login, $Mdp){
    $this->id=$Id;
    $this->nom=$Nom;
    $this->prenom=$Prenom;
    $this->login=$Login;
    $this->mdp=$Mdp;
    $this->dateInscription=date("Y-m-d H:i:s");
    $this->dateDerniereConnexion=date("Y-m-d H:i:s");
  }
  //fabrique de classe (à partir d'une requete à la base)
  public static function avecBD(array $row){
    $instance=new self();
    $instance->remplirBD($row);
    return $instance;
  }
  //fabrique de classe (à partir de paramètres)
  public static function avecParams($Id, $Nom, $Prenom, $Login, $Mdp){
    $instance=new self();
    $instance->remplirParam($Id, $Nom, $Prenom, $Login, $Mdp);
    return $instance;
  }
}

 ?>
