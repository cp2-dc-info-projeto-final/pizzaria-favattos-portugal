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
    if ((tecla==32) ||
        (tecla > 64 && tecla < 91) || 
        (tecla > 96 && tecla < 123) ||
        (tecla > 191 && tecla <= 255)){ 
        return true; 
    }else{ 
        return false; 
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
        if((tecla > 64 && tecla < 91) || 
            (tecla > 96 && tecla < 123) ||
            (tecla >= 48 && tecla <= 57)){
            return true;
        }else{
            return false;
        }   
    }
    //permite somente numeros e letras, sem caracteres especiais --> para o endereço
    function local(){
        tecla = event.keyCode;
        if((tecla==32) ||
            (tecla > 64 && tecla < 91) || 
            (tecla > 96 && tecla < 123) ||
            (tecla > 191 && tecla <= 255)||
            (tecla >= 48 && tecla <= 57)){
            return true;
        }else{
            return false;
        }   
    }


