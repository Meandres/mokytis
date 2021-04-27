<?php
$titre="Mokytis";

ob_start();
?>
<h1>Connexion au site</h1>

<form class="login" action="index.php?action=login" method="post">
  <div class="">
    <label for="username">Identifiant</label>
    <input type="text" name="username" value="">
  </div>
  <div class="">
    <label for="password">Mot de passe</label>
    <input type="text" name="password" value="">
  </div>
  <button type="submit" name="button"  >Se Connecter</button>
</form>

<?php



$contenu=ob_get_clean();
require 'template.php';
?>
