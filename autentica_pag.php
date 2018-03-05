<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>AUTENTICA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="icon" href="imagens/pdf.png">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/javas.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
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

      

      
          <div class="row" style="margin-top: 10%">
            <div class="col-xs-2 col-sm-2 col-md-3 col-lg-4"></div>
            <div class="col-xs-8 col-sm-8 col-md-6 col-lg-4">
              <div class="panel panel-style">
                <div class="panel-body">
                  <form method="POST" action="php/autentica.php">
                    
                    <div class="form-inline text-center">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="senha" placeholder="senha"  required autofocus>
                      </div>    
                      <button class="btn btn-primary br">ENTRAR</button><br> 
                    </div>
                  
                  </form>
                </div>
              </div>  

            </div>
            <div class="col-xs-2 col-sm-2 col-md-3 col-lg-4"></div>
          </div>
        
      
        <script type="text/javascript">
            window.onload = function(){
            let url = window.location;
            let u = new URL(url);       

            let valor1 = u.searchParams.get('senha');
            if(valor1 == 'true')
                swal('', 'Senha incorreta!', 'error');

            }
        </script>
        </div>
      </div>
  </body>
</html>      