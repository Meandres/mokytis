var nbQuestion = 0;
var tabReponse = [];
var resultat = false;

$("#profilContainer").hide();
$("#profil").click(function(){
  $("#profilContainer").toggle( "slide" ,{ direction: "right"});
});



$(document).ready(function(){
  $("#reacherchBar").keyup(function(){
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
