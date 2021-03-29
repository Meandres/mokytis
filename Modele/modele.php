<?php
/*Todo :
  -revoir la gestion des erreurs (peut-être avec des vues spécifiques donc pas dans ce fichier-ci).
*/
require 'Apprenant.php';
require 'conf.php';

/*
Fonction réalisant l'ouverture de la connection à la base de données.
Entrée : paramètres de connection contenus dans le fichier conf.php
Sortie : objet PDO
*/
function ouvrirConnexion(){
  try{
      $dbConn=new PDO('mysql:host=localhost; dbname=mokytis', $dbLogin, $dbMdp);
      return $dbConn;
  }catch(PDOException $e){
    print "Erreur !: ".$e->getMessage() ."<br/>";
    return null;
  }
}
/*
PDO::exec() mais avec la gestion d'erreur en plus
*/
function execute($dbConn, $requete){
  try{
    $res=$dbConn->exec($requete);
    return $res;
  }catch (PDOException $e){
    echo "Erreur !: ".$e->getMessage()."<br/>";
    return null;
  }
}
/*
PDO::query() mais avec la gestion d'erreur en plus
*/
function query($dbConn, $requete){
  try{
    $res=$dbConn->query($requete);
  }catch(PDOException $e){
    echo "Erreur !; ".$e->getMessage()."<br/>";
    return null;
  }
}
/*
Fonction permettant de récuperer les informations d'un apprenant
Entrée : ID de l'apprenant
Sortie : Objet instanciée depuis Apprenant()
*/
function getApprennant($id){
  $dbConn=ouvrirConnexion();
  $requete="select * from apprenants where id=".$id;
  $records=query($dbConn, $requete);
  $ap=Apprenant::avecBD($records.fetch());
  var_dump($ap);
  return $ap;
}


 ?>
