<?php if (isset($_GET['quebra'])) {
    session_start();
    $_SESSION = array();
} ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>SOBRE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="icon" href="imagens/pdf.png">
    <script type="text/javascript" src="js/javas.js"></script>
  </head>
  <body>

    <!--cabeçalho-->
    <nav class="navbar navbar-default bar">
      <div class="container-fluid">
        <div class="navbar-header">

          <img class="img" width="150px" src="imagens/pz.png">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
        <span class="sr-only">Alternar Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button> 

        </div>
        <div class="collapse navbar-collapse" id="barra-navegacao">
        <ul class="nav navbar-nav">
          <li><a href="index.php">FORMULÁRIO</a></li>
          <li><a href="relatorio.php">RELATÓRIOS</a></li>
          <li><a href="autentica_pag.php">RESUMO MÊS</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right menu">
          <li><a href="sobre.php">SOBRE</a></li>
        </ul> 
        </div>   
      </div>
    </nav>

    <div class="container fadeIn">

      <center>
        <div style="color: white"><br>
          <h1 class="sobre-h1">Sistema de relatórios PZ NET</h1><hr width="40%">
          <h3 class="sobre-h3">Desenvolvido para auxiliar no cadastro das máquinas reparadas</h3>
          <h4 class="sobre-h4">João Filipi Britto</h4>
          <h4>2017</h4>
          <img src="imagens/jf.jpg" class="img-circle rotate"><br><br>
          <h5>Suporte:</h5>
          <h5>(28)99974-3099</h5>
          <h5>jf.britto@hotmail.com</h5>
        </div>
      </center>

    </div>
  </body>
</html>







