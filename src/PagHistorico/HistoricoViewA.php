<?php
  session_start();
  require_once("../PagUsuario/PerfilCtrl.php");

  if(!isset($_SESSION["logi"])){
    header("location: ../Login/LoginView.php");
    exit();
  }
  else{
    $login = $_SESSION["logi"];
    $dados = PegardadosCtrl($login);
    if(!$dados["adm"]){
      header("location: ../Inicial/index.php");
    }
  }

?>

<!doctype html> 
<html> 
  <head> 
    <title> historico </title> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="../Estilo/Perfil.css">
    <link rel ="stylesheet" href ="../Estilo/bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <script src="../Estilo/jquery.min.js"></script> <script src="../Estilo/popper.min.js"></script> 
    <script src ="../Estilo/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script> 
  </head> 
  
  <body>


  <script>

    
    var getJSON = function(url, callback) {

    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.timeout = 5000;

    xhr.onload = function() {

        var status = xhr.status;
        
        if (status == 200) {
            callback(null, xhr.response);
        } else {
            callback(status);
        }
    };

    xhr.send();
    };

    function callAjax(){
       
       getJSON('HistoricoAdmAjax.php',  function(err, data) {

        if (err != null) {
            console.error(err);
        } else {
            $('#tb-historico-body').html("");
            data.forEach(myFunction);

            function myFunction(item, index, arr) {

              var html = `<tr>
                            <td> ${item.id} </td>
                            <td> ${item.diahora} </td>
                            <td> ${item.usuario}</td>
                            <td> ${item.telefone}</td>
                            <td> ${item.rua} / ${item.municipio} / ${item.complemento}</td>
                            <td>`;
              for(var i = 0; i<item.itens.length; i++){
                html += `<b> ${item.itens[i].produto} ${item.itens[i].tamanho} - ${item.itens[i].preco} X ${item.itens[i].qtd} </b><br>`;
              }

              html +=   `</td>
                            <td> R$ ${item.precototal}</td>
                            <td> ${item.formapag}</td>
                            <td> <a href="ConfirmarP.php?id=${item.id}" class="btn btn-success">Confirmar</a></td>
                          </tr>`;
              
              $('#tb-historico-body').append(html);
            }
        }
        });
        }

    callAjax();
    setInterval(callAjax,5000);

</script>
  <!-- Barra de navegação -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <!-- Logo -->
  <a class="navbar-brand" href="#">
          <img src="bird.jpg" alt="Logo" style="width:40px;">
  </a>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a class="nav-link" href="../Inicial/index.php">Menu</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../Fotos/pagfotosView.php">Fotos</a> 
    </li>
  <!-- Dropdown -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
      Usuário
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="../PagUsuario/PerfilView.php">Seu perfil</a>
      <a class="dropdown-item" href="HistoricoViewA.php">Lista de Pedidos</a>
    </div>
  </li>  
  </div>
  </nav> 

  
<div class="container-fluid" style="margin-top: 100px;">
<center>
<h2>Lista de Pedidos</h2>
<hr>
</center>
<br>
<table>

<table id="tb-historico" class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Num</th>
      <th scope="col">Horário</th>
      <th scope="col">Cliente</th>
      <th scope="col">Telefone</th>
      <th scope="col">Endereço</th>
      <th scope="col">Itens</th>
      <th scope="col">Total</th>
      <th scope="col">Forma Pag</th>
      <th scope="col">Status</th>
    

    </tr>
  </thead> 
  <tbody id="tb-historico-body">
  </tbody>
</table>


</body> 
</html>