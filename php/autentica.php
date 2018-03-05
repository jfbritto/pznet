<?php


if (isset($_POST['senha'])) {
	$senha = $_POST['senha'];
	if ($senha == 'carol') {
		session_start();
		$_SESSION['senha'] = $senha;
		header('location: ../resumo.php');
	}else{
		header('location: ../autentica_pag.php?senha=true');
		exit;
	}

}else{
	header('location: ../autentica_pag.php?vazio=true');
}

?>