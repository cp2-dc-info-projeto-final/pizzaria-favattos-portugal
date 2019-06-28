    //Verifica se há pelo menos um sexo selecionado 
    function validate()
    {
    var i = 0, counter = 0, sexo;
    sexo = document.forms[0].sexo;
    for (; i < sexo.length; i++) {
    if (sexo[i].checked) {
      counter++;
        }
    }
    if (counter==0){
    alert("Selecione o sexo")
    return false;
    }
    return true; 		   
    }
    //permite somente letras no input 
    function letras(){ 
    tecla = event.keyCode; 
    if (tecla >= 33 && tecla <= 64 || tecla >= 91 && tecla <= 93 || tecla >= 123 && tecla <= 159 || tecla >= 162 && tecla <= 191 ){ 
        return false; 
    }else{ 
        return true; 
         } 
    }
    //permite somente numeros no input 
    function numeros(){ 
    tecla = event.keyCode; 
    if (tecla >= 48 && tecla <= 57){ 
        return true; 
    }else{ 
        return false; 
         } 
    }
    //permite somente numeros e letras, sem caracteres especiais e espaços --> para a senha e login
    function senhaLogin(){
        tecla = event.keyCode;
        if(tecla>=48 && tecla<=57 || tecla>=94 && tecla <=122){
            return true;
        }else{
            return false;
        }   
    }
    //permite somente numeros e letras, sem caracteres especiais --> para o endereço
    function endereco(){
        tecla = event.keyCode;
        if(tecla>=8 && tecla<=27 || tecla>=48 && tecla<=57 || tecla>=94 && tecla <=122){
            return true;
        }else{
            return false;
        }   
    }

