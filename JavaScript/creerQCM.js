$("#buttonAjout").click(function(){
  var intitule=$("#intituleNew").val();
  var diff=$("#difficulteNew").val();
  var r1=$("#r1New").val();
  var r2=$("#r2New").val();
  var r3=$("#r3New").val();
  var r4=$("#r4New").val();
  var idQCM=$("#idQCM").val();
  var correcte=$("#correcte").val() - 1;
  $.ajax({
    type: 'POST',
    url: 'Controleur/creerQuestion.php',
    data: {idQCM: idQCM, qu: intitule, diff:diff ,r1: r1, r2: r2, r3:r3, r4:r4, correcte:correcte},
    success: function(data){
      if(data != ""){
        $("#quPrecedentes").append(data);
      }else{
        alert("il y a eu une erreur lors de l'ajout");
      }
    }
  })
})
