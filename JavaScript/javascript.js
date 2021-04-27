var nbQuestion = 0;
var tabReponse = [];
var resultat = false;
var appuye = false;

//permet de faire apparaitre le menu a droite pour le profil
$("#profilContainer").hide();
$("#profil-hamburger").click(function(){
  $("#profilContainer").toggle( "slide" ,{ direction: "right"});
  if(appuye){
    $("#profil-hamburger").css("color", "black");
    appuye = false;
  }else{
      $("#profil-hamburger").css("color", "white");
      appuye = true;
  }
});

// fonction qui permet d'ajouter/supprimer un cours de mes cours
$(".ajoutButton").click(function(){
  var modif = "";
  if($(this).html() == "<i class=\"material-icons\">check</i>"){
    $(this).html("<i class='material-icons'>add</i>");
    modif = "suppression";

  }else{
    $(this).html("<i class='material-icons'>check</i>")
    modif = "ajout";
  }
  $.ajax({
    type: 'POST',
    url: 'Controleur/gestionCoursSuivi.php',
    data : {idCours: $(this).attr('id'), modification: modif },
    success : function(data){
      if(data != ""){
        console.log(data);
      }
    }
  })
})




//barre de recherche dans mes cours
$(document).ready(function(){
  $("#researchBar").keyup(function(){
    var cours = $(this).val();
     $.ajax({
       type: 'POST',
       url: 'Controleur/researchBar.php',
       data :'cours='+ cours,
       success : function(data){
         if(data != ""){
           $('#result-container').html("");
           $('#result-container').append(data);
         }else{
           $('#result-container').html("<span> Aucun cours trouve </span>")
         }
       }
     })
  })


//gestion qcm
  $("#buttonQuestion").click(function(){
    if(resultat == false){
      if (nbQuestion > 0){
        tabReponse.push($('.questionCheckbox:checked').attr('id'));
      }
      nbQuestion++;
      console.log(tabReponse);
      $("#titreQcm").html("question n°"+nbQuestion);
      $("#buttonQuestion").html("question suivante");
      $.ajax({
        type: 'POST',
        url: 'Controleur/qcmHandler.php',
        data: {question: nbQuestion, idQcm: $('#idQcm').val(),listeReponse: tabReponse },
        success: function(data){
          if (data != ""){
            data = data.split("@:")
            if(data[0] == "fini"){
              resultat = true;
              $('#question').html(data[1]);
              $("#buttonQuestion").html("revenir a l'accueil");
              $("#titreQcm").html("Résultat");
            }else{
              $('#question').html(data[0]);
            }
          }
        }
      })
    }else{
      window.location.replace("index.php");
    }
  })
})
