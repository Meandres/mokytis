
$("#profilContainer").hide();


$("#profil").click(function(){
  $("#profilContainer").toggle( "slide" ,{ direction: "right"});
});



$(document).ready(function(){
  $("#reacherchBar").keyup(function(){
    $('#result-container').html("");
    var cours = $(this).val();
     $.ajax({
       type: 'POST',
       url: 'Controleur/rechercheBar.php',
       data :'cours='+ cours,
       success : function(data){
         if(data != ""){
           $('#result-container').append(data);
         }else{
           $('#result-container').html("<span> Aucun cours trouve </span>")
         }
       }
     })    
  })
})
