<?php
	session_start();
	if(!empty($_POST['cliente']) && !empty($_POST['cod'])){



		$codigo= $_POST['cod'];
		$cliente= $_POST['cliente'];
		$equipamento= $_POST['equip'];
		$sistema= $_POST['sist'];
		$bits= $_POST['bits'];
		$processador= $_POST['proces'];
		$memoria= $_POST['mem'];
		$hd= $_POST['hd'];
		$tel= $_POST['tel'];
		$relato= $_POST['relato'];
		$detectado= $_POST['detectado'];
		$servico1= $_POST['servico1'];
		$servico2= $_POST['servico2'];
		$servico3= $_POST['servico3'];
		$tipo1= $_POST['tipo1'];
		$tipo2= $_POST['tipo2'];
		$tipo3= $_POST['tipo3'];
		$valor1= $_POST['valor1'];
		$valor2= $_POST['valor2'];
		$valor3= $_POST['valor3'];
		$total= $valor1 + $valor2 + $valor3;
		$data = date('Y-m-d');
		$totalvenda=0;
		$totalservico=0;


		if ($tipo1=="venda") {
			$totalvenda=$valor1+$totalvenda;
		}
		if ($tipo2=="venda") {
			$totalvenda=$valor2+$totalvenda;
		}
		if ($tipo3=="venda") {
			$totalvenda=$valor3+$totalvenda;
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



		 if (is_numeric($codigo)) {
		 	    
		 	    }else{

		    header('location: ../index.php?nocod=true');
		 }	
		    

		include('config.php');

		$teste=mysqli_query($conexao, "INSERT INTO clientes(codigo, cliente, equipamento, sistema, bits, processador, memoria, hd, tel, data, relato, detectado, servico1, valor1, servico2, valor2, servico3, valor3, tipo1, tipo2, tipo3, totalvenda, totalservico, total) VALUES('$codigo', '$cliente', '$equipamento', '$sistema', '$bits', '$processador', '$memoria', '$hd', '$tel', '$data', '$relato', '$detectado', '$servico1', '$valor1', '$servico2', '$valor2', '$servico3', '$valor3', '$tipo1', '$tipo2', '$tipo3', '$totalvenda', '$totalservico', '$total')") or die(mysqli_error($conexao));

        
		$command = 'C:\xampp\mysql\bin\mysqldump -u root -p123456 pznet > D:\Publico\FORMULARIO\form-bkp\back.sql';
		//$command = 'C:\xampp\mysql\bin\mysqldump -u root -p123456 pznet > D:\Publico\FORMULARIO\form-bkp\back.sql'
		$result = shell_exec($command);

		if(!is_null($result)) {
		  $_SESSION['bkp'] = 'Erro durante o backup';
		}else {
		  $_SESSION['bkp'] = 'Backup efetuado';
		  // rest of the php script to modify the database (create/drop tables etc)





		// $mensagem = "

		// <!DOCTYPE html>
		// <html>
		// <head>
		// 	<meta http-equiv=\"Content-Type\" content=\"charset=utf-8\" />
		// 	<title></title>

		// 		<style>
					
		// 			body{
		// 				text-align: justify;
		// 			}

		// 		</style>

			

		// </head>
		// <body>	
		// 	<center>
		// 		<p style=\"font-size: 20px\"><b>PZ NET</b></p>
		// 	</center>	

		// 	<table border=\"1\">

		// 	<tr>	
		// 	<td><p>Código: </td><td><b style=\"color: red\">$codigo</b></p></td>
		// 	</tr>
		// 	<tr>
		// 	<td><p>Cliente: </td><td><b style=\"color: blue\">$cliente</b></p></td>
		// 	</tr>
		// 	<tr>
		// 	<td><p>Equipamento: </td><td><b style=\"color: blue\">$equipamento</b></p></td>
		// 	</tr>
		// 	<tr>
		// 	<td><p>Configuração: </td><td><b style=\"color: blue\">$sistema $bits $processador $memoria $hd</b></p></td>
		// 	</tr>
		// 	<tr>
		// 	<td><p>Tel: </td><td><b style=\"color: blue\">$tel</b></p></td>
		// 	</tr>
		// 	<tr>
		// 	<td><p>Relato: </td><td><b style=\"color: blue\">$relato</b></p></td>
		// 	</tr>
		// 	<tr>
		// 	<td><p>Detectado: </td><td><b style=\"color: blue\">$detectado</b></p></td>
		// 	</tr>
		// 	<tr>
		// 	<td><p>Total: </td><td>R$<b style=\"color: blue\">$total</b></p></td>
		// 	</tr>
		// 	</table>

		// </body>
		// </html>



		// ";

		// require '../PHPMailer/PHPMailerAutoload.php';

		// //configurações básicas de endereço e protoloco 
		// $mail = new PHPMailer; //faz a instância do objeto PHPMailer
		// //$mail->SMTPDebug = true; //habilita o debug se parâmetro for true
		// $mail->isSMTP(); //seta o tipo de protocolo
		// $mail->Host = 'smtp.gmail.com'; //define o servidor smtp
		// $mail->SMTPAuth = true; //habilita a autenticação via smtp
		// $mail->SMTPOptions = [ 'ssl' => [ 'verify_peer' => false ] ];
		// $mail->SMTPSecure = 'tls'; //tipo de segurança
		// $mail->Port = 587; //porta de conexão
		// $mail->FromName = "PZNET";

		// //dados de autenticação no servidor smtp
		// $mail->Username = 'jftcc.teste@gmail.com'; //usuário do smtp (email cadastrado no servidor)
		// $mail->Password = 'testetcc'; //senha ****CUIDADO PARA NÃO EXPOR ESSA INFORMAÇÃO NA INTERNET OU NO FÓRUM DE DÚVIDAS DO CURSO****

		// //dados de envio de e-mail
		// $mail->addAddress('jf.britto@hotmail.com', $nome); //e-mails para teste
		// // $mail->addAddress($destinatario, $nome); //descomentar para pegar email do banco!!!

		// //configuração da mensagem
		// $mail->isHTML(true); //formato da mensagem de e-mail
		// $mail->Subject = utf8_decode("Computador reparado"); //assunto
		// $mail->Body = utf8_decode($mensagem);
		// // $mail->Body    = $mensagem; //Se o formato da mensagem for HTML você poderá utilizar as tags do HTML no corpo do e-mail
		// $mail->AltBody = 'Caso não seja suportado o HTML, aqui vai a mensagem em texto'; //texto alternativo caso o html não seja suportado
		// // $mail->AddAttachment("arquivos/$matricula.pdf"); 

		// //envio e testes
		// if(!$mail->send()) { 
		// 	echo 'A mensagem não pode ser enviada ';
		// 	echo $erro = 'Mailer Error: ' . $mail->ErrorInfo;
		// } else {
		// 	echo 'A mensagem foi enviada com sucesso!';
		// }




		}

        header('location: ../index.php?acerto=true');


	}else{
		header('location: ../index.php?erro=true');
		 }

?>


