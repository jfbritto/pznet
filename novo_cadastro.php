<?php

include('php/config.php');

$id = $_GET['id'];

$sql = mysqli_query($conexao, "SELECT * FROM clientes where id = '$id'");
$result = mysqli_fetch_array($sql);


?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>PZ NET</title>
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

			<div class="row text-center">
	          <div class="col-sm-10 col-sm-offset-1">
	            <div class="panel panel-style">
	              <div class="panel-body">
	               <label style="font-size: 25px"> <font style="color: #056495">NOVO CADASTRO DE</font> <?php echo $result['cliente']; ?> </label>
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
											<input class="form-control input-sm" type="text" name="cliente" required autofocus value="<?php echo $result['cliente']; ?>">
										</div>
										<div class="col-sm-6">
											<label>CÓDIGO</label>
											<input class="form-control input-sm" maxlength="5" type="text" name="cod" required value="<?php echo $result['codigo']; ?>" onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" style="width:100px; text-align: center; font-size: 20px;">
										</div>
									</div>
									
									

									<div class="row">
										<div class="col-sm-2">
											<label>EQUIP</label>
											<select class="form-control input-sm" name="equip" required>
												<option value="<?php echo $result['equipamento']; ?>"><?php echo $result['equipamento']; ?></option>
												<option value="Computador">COMPUTADOR</option>
												<option value="Notebook">NOTEBOOK</option>
												<option value="Netbook">NETBOOK</option>
												<option value="ALL-IN-ONE">ALL-IN-ONE</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>SISTEMA</label>
											<select class="form-control input-sm" name="sist" required>
												<option value="<?php echo $result['sistema']; ?>"><?php echo $result['sistema']; ?></option>
												<option value="Win 7 ">WIN 7</option>
												<option value="Win 8 ">WIN 8</option>
												<option value="Win 10 ">WIN 10</option>
												<option value="Win XP ">WIN XP</option>
												<option value="Ubuntu ">UBUNTU</option>
												<option value="MAC OS ">MAC OS</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>BITS</label>
											<select class="form-control input-sm" name="bits" required>
												<option value="<?php echo $result['bits']; ?>"><?php echo $result['bits']; ?></option>
												<option value="x32 /">x32</option>
												<option value="x64 /">x64</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>PROCESS</label>
											<select class="form-control input-sm" name="proces" required>
												<option value="<?php echo $result['processador']; ?>"><?php echo $result['processador']; ?></option>
												<option value="Intel Core-i3 / ">Intel Core-i3</option>
												<option value="Intel Core-i5 / ">Intel Core-i5</option>
												<option value="Intel Core-i7 / ">Intel Core-i7</option>			
												<option value="Intel Celeron / ">Intel Celeron</option>
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
												<option value="AMD C-50 / ">AMD C-50</option>
												<option value="AMD C-60 / ">AMD C-60</option>
												<option value="AMD C-70 / ">AMD C-70</option>
												<option value="AMD A4-1200 / ">AMD A4-1200</option>
												<option value="AMD Turion / ">AMD Turion</option>
												<option value="AMD Processor / ">AMD Processor</option>
												<option value="VIA C7-M / ">VIA C7-M</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>MEM</label>
											<select class="form-control input-sm" name="mem" required>
												<option value="<?php echo $result['memoria']; ?>"><?php echo $result['memoria']; ?></option>
												<option value="RAM: 1GB / ">1GB</option>
												<option value="RAM: 1,5GB / ">1,5GB</option>
												<option value="RAM: 2GB / ">2GB</option>
												<option value="RAM: 3GB / ">3GB</option>
												<option value="RAM: 4GB / ">4GB</option>
												<option value="RAM: 6GB / ">6GB</option>
												<option value="RAM: 8GB / ">8GB</option>
												<option value="RAM: 512MB / ">512mb</option>
												<option value="RAM: 256MB / ">256mb</option>
											</select>
										</div>
										<div class="col-sm-2">
											<label>HD</label>
											<select class="form-control input-sm" name="hd" required>
												<option value="<?php echo $result['hd']; ?>"><?php echo $result['hd']; ?></option>
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
												<option value="HD: 32GB">32GB</option>
												<option value="HD: 20GB">20GB</option>
											</select>
										</div>
									</div>	
									
									
								
									<div class="row">
										<div class="col-sm-6">
											<label>TEL</label>
											<input class="form-control input-sm telefone" type="tel" name="tel" onkeypress="mascaraTelefone(this)" value="<?php echo $result['tel']; ?>">
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
			
				
			</div>
		</form>
	<br><br><br><br> 	
	</body>
</html>