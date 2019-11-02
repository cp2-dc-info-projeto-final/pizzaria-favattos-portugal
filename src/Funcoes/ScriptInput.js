
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
    
   var auto_atualiza = setInterval(function () {
        $.get('possui_alteracao.php', function(data) {
          if (data.possui) {
            $('#meudiv').load('listadados.php');
          }
        });
      }, 30000);


