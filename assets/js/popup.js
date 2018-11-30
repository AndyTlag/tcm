function apagaLivro(codLivro){
    var popup = document.querySelector(".delete"); 
    var btnc = document.querySelector(".btnCancel");    
    
    btnc.addEventListener("click",function(){
        popup.style.display="none";
    });
    
    popup.style.display="block";
    document.getElementById("cod_anuncio").value = codLivro;
}
