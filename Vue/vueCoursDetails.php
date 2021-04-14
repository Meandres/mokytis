<?php
ob_start();
?>
<h1><?php echo $cours->getIntituleCours(); ?></h1>
<div class="cours-container">

  <div class="info-cours">
    <?php echo "réalisé par : ".$cours->getProfesseur(); ?> <br>
    <?php echo "date d'ajout : ".$cours->getDateAjout(); ?> <br>
    <?php echo "temps estimé du cours : ".$cours->getDureeEstimee()." minutes"; ?> <br>
  </div>
  <div class="cours-ecrit">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum ipsum ut viverra tincidunt. Mauris vitae vestibulum nulla, ut malesuada nibh. Aliquam erat volutpat. Vestibulum nec erat ut mauris bibendum sodales id et urna. Curabitur consequat nec enim eu tempor. Fusce ut lorem et mi euismod placerat. Maecenas scelerisque venenatis odio at dictum.

    Sed mauris tellus, tincidunt vel iaculis id, elementum eu nibh. Duis eget mattis orci, sed pretium urna. Maecenas laoreet lobortis nisi, in tincidunt risus lobortis at. Aenean vel massa arcu. Vestibulum malesuada orci ut consequat mattis. Pellentesque gravida erat vel justo mollis laoreet. Aliquam sed porttitor arcu, eget iaculis massa. Maecenas vel erat metus. Pellentesque id interdum purus, sit amet finibus libero. Sed et risus id purus fringilla semper ac et augue. Maecenas lobortis mauris ut magna mollis, non ultricies velit finibus. Nam et laoreet nisl. Etiam ullamcorper diam et odio congue, ac luctus tortor efficitur. Pellentesque feugiat justo nec elit lobortis efficitur. Vestibulum ultrices dolor nec diam bibendum consequat. Donec quis feugiat ligula.

    Integer consectetur molestie lorem nec hendrerit. Donec malesuada, lorem eu viverra ullamcorper, mi orci efficitur leo, ac mattis ipsum erat quis risus. Donec faucibus pharetra sapien, ut facilisis nibh aliquet sed. Proin sed vulputate leo, ut aliquam est. Mauris eu auctor urna. Duis feugiat dui et feugiat ornare. Nulla eu nisl est. Nunc et sodales nulla.

    Cras volutpat ut mauris accumsan placerat. Phasellus at arcu luctus, porta dolor nec, semper dolor. Aliquam sed tincidunt erat. Maecenas et rhoncus quam. Ut quis malesuada nulla. In ut condimentum risus, pretium sodales ex. Phasellus ipsum dui, sollicitudin eu odio ut, congue feugiat tellus. Sed viverra arcu a molestie aliquam. Mauris facilisis ante justo, in varius sem facilisis quis. Suspendisse potenti. Vestibulum egestas libero sed nibh facilisis, at gravida eros maximus. Nullam accumsan pretium consectetur.

    Vestibulum malesuada lectus est. Quisque dolor tortor, aliquam at faucibus non, dignissim rutrum metus. Praesent ornare massa vitae risus tempor dictum. Vivamus sit amet hendrerit nisi. Praesent a interdum ligula, quis vulputate quam. Etiam dapibus consectetur urna, vel hendrerit nisl fringilla sit amet. Nulla venenatis nibh lectus, at viverra leo malesuada non. Ut eleifend quam id nunc suscipit elementum. Praesent quis blandit lacus.
    </div>
    <div class="container-button">
        <?php
        if(isset($_SESSION['prof'])){?>
          <a href="index.php?action=ajoutModifCours&idCours=<?php echo $cours->getIdCours();?>">
           <button id="bModif" name="buttonModif">Modifier le cours</button>
         </a>
       <?php }else{ ?>
          <a href="index.php?action=coursDetails&idCours="<?php echo $cours->getIdCours();?>>
            <button id="bQCM" name="buttonQCM"> Faire le test</button>
          </a>
        <?php
        }
       ?>
    </div>
</div>
<?php
$contenu=ob_get_clean();
require 'template.php';

 ?>
