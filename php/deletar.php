<?php

	if (isset($_GET['id'])) {
		$id= $_GET['id'];
		$place = $_GET['place'];

		include('config.php');


		$usuario = "DELETE FROM clientes WHERE id = '$id'";
		$busca = mysqli_query($conexao, $usuario) or die(mysqli_error());

		if ($place == 'resumo') {
			header('location: ../resumo.php?deletado=true');
			exit;
		}if($place == 'relatorio'){
		header('location: ../relatorio.php?deletado=true');
			exit;
		}
	}else{

		header('location: ../index.php?naodeletado=true');
		
	}

?>


