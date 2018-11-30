var inputs = document.getElementsByClassName('form_input');
/* criando uma variavel do tipo vetor que pegara no meu documento todos os elementos que possuem a classe form_input */

for(var j=0 ; j <inputs.length; j++){
    /* criando uam variavel J e atribuiundo o valod zero a ela, inputs.length -> vai contar quantos elementos 
    existem dentro do vetor inputs*/
    
    inputs[j].addEventListener('keyup', function(){
        /*pegando o elemento na posição 0 e associando o evento keyup a este elemento*/
        if(this.value.length>=1){
            /*se o numero de caracteres do elemteno de posição 0 for >=1*/
            this.nextElementSibling.classList.add('subirtexto');
            /*Adicione a classe subirtexto a  algo associado a este elemento */
        }
            else{
                this.nextElementSibling.classList.remove('subirtexto');
            }
    });
    
}

function verificaForm(){
           genero = document.Livform.Genero.value
           email = document.Livform.contato.value
           senha = document.Livform.txtSenha.value

    
            if(email.indexOf('@') ==-1 || email.indexOf('.') ==-1 ){
                
                alert("Favor informar um endereço de E-mail valido");
                return false;
            }
    if (senha.value == "" || senha.length <= 5 || senha.length >= 11){
        
        alert("Favor imforme uma senha de 6 a 10 digitos");
        return false;
        
    }

            if (genero=="Selecione o Genero"){
                alert("Por favor selecione o genero principal do livro!");
                document.Livform.Genero.focus();
                return false;
            }

}
