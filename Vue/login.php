<?php
$titre="Mokytis";

ob_start();
?>

<form class="" action="index.php?action=login" method="post">
  <label for="username"></label>
  <input type="text" name="username" value="">
  <label for="password"></label>
  <input type="text" name="password" value="">
  <button type="submit" name="button" >Se Connecter</button>
</form>

<?php



$contenu=ob_get_clean();
require 'template.php';
?>
