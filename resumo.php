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

			if (!isset($_POST['mes'])) {
				$mes = date('m');
				$ano = date('Y');
			}

			if (isset($_POST['mes'])) {
				$mes= $_POST['mes'];
				$ano = $_POST['ano'];
			}

			include('php/config.php');

			$total1 = "SELECT SUM(totalservico) as totalservico FROM clientes where month(data)= $mes and YEAR(data)= $ano";	
			$busca1 = mysqli_query($conexao, $total1) or die(mysqli_error());
			$total1 = mysqli_fetch_array($busca1)['totalservico'];
			$totalservico = number_format($total1, 2);	

			$total2 = "SELECT SUM(totalvenda) as totalvenda FROM clientes where month(data)= $mes and YEAR(data)= $ano";	
			$busca2 = mysqli_query($conexao, $total2) or die(mysqli_error());
			$total2 = mysqli_fetch_array($busca2)['totalvenda'];	
			$totalvenda = number_format($total2, 2);	

			$total3 = "SELECT SUM(total) as total FROM clientes where month(data)= $mes and YEAR(data)= $ano";	
			$busca3 = mysqli_query($conexao, $total3) or die(mysqli_error());
			$total3 = mysqli_fetch_array($busca3)['total'];
			$total = number_format($total3, 2);	

			$query = mysqli_query($conexao, "SELECT * FROM clientes where month(data)= $mes and YEAR(data)= $ano");

			$querymes = mysqli_query($conexao, "SELECT extract(month from data) mes FROM clientes group by mes;");
            $queryano = mysqli_query($conexao, "SELECT extract(year from data) ano FROM clientes group by ano;"); 



		?>

		<div class="container fadeIn">

		
				<div class="row">
					

					<!-- <div class="col-xs-1 col-sm-1 col-md-2"></div> -->
					<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-8 col-md-offset-2">
						<div class="panel panel-style">
							<div class="panel-body">
								<div class="form-inline text-center">
									<form method="POST">
										<center>
													
										<select style="width: 100px" class="form-control br" name="mes">
											<option value="<?php echo $mes;?>"><?php echo $mes;?></option>	

											<?php while($result = mysqli_fetch_array($querymes)): ?>    
                                            <option value="<?php echo $result['mes'];?>"><?php echo $result['mes'];?></option>
                                            <?php endwhile ?>

										</select>

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


		</div>

		
				

		<div class="panel panel-style">
			<div class="panel-body">	


						<h3 class="text-center" style="color: white"><?php echo $mes . "/" . $ano;?></h3>
						<br>
						<section class="panel col-lg-9" style="width: 100%">
						
						<table class="table table-hover table-striped table-bordered">
							<thead>
							<tr class="titulo" bgcolor="white">
								<th class="text-center">NOME</th>
								<th class="text-center hidden-xs">CÓDIGO</th>
								<th class="text-center">DATA</th>
								<th class="text-center hidden-xs hidden-sm">TOTAL SERVIÇO</th>
								<th class="text-center hidden-xs hidden-sm">TOTAL VENDA</th>
								<th class="text-center">TOTAL</th>
								<th class="text-center hidden-xs" colspan="2">AÇÕES</th>
							</tr>
							</thead>


							<tbody>
							<?php while($result = mysqli_fetch_array($query)): ?>

								<tr class="muda">
									<td style="vertical-align:middle"><?php echo $result['cliente']; ?></td>
									<td class="hidden-xs" style="vertical-align:middle"><?php echo $result['codigo']; ?></td>
									<td style="vertical-align:middle"><?php echo date('d/m/Y',  strtotime($result['data'])); ?></td>
									<td class="hidden-xs hidden-sm" style="vertical-align:middle"><?php echo number_format($result['totalservico'], 2); ?></td>
									<td class="hidden-xs hidden-sm" style="vertical-align:middle"><?php echo number_format($result['totalvenda'], 2); ?></td>
									<td style="vertical-align:middle"><?php echo number_format($result['total'], 2); ?></td>

									<td class="hidden-xs" style="vertical-align:middle"><button style="width: 30px" type="button" class="btn btn-info btn-xs" data-toggle="popover" title="Descrição" data-content="<?php echo $result['servico1']."  ".$result['servico2']."  ".$result['servico3']; ?>" data-placement="right" data-trigger="hover"><span class="glyphicon glyphicon-info-sign"></span></button></td>

									<td class="hidden-xs"><a class="btn btn-success btn-sm" href="php/gerador.php?id=<?php echo $result['id']; ?>" onclick="window.open(this.href,'galeria','width=680,height=470'); return false;">Gerar PDF</a>
										<a class="btn btn-warning btn-sm" href="editar.php?id=<?php echo base64_encode($result['id']);?>&place=resumo">Alterar</a>
										<a class="btn btn-danger btn-sm" onClick="confirmacao(<?php echo $result['id'];?>)">Deletar</a>
										<!-- <a class="btn btn-danger btn-sm" href="php/deletar.php?id=<?php echo $result['id'];?>&place=resumo">Deletar</a> -->
									</td>
								</tr>
							
							<?php endwhile ?>	
							</tbody>
						</table>
						</section>
			</div>
		</div>




		 	<?php 
				include('php/config.php');

				$total = "SELECT count(total) as total FROM clientes where month(data)= $mes and YEAR(data)= $ano";	
				$busca = mysqli_query($conexao, $total) or die(mysqli_error());
				$total1 = mysqli_fetch_array($busca)['total'];	

				$total = "SELECT SUM(totalservico) as totalservico FROM clientes where month(data)= $mes and YEAR(data)= $ano";	
				$busca = mysqli_query($conexao, $total) or die(mysqli_error());
				$total = mysqli_fetch_array($busca)['totalservico'];
				$comicao = 0.1 * $total;
				$comicao = number_format($comicao ,2,",",".");
				$total2 = number_format($total ,2,",",".");



				$total = "SELECT SUM(totalvenda) as totalvenda FROM clientes where month(data)= $mes and YEAR(data)= $ano";	
				$busca = mysqli_query($conexao, $total) or die(mysqli_error());
				$total = mysqli_fetch_array($busca)['totalvenda'];	
				$total3 = number_format($total ,2,",",".");	

				$total = "SELECT SUM(total) as total FROM clientes where month(data)= $mes and YEAR(data)= $ano";	
				$busca = mysqli_query($conexao, $total) or die(mysqli_error());
				$total = mysqli_fetch_array($busca)['total'];
				$total4 = number_format($total ,2,",",".");


	

			?>

			<div class="panel panel-style">
				<div class="panel-body">
					<div class="row text-center">
						<div class="col-sm-2 col-md-3 dados">
							<label>REPAROS: </label>
							<label class="color-label"><?php echo $total1 ; ?></label>
						</div>
						<div class="col-sm-4 col-md-3 dados">
							<label>SERVIÇOS: </label>
							<label class="color-label" data-toggle="popover" title="Comissão" data-content="R$<?php echo $comicao; ?>" data-placement="right" data-trigger="hover">R$<?php echo $total2; ?></label>
						</div>
						<div class="col-sm-3 col-md-3 dados">
							<label>VENDAS: </label>
							<label class="color-label">R$<?php echo $total3 ; ?></label>
						</div>
						<div class="col-sm-3 col-md-3 dados">
							<label>TOTAL: </label>
							<label class="color-label">R$<?php echo $total4 ; ?></label>
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