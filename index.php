<?php if (isset($_GET['quebra'])) {
		session_start();
		$_SESSION = array();
} ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>PZ NET</title>
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



	 	<?php 
			include('php/config.php');

			$maior = "SELECT * FROM clientes WHERE codigo = (SELECT MAX(codigo) FROM clientes)";	
			$busca = mysqli_query($conexao, $maior);
			$row_usuario = mysqli_fetch_array($busca);
			$maior=$row_usuario['codigo'];

			$ultimo = "SELECT * FROM clientes ORDER BY id DESC LIMIT 1";	
			$busca = mysqli_query($conexao, $ultimo);
			$row_usuario = mysqli_fetch_array($busca);
		?>
				


		<div class="container fadeIn">


		
				<div class="row">

					<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
						<div class="panel panel-style">
							<div class="panel-body">
							<div class="form-inline text-center">
								<center>
								<input data-toggle="popover" data-content="Último relatório cadastrado" data-trigger="hover" data-placement="bottom" class="form-control input-xs" type="text" value="<?php echo $row_usuario['codigo'] . ' - ' . $row_usuario['cliente']; ?>" readonly style="width: 200px; font-size: 20px; text-align: center">
								<a class="btn btn-primary btn-md br brsm" href="php/gerador.php?id=<?php echo base64_encode($row_usuario['id']); ?>" onclick="window.open(this.href,'galeria','width=680,height=470'); return false;">Gerar PDF</a>
								</center>
							</div>
							</div>
						</div>
					</div>
						
				</div>	
				
		
		

		<!--inserção dos dados no formulário-->
			<form method="post" action="php/inserir.php">

					<div class="row">
						<div class="col-xs-0 col-sm-0 col-md-1"></div>
						<div class="col-xs-12 col-sm-12 col-md-10">
							<div class="panel panel-style">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-6">
											<label>CLIENTE</label>
											<input class="form-control input-sm" type="text" name="cliente" required autofocus>
										</div>
										<div class="col-sm-6">
											<label>CÓDIGO</label>
											<?php $maior = $maior + 1;?>
											<input class="form-control input-sm" maxlength="5" type="text" name="cod" required value="<?php echo $maior?>" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" style="width:100px; text-align: center; font-size: 20px;">
										</div>
									</div>
									
									

									<div class="row">
										<div class="col-sm-2">
											<label>EQUIP</label>
											<select class="form-control input-sm" name="equip" required>
												<option value=""></option>
												<option value="Computador">COMPUTADOR</option>
												<option value="Notebook">NOTEBOOK</option>
												<option value="Netbook">NETBOOK</option>
												<option value="ALL-IN-ONE">ALL-IN-ONE</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>SISTEMA</label>
											<select class="form-control input-sm" name="sist" required>
												<option value=""></option>
												<option value="Win 7 ">WIN 7</option>
												<option value="Win 8 ">WIN 8</option>
												<option value="Win 10 ">WIN 10</option>
												<option value="Win XP ">WIN XP</option>
												<option value="Ubuntu ">UBUNTU</option>
												<option value="MAC OS ">MAC OS</option>
												<option value="WIN/UBUNTU">WIN/UBUNTU</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>BITS</label>
											<select class="form-control input-sm" name="bits" required>
												<option value=""></option>
												<option value="x32 /">x32</option>
												<option value="x64 /">x64</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>PROCESS</label>
											<select class="form-control input-sm" name="proces" required>
												<option value=""></option>
												<option value="Intel Core-i3 / ">Intel Core-i3</option>
												<option value="Intel Core-i5 / ">Intel Core-i5</option>
												<option value="Intel Core-i7 / ">Intel Core-i7</option>			
												<option value="Intel Celeron / ">Intel Celeron</option>
												<option value="Intel Celeron D / ">Intel Celeron D</option>	
												<option value="Intel Celeron M / ">Intel Celeron M</option>	
												<option value="Intel Atom / ">Intel Atom</option>
												<option value="Intel Core 2 Duo / ">Intel Core 2 Duo</option>
												<option value="Intel Core 2 Extreme / ">Intel Core 2 Extreme</option>
												<option value="Intel Core 2 Quad / ">Intel Core 2 Quad</option>
												<option value="Intel Pentium / ">Intel Pentium </option>
												<option value="Intel Pentium D / ">Intel Pentium D</option>
												<option value="Intel Pentium 4 / ">Intel Pentium 4</option>
												<option value="Intel Pentium 4 Extreme Edition / ">Intel Pentium 4 Extreme Edition</option>
												<option value="Inter Pentium Dual Core / ">Inter Pentium Dual Core</option>
												<option value="AMD Athlon / ">AMD Athlon</option>
												<option value="AMD FX / ">AMD FX</option>
												<option value="AMD Phenom II / ">AMD Phenom II</option>
												<option value="AMD Sempron / ">AMD Sempron</option>
												<option value="AMD E-300 / ">AMD E-300</option>
												<option value="AMD E2 / ">AMD E2</option>
												<option value="AMD E2-3800 / ">AMD E2-3800</option>
												<option value="AMD C-50 / ">AMD C-50</option>
												<option value="AMD C-60 / ">AMD C-60</option>
												<option value="AMD C-70 / ">AMD C-70</option>
												<option value="AMD A4-1200 / ">AMD A4-1200</option>
												<option value="AMD Turion / ">AMD Turion</option>
												<option value="AMD Processor / ">AMD Processor</option>
												<option value="VIA C7-D / ">VIA C7-D</option>
												<option value="VIA C7-M / ">VIA C7-M</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>MEM</label>
											<select class="form-control input-sm" name="mem" required>
												<option value=""></option>
												<option value="RAM: 1GB / ">1GB</option>
												<option value="RAM: 1,5GB / ">1,5GB</option>
												<option value="RAM: 2GB / ">2GB</option>
												<option value="RAM: 3GB / ">3GB</option>
												<option value="RAM: 4GB / ">4GB</option>
												<option value="RAM: 6GB / ">6GB</option>
												<option value="RAM: 8GB / ">8GB</option>
												<option value="RAM: 768MB / ">768mb</option>
												<option value="RAM: 512MB / ">512mb</option>
												<option value="RAM: 256MB / ">256mb</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>HD</label>
											<select class="form-control input-sm" name="hd" required>
												<option value=""></option>
												<option value="HD: 2TB">2TB</option>
												<option value="HD: 1,5TB">1,5TB</option>
												<option value="HD: 1TB">1TB</option>
												<option value="HD: 750GB">750GB</option>
												<option value="HD: 640GB">640GB</option>
												<option value="HD: 500GB">500GB</option>
												<option value="HD: 400GB">400GB</option>
												<option value="HD: 320GB">320GB</option>
												<option value="HD: 300GB">300GB</option>
												<option value="HD: 250GB">250GB</option>
												<option value="HD: 200GB">200GB</option>
												<option value="HD: 160GB">160GB</option>
												<option value="HD: 120GB">120GB</option>
												<option value="HD: 80GB">80GB</option>
												<option value="HD: 60GB">60GB</option>
												<option value="HD: 40GB">40GB</option>
												<option value="HD: 32GB">32GB</option>
												<option value="HD: 20GB">20GB</option>
											</select>
										</div>
									</div>	
									
									
								
									<div class="row">
										<div class="col-sm-6">
											<label>TEL</label>
											<input class="form-control input-sm telefone" type="tel" name="tel" onkeypress="mascaraTelefone(this)" value="28">
										</div>
										<div class="col-sm-6"></div>
									</div>
									
									
									
									<div class="row">
										<div class="col-sm-6">
											<label>PROBLEMA RELATADO</label>
											<input class="form-control input-sm" name="relato" required>
										</div>
										<div class="col-sm-6">
											<label>PROBLEMA DETECTADO</label>
											<input class="form-control input-sm" name="detectado" required>
										</div>
									</div>
								
									

									<div class="row">
										<div class="col-sm-12">
											<label>SERVIÇO 1</label>
											<div class="form-inline">

												<input class="form-control input-sm" type="text" name="servico1" style="width: 40%">
											
												<input class="form-control input-sm" type="text" name="valor1" onkeyup="moeda(this);" maxlength="6" placeholder="R$">
											
												&nbsp;&nbsp;
												<label>SERVIÇO</label> 
												<input type="radio" name="tipo1" value="servico">
												&nbsp;
												<label>VENDA</label>
												<input type="radio" name="tipo1" value="venda">

											</div>
										</div>
									</div>

									

									<div class="row">
										<div class="col-sm-12">
											<label>SERVIÇO 2</label>
											<div class="form-inline">

												<input class="form-control input-sm" type="text" name="servico2" style="width: 40%">
											
												<input class="form-control input-sm" type="text" name="valor2" onkeyup="moeda(this);" maxlength="6" placeholder="R$">
											
												&nbsp;&nbsp;
												<label>SERVIÇO</label> 
												<input type="radio" name="tipo2" value="servico">
												&nbsp;
												<label>VENDA</label>
												<input type="radio" name="tipo2" value="venda">

											</div>
										</div>
									</div>

									

									<div class="row">
										<div class="col-sm-12">
											<label>SERVIÇO 3</label>
											<div class="form-inline">

												<input class="form-control input-sm" type="text" name="servico3" style="width: 40%">
											
												<input class="form-control input-sm" type="text" name="valor3" onkeyup="moeda(this);" maxlength="6" placeholder="R$">
											
												&nbsp;&nbsp;
												<label>SERVIÇO</label> 
												<input type="radio" name="tipo3" value="servico">
												&nbsp;
												<label>VENDA</label>
												<input type="radio" name="tipo3" value="venda">

											</div>
										</div>
									</div>
										
									<br>
								
									<center><button class="btn btn-primary btn-md" type="submit">CADASTRAR</button></center>


								</div>
						<div class="col-xs-0 col-sm-0 col-md-1"></div>
					</div>
				</div>
			</div>
			
			<script type="text/javascript">
			
				$(document).ready(function(){
			          $('[data-toggle="popover"]').popover();   
			      });

			  window.onload = function(){
			    let url = window.location;
			    let u = new URL(url);
			    let valor = u.searchParams.get('naodeletado');
			    if(valor == 'true')
			      swal('Não pode ser deletado!', '', 'error');
			  
			    let valor1 = u.searchParams.get('alterado');
			    if(valor1 == 'true')
			        swal('Alterado com sucesso!', '', 'success');

			    let valor2 = u.searchParams.get('naoalterado');
			    if(valor2 == 'true')
			        swal('Não pode ser alterado!', '', 'warning'); 

			    let valor3 = u.searchParams.get('deletado');
			    if(valor3 == 'true')
			        swal('Cadastro deletado!', '', 'success'); 
			        
			    let valor4 = u.searchParams.get('naodeletado');
			    if(valor4 == 'true')
			        swal('Não pode ser deletado!', '', 'error'); 

			    let valor5 = u.searchParams.get('acerto');
			    if(valor5 == 'true')
			        swal('Cadastrado!', '', 'success'); 

			                 

			    // $(document).ready(function(){
			    //   $('#letras').mask('SSSS');
			    // });
			  }
			</script>

				
			</div>
		</form>
	<br><br><br><br> 	
	</body>
</html>