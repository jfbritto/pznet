<?php 
session_start();
if (!isset($_SESSION['senha'])) {
	header('location: autentica_pag.php?vazio=true');
}

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>RESUMO</title>
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
		      <li><a href="index.php?quebra=true">FORMULÁRIO</a></li>
		      <li><a href="relatorio.php?quebra=true">RELATÓRIOS</a></li>
		      <li><a href="resumo.php">RESUMO MÊS</a></li>
		      <li><a href="resumo_ano.php">RESUMO ANO</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right menu">
		      <li><a href="sobre.php?quebra=true">SOBRE</a></li>
		    </ul> 
		    </div>   
		  </div>
		</nav>
		

		<?php

			if (!isset($_POST['ano'])) {
				$ano = date('Y');
			}

			if (isset($_POST['ano'])) {
				$ano = $_POST['ano'];
			}

			include('php/config.php');

			$query = mysqli_query($conexao, "SELECT sum(total) as total, sum(totalvenda) as totalvenda, sum(totalservico) as totalservico, 
											 count(cliente) as qntd, extract(month from data) mes, extract(year from data) ano 
											 FROM clientes 
											 WHERE Year(data) = $ano group by mes, ano;");

            $queryano = mysqli_query($conexao, "SELECT extract(year from data) ano FROM clientes group by ano;"); 



		?>

		<div class="container fadeIn">

		
				<div class="row">
					
					<div class="col-xs-1 col-sm-4 col-md-2"></div>

					<!-- <div class="col-xs-1 col-sm-1 col-md-2"></div> -->
					<div class="col-xs-10 col-sm-4 col-md-8">
						<div class="panel panel-style">
							<div class="panel-body">
								<div class="form-inline text-center">
									<form method="POST">
										<center>
												
										<select style="width: 100px" class="form-control" name="ano">	
											<option value="<?php echo $ano;?>"><?php echo $ano;?></option>

											<?php while($result2 = mysqli_fetch_array($queryano)): ?>    
                                            <option value="<?php echo $result2['ano'];?>"><?php echo $result2['ano'];?></option>
                                            <?php endwhile ?>

										</select>

										<button class="btn btn-primary br">BUSCAR</button>
										</center>
									</form>
								</div>
							</div>
					<!-- <div class="col-xs-1 col-sm-1 col-md-2"></div> -->
				</div>
			</div>

			<div class="col-xs-1 col-sm-4 col-md-2"></div>

		</div>

		
				

		<div class="panel panel-style">
			<div class="panel-body">	

						<h3 class="text-center" style="color: white"><?php echo $ano;?></h3>
						<br>
						<section class="panel col-lg-9" style="width: 100%">
						
						<table class="table table-hover table-striped table-bordered">
							<thead>
							<tr class="titulo" bgcolor="white">
								<th>MES</th>
								<th>REPAROS</th>
								<th>TOTAL SERVIÇOS</th>
								<th>TOTAL VENDAS</th>
								<th>TOTAL</th>
							</tr>
							</thead>


							<tbody>
							<?php while($result = mysqli_fetch_array($query)): ?>
								<?php

									if ($result['mes'] == 1) {
										$result['mes'] = "JANEIRO";
									} elseif ($result['mes'] == 2) {
										$result['mes'] = "FEVEREIRO";
									} elseif ($result['mes'] == 3) {
										$result['mes'] = "MARÇO";
									} elseif ($result['mes'] == 4) {
										$result['mes'] = "ABRIL";
									} elseif ($result['mes'] == 5) {
										$result['mes'] = "MAIO";
									} elseif ($result['mes'] == 6) {
										$result['mes'] = "JUNHO";
									} elseif ($result['mes'] == 7) {
										$result['mes'] = "JULHO";
									} elseif ($result['mes'] == 8) {
										$result['mes'] = "AGOSTO";
									} elseif ($result['mes'] == 9) {
										$result['mes'] = "SETEMBRO";
									} elseif ($result['mes'] == 10) {
										$result['mes'] = "OUTUBRO";
									} elseif ($result['mes'] == 11) {
										$result['mes'] = "NOVEMBRO";
									} elseif ($result['mes'] == 12) {
										$result['mes'] = "DEZEMBRO";
									};

								?>
								<tr class="muda">
									<td style="vertical-align:middle"><?php echo $result['mes']; ?></td>
									<td style="vertical-align:middle"><?php echo $result['qntd']; ?></td>
									<td style="vertical-align:middle">R$<?php echo number_format($result['totalservico'], 2, ',', '.'); ?></td>
									<td style="vertical-align:middle">R$<?php echo number_format($result['totalvenda'], 2, ',', '.'); ?></td>
									<td style="vertical-align:middle">R$<?php echo number_format($result['total'], 2, ',', '.'); ?></td>

								</tr>
							
							<?php endwhile ?>	
							</tbody>
						</table>
						</section>
				</div>

			</div>





		 	<?php 
				include('php/config.php');

				$query2 = mysqli_query($conexao, "SELECT sum(total) as total, sum(totalvenda) as totalvenda, sum(totalservico) as totalservico, 
												 count(cliente) as qntd, extract(year from data) ano 
												 FROM clientes 
												 WHERE Year(data) = $ano group by ano;");
				$result2 = mysqli_fetch_array($query2);

	

			?>

			<div class="panel panel-style">
				<div class="panel-body">
					<div class="row text-center">
						<div class="col-sm-2 col-md-3 dados">
							<label>REPAROS: </label>
							<label class="color-label"><?php echo $result2['qntd'] ; ?></label>
						</div>
						<div class="col-sm-4 col-md-3 dados">
							<label>SERVIÇOS: </label>
							<label class="color-label">R$<?php echo number_format($result2['totalservico'], 2, ',', '.'); ?></label>
						</div>
						<div class="col-sm-3 col-md-3 dados">
							<label>VENDAS: </label>
							<label class="color-label">R$<?php echo number_format($result2['totalvenda'], 2, ',', '.'); ?></label>
						</div>
						<div class="col-sm-3 col-md-3 dados">
							<label>TOTAL: </label>
							<label class="color-label">R$<?php echo number_format($result2['total'], 2, ',', '.'); ?></label>
						</div>
					</div>
				</div>
			</div>

			
	



		<script>
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
				  window.location.href='php/deletar.php?place=resumo&id=' +id+'';
				});

				}

			window.onload = function(){
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



