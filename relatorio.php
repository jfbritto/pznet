<?php if (isset($_GET['quebra'])) {
		session_start();
		$_SESSION = array();
} ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>RELATÓRIOS</title>
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

		
		<div class="row">

			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
				<div class="panel panel-style text-center">
					<div class="panel-body">
						<div class="input-group">
                            <input type="search" class="form-control" id="data" placeholder="Nome ou código" autofocus />
                            <div class="input-group-btn">
                                <button class="btn btn-default" id="buscar" type="button" title="PESQUISAR">
                                <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                  		</div>
					</div>
				</div>	
			</div>

		</div>	
				
			
		<div class="panel panel-style">
			<div class="panel-body">	
				<div class="row">


						<div class="col-sm-12" id="dados"></div>


				</div>
			</div>
		</div>	

		<script>
			            
			
			            
			function buscar(data){
			            var page = "php/busca_relatorio_ajax.php";
			            $.ajax
			                    ({
			                        type: 'POST',
			                        dataType: 'html',
			                        url: page,
			                        beforeSend: function () {
			                            $("#dados").html("Carregando...");
			                        },
			                        data: {data: data},
			                        success: function (msg)
			                        {
			                            $("#dados").html(msg);
			                        }
			                    });
			        }
			        
			        
	        $('#buscar').click(function () {
	            buscar($("#data").val())
	        });

	        $('#data').keyup(function(e){
	                $('#buscar').click();
	        });


			$(document).ready(function(){
			    $('[data-toggle="popover"]').popover();   
			});

			function confirmacao(id){

				swal({
				  title: "Tem certeza?",
				  // text: "Your will not be able to recover this imaginary file!",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonClass: "btn-danger",
				  confirmButtonText: "Sim, deletar!",
				  closeOnConfirm: false
				},
				function(){
				  window.location.href='php/deletar.php?place=relatorio&id=' +id+'';
				});

				} 

				window.onload = function(){
		        document.getElementById("buscar").click();

			    let url = window.location;
			    let u = new URL(url);				

				let valor1 = u.searchParams.get('alterado');
			    if(valor1 == 'true')
			        swal('Alterado com sucesso!', '', 'success');

			    let valor2 = u.searchParams.get('naoalterado');
			    if(valor2 == 'true')
			        swal('Não pode ser alterado!', '', 'warning'); 

			    let valor3 = u.searchParams.get('deletado');
			    if(valor3 == 'true')
			        swal('Deletado!', '', 'success'); 
			        
			    let valor4 = u.searchParams.get('naodeletado');
			    if(valor4 == 'true')
			        swal('Não pode ser deletado!', '', 'error'); 

			    let valor5 = u.searchParams.get('acerto');
			    if(valor5 == 'true')
			        swal('Cadastrado!', '', 'success'); 
			    }
		</script>		

		<br><br><br><br>
		</div>
	</body>
</html>