<?php

/*

Cette classe permet la gestion de la connexion des utilisateurs

*/
class LoginManager{
  public function registerUser($username, $password)
	{
    //TO DO
	}
  public function loginUser($username, $password){
    $idAppr=verifCredentialsApprenant($username, $password);
    $conP=verifCredentialsProf($username, $password);
    if ($idAppr != -1 || $conP){
      $_SESSION["newsession"]= $idAppr;
      if($conP)
        $_SESSION['prof']=1;
      return true;
    }else{
      return false;
    }
  }
}
