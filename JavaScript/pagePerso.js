var btnModif=document.getElementById("modifButton"),
    btnApply=document.getElementById("applyButton"),
    inPrenom=document.getElementById("prenom"),
    inNom=document.getElementById("nom"),
    inLogin=document.getElementById("login"),
    inMdp=document.getElementById("mdp");


btnModif.onclick = function(){
    console.log("visible/invisible");
    if (inPrenom.hasAttribute('disabled')){
        inPrenom.removeAttribute('disabled');
        inNom.removeAttribute('disabled');
        inLogin.removeAttribute('disabled');
        inMdp.removeAttribute('disabled');
        inPrenom.focus();
    } else {
        inPrenom.setAttribute('disabled',true);
        inNom.setAttribute('disabled',true);
        inLogin.setAttribute('disabled',true);
        inMdp.setAttribute('disabled',true);
    }
};
