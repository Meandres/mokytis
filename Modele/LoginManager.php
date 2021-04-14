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
    $conAp=verifCredentialsApprenant($username, $password);
    $conP=verifCredentialsProf($username, $password);
    if ($conAp || $conP){
      $_SESSION["newsession"]= $username;
      if($conP)
        $_SESSION['prof']=1;
      return true;
    }else{
      return false;
    }
  }
}
