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
    if ($username == "admin" && $password == "admin"){

      $_SESSION["newsession"]= $username;
      return true;
    }else{
      return false;
    }
  }
}
