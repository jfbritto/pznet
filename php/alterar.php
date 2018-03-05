<?php


	$senha = '123';
	$pass = $_POST['pass'];
	$id = $_POST['id'];
	$place = $_POST['place'];

	if($senha==$pass){


		$codigo= $_POST['codigo'];
		$cliente= $_POST['cliente'];
		$equipamento= $_POST['equipamento'];
		$sistema= $_POST['sistema'];
		$bits= $_POST['bits'];
		$processador= $_POST['processador'];
		$memoria= $_POST['memoria'];
		$hd= $_POST['hd'];
		$tel= $_POST['tel'];
		$relato= $_POST['relato'];
		$detectado= $_POST['detectado'];
		$servico1= $_POST['servico1'];
		$servico2= $_POST['servico2'];
		$servico3= $_POST['servico3'];
		$valor1= $_POST['valor1'];
		$valor2= $_POST['valor2'];
		$valor3= $_POST['valor3'];
		$tipo1= $_POST['tipo1'];
		$tipo2= $_POST['tipo2'];
		$tipo3= $_POST['tipo3'];

		// $total= $_POST['total'];
		// $totalvenda=$_POST['totalvenda'];
		// $totalservico=$_POST['totalservico'];


		if ($tipo1=="venda") {
			$totalvenda=$valor1+$totalvenda;
		}
		if ($tipo2=="venda") {
			$totalvenda=$valor2+$totalvenda;
		}
		if ($tipo3=="venda") {
			$totalvenda=$valor3+$totalvenda;
		}
		if($tipo1 !== "venda" and $tipo2 !== "venda" and $tipo3 !== "venda"){
			$totalvenda=0;
		}		

		if ($tipo1=="servico") {
			$totalservico=$valor1+$totalservico;
		}
		if ($tipo2=="servico") {
			$totalservico=$valor2+$totalservico;
		}
		if ($tipo3=="servico") {
			$totalservico=$valor3+$totalservico;
		}
		if($tipo1 !== "servico" and $tipo2 !== "servico" and $tipo3 !== "servico"){
			$totalservico=0;
		}	

		$total = $valor1 + $valor2 + $valor3;


		include('config.php');



		$query = mysqli_query($conexao, "UPDATE clientes SET codigo = '$codigo', cliente = '$cliente', equipamento = '$equipamento', sistema = '$sistema', bits = '$bits', processador = '$processador', memoria = '$memoria', hd = '$hd', tel = '$tel', relato = '$relato', detectado = '$detectado', servico1 = '$servico1', valor1 = '$valor1', tipo1 = '$tipo1', servico2 = '$servico2', valor2 = '$valor2', tipo2 = '$tipo2', servico3 = '$servico3', valor3 = '$valor3', tipo3 = '$tipo3', totalvenda = '$totalvenda', totalservico = '$totalservico', total = '$total' WHERE id = '$id'") or die(mysqli_error($conexao));



		if ($place == 'resumo') {
			header('location: ../resumo.php?alterado=true');
			exit;
		}
		if ($place == 'relatorio') {
			header('location: ../relatorio.php?alterado=true');
			exit;
		}
		header('location: ../index.php?alterado=true');


	}else{

		header('location: ../index.php?naoalterado=true');
		
	}


?>


