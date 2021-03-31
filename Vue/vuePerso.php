<?php
/*
éléments provisoires à changer :
- avec les sessions -> recuperer l'id de l'apprenant et faire la query en fonction de ça

*/
$titre="Mon profil";
ob_start();
?>

<form id="formApprenant" action="index.php?action=profil" method="post">
  <label for="identifiant">Id :</label>
  <input type="text" id="identifiant" name="identifiant" value="<?php echo $user->getId(); ?>" disabled><br/><br/><br/>

  <label for="prenom">Prenom : </label>
  <input type="text" id="prenom" name="prenom" value="<?php echo $user->getPrenom(); ?>" disabled>

  <label for="nom">Nom : </label>
  <input type="text" id="nom" name="nom" value="<?php echo $user->getNom(); ?>" disabled><br/><br/><br/>

  <label for="login">Login : </label>
  <input type="text" id="login" name="login" value="<?php echo $user->getLogin(); ?>" disabled>

  <label for="mdp">Mot de passe : </label>
  <input type="password" id="mdp" name="mdp" value="<?php echo $user->getMdp(); ?>" disabled><br/><br/><br/>

  <button id="applyButton" title="valider les modifications effectuées">Appliquer</button>
</form>
<button id="modifButton" title="modifier les valeurs">Modifier</button>
<script src="JavaScript/pagePerso.js"></script>

<?php
$contenu=ob_get_clean();
require 'template.php';
 ?>
