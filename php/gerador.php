<?php


	include('config.php');

	$id= base64_decode($_GET['id']);

	$usuario = "SELECT * FROM clientes WHERE id = $id";
	$busca = mysqli_query($conexao, $usuario) or die(mysqli_error());

	$row_usuario = mysqli_fetch_array($busca);

	$codigo= $row_usuario['codigo'];
	$cliente= $row_usuario['cliente'];
	$equipamento= $row_usuario['equipamento'];
	$sistema= $row_usuario['sistema'];
	$bits= $row_usuario['bits'];
	$processador= $row_usuario['processador'];
	$memoria= $row_usuario['memoria'];
	$hd= $row_usuario['hd'];
	$tel= $row_usuario['tel'];
	$relato= $row_usuario['relato'];
	$detectado= $row_usuario['detectado'];
	$servico1= $row_usuario['servico1'];
	$servico2= $row_usuario['servico2'];
	$servico3= $row_usuario['servico3'];
	$valor1= str_replace(".", ",", $row_usuario['valor1']);
	$valor2= str_replace(".", ",", $row_usuario['valor2']);
	$valor3= str_replace(".", ",", $row_usuario['valor3']);
	$total= str_replace(".", ",", $row_usuario['total']);
	$data = $row_usuario['data'];

	if($valor1<=0){
		$valor1='-';
	}
	if($valor2<=0){
		$valor2='-';
	}
	if($valor3<=0){
		$valor3='-';
	}	
	if($valor1>0){
		$valor1="R$ $valor1";
	}
	if($valor2>0){
		$valor2="R$ $valor2";
	}
	if($valor3>0){
		$valor3="R$ $valor3";
	}				
	// if($tel<=0){
	// 	$tel='-';
	// }		
	if($total<=0){
		$total='-';
	}	
	if($total>0){
		$total="R$ $total";
	}																		

		

	$html = "


	<!DOCTYPE html>
	<html lang=\"pt-br\">
	<head>
		<meta charset=\"UTF-8\">
		<title>PDF-RELATÓRIO</title>
		<style>
			body{
				font-family: Calibri, DejaVu Sans, Arial;
				font-size: 12px;
				width: 210mm;
				height: 350mm;
				margin-left: auto;
				margin-right: auto;
				width: 100%;
			}
		</style>

	</head>
	<body>

		<img align=\"right\" width=\"200\" src=\"../imagens/endereco.png\">
		<img align=\"left\" width=\"280\" src=\"../imagens/pznet.jpg\">	
		<br><br>
		<br><br>
		<br>

		<table style=\"text-align: center; width:100%\" border=\"0\" align=\"center\">
			<tr>
				<th colspan=\"3\" bgcolor=\"#9FD1FF\">RELATÓRIO DE MANUTENÇÃO</th>
			</tr>
			<tr>
			    <td bgcolor=\"#B2DAFF\" align=\"right\" colspan=\"2\">CÓDIGO</td>
				<td bgcolor=\"#B2DAFF\"><font color=\"red\"><b>  $codigo</b></font></td>
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">PROPRIETÁRIO</th>
				<td bgcolor=\"#DCEEFF\" width=60% colspan=\"2\">  $cliente</td>
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">EQUIPAMENTO</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $equipamento</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">SISTEMA/HARDWARE</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $sistema $bits $processador $memoria $hd</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">CONTATO</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $tel</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">DATA</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">". date('d/m/Y', strtotime($data)) . "</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">PROBLEMA RELATADO</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $relato</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">FALHA(S) DETECTADA(S)</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $detectado</td>	
			</tr>
			<tr>
				<td bgcolor=\"#DCEEFF\" rowspan=\"4\"><b>ATIVIDADES EXECUTADAS</b></td>
				<td bgcolor=\"#B2DAFF\"> $servico1</td>
				<td bgcolor=\"#B2DAFF\"> $valor1</td>	
			</tr>
			<tr>
				<td bgcolor=\"#B2DAFF\"> $servico2</td>
				<td bgcolor=\"#B2DAFF\"> $valor2</td>
			</tr>
			<tr>
				<td bgcolor=\"#B2DAFF\"> $servico3</td>
				<td bgcolor=\"#B2DAFF\"> $valor3</td>
			</tr>
			<tr>
				<td bgcolor=\"#B2DAFF\" align=\"right\"> TOTAL</td>
				<td bgcolor=\"#B2DAFF\"><font color=\"red\">$total</font></td>
			</tr>
			
		</table>


	<br>

		
		<table style=\"text-align: center;\" align=center>
			<tr>
				<td align=\"left\">________________________</td>
				<td align=\"center\"></td>
				<td align=\"right\">________________________</td>
			</tr>
			<tr>
				<td align=\"center\">SETOR FINANCEIRO</td>
				<td align=\"center\"></td>
				<td align=\"center\">ÁREA TÉCNICA</td>
			</tr>
			<tr>
				<td align=\"left\"></td>
				<td align=\"center\"></td>
				<td align=\"right\"></td>
			</tr>
			<tr>
				<td align=\"center\"></td>
				<td align=\"center\"><label><font size=\"2\" color=\"#0075BB\">www.pznet.com</font></label><br></td>
				<td align=\"center\"></td>
			</tr>	
		</table>
		

		<center>
			<label><font size=\"1\"><b>Ficamos à disposição para quaisquer dúvidas que se fizerem necessárias.</b></font></label><br>
			<label><font size=\"1\"><b>Este documento é valido como comprovante de pagamento.</b></font></label>
		</center>

	<hr size=\"1\" style=\"border:1px dashed black;\">



		<!-------------------------------------------------------------->


	<table style=\"text-align: center; width:100%\" border=\"0\" align=\"center\">
			<tr>
				<th colspan=\"3\" bgcolor=\"#9FD1FF\">RELATÓRIO DE MANUTENÇÃO</th>
			</tr>
			<tr>
			    <td bgcolor=\"#B2DAFF\" align=\"right\" colspan=\"2\">CÓDIGO</td>
				<td bgcolor=\"#B2DAFF\"><font color=\"red\"><b>  $codigo</b></font></td>
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">PROPRIETÁRIO</th>
				<td bgcolor=\"#DCEEFF\" width=60% colspan=\"2\">  $cliente</td>
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">EQUIPAMENTO</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $equipamento</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">SISTEMA/HARDWARE</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $sistema $bits $processador $memoria $hd</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">CONTATO</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $tel</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">DATA</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">". date('d/m/Y', strtotime($data)) . "</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">PROBLEMA RELATADO</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $relato</td>	
			</tr>
			<tr>
				<th bgcolor=\"#B2DAFF\">FALHA(S) DETECTADA(S)</th>
				<td bgcolor=\"#DCEEFF\" colspan=\"2\">  $detectado</td>	
			</tr>
			<tr>
				<td bgcolor=\"#DCEEFF\" rowspan=\"4\"><b>ATIVIDADES EXECUTADAS</b></td>
				<td bgcolor=\"#B2DAFF\"> $servico1</td>
				<td bgcolor=\"#B2DAFF\"> $valor1</td>	
			</tr>
			<tr>
				<td bgcolor=\"#B2DAFF\"> $servico2</td>
				<td bgcolor=\"#B2DAFF\"> $valor2</td>
			</tr>
			<tr>
				<td bgcolor=\"#B2DAFF\"> $servico3</td>
				<td bgcolor=\"#B2DAFF\"> $valor3</td>
			</tr>
			<tr>
				<td bgcolor=\"#B2DAFF\" align=\"right\"> TOTAL</td>
				<td bgcolor=\"#B2DAFF\"><font color=\"red\">$total</font></td>
			</tr>
			
		</table>



	<br>


		<table style=\"text-align: center;\" align=center>
			<tr>
				<td align=\"left\">________________________</td>
				<td align=\"center\"></td>
				<td align=\"right\">________________________</td>
			</tr>
			<tr>
				<td align=\"center\">SETOR FINANCEIRO</td>
				<td align=\"center\"></td>
				<td align=\"center\">ÁREA TÉCNICA</td>
			</tr>
			<tr>
				<td align=\"center\"></td>
				<td align=\"center\">________________________</td>
				<td align=\"center\"></td>
			</tr>
			<tr>
				<td align=\"center\"></td>
				<td align=\"center\">CLIENTE</td>
				<td align=\"center\"></td>
			</tr>				
		</table>
		

		<center>
			<label><font size=\"1\"><b>Declaro que recebi o equipamento conforme descrição acima.</b></font></label>
		</center>



		
	</body>
	</html>

	";

	require '../dompdf/autoload.inc.php';

	use Dompdf\Dompdf;

	$dompdf = new Dompdf();
	$dompdf->setPaper('A4', 'portrait');

	$dompdf->loadHTML($html);
	$dompdf->render();
	return $dompdf->stream("$codigo-$cliente.pdf", ["Attachment"=>0]);

?>